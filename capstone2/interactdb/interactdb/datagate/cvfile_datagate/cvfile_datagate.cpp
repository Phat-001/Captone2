#include "cvfile_datagate.h"

CVFileDataGate::CVFileDataGate(const QString &userName, const QString &password) :
    m_userName(userName), m_password(password)
{}

CVFileDataGate::~CVFileDataGate()
{
    QSqlDatabase::removeDatabase(m_databaseName);
}

// https://forum.qt.io/topic/103626/problem-with-sqlite-database-and-threads-database-is-locked/10
QSqlDatabase CVFileDataGate::connect(){
    //m_databaseName = QStringLiteral("qt_sql_default_connection_%1").arg(qintptr(QThread::currentThreadId()), 0, 16);

    m_databaseName = "qt_sql_default_connection";
    QSqlDatabase database;
    if(QSqlDatabase::contains(m_databaseName)){
        database = QSqlDatabase::database(m_databaseName);
    }
    else {
        database = QSqlDatabase::addDatabase("QMYSQL");
        database.setHostName("127.0.0.1");
        database.setPort(3303);
        database.setDatabaseName("jmsdb");
        database.setUserName("root");
        database.setPassword("");
    }

    return database;
}

bool CVFileDataGate::query(const QString &whatToFind, const QString &tableName)
{
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::query!";
        cache.clear();
        QSqlQuery selected;
        selected.exec("Select " + whatToFind + " from " + tableName);

        while (selected.next())
        {
            CVFileStruct pac_str;
            pac_str.setFileID(selected.value(0).toInt());
            pac_str.setAccountID(selected.value(1).toInt());
            pac_str.setHRID(selected.value(2).toInt());
            pac_str.setUploadFile(selected.value(3).toString());
            cache.append(pac_str);
        }

        connect().close();
        refreshQueriedState();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return true;
}

bool CVFileDataGate::isPostExist(const QString &whatToFind,
                              const QString &whichAccount,
                              const QString &tableName)
{
    bool result = false;
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::isVersionExist!!";
        QSqlQuery postSelected;

        postSelected.exec("Select count(" + whatToFind +
                             ") from " + tableName + " where account_id = '" +
                             whichAccount + "'");

        postSelected.next();
        result = postSelected.value(0).toInt();
        connect().close();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return result;
}

bool CVFileDataGate::insert(const CVFileStruct &singlePackage,
                             const QString &tableName)
{
    return insert(QList<CVFileStruct>() << singlePackage, tableName);
}

bool CVFileDataGate::insert(const QList<CVFileStruct> &CVStructList,
                             const QString &tableName)
{
    if (connect().open())
    {
        QSqlQuery qInsert;

        qInsert.prepare("Insert into " + tableName + " values (?, ?, ?, ?)");
        for( QList<CVFileStruct>::ConstIterator it = CVStructList.cbegin();
             it != CVStructList.cend(); it++ )
        {
            qInsert.addBindValue(it->getFileID());
            qInsert.addBindValue(it->getAccountID());
            qInsert.addBindValue(it->getHRID());
            qInsert.addBindValue(it->getUploadFile());

            if (!qInsert.exec()) qDebug()<<"Unable to insert!";
        }

        if (!connect().commit())
        {
            qDebug() << "Connection error!";
        }
        connect().close();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return true;
}

QList<CVFileStruct> CVFileDataGate::readCache()
{
    if(queried == false)
    {
        qDebug() << "You have not executed the query to "\
                    "write the data to the DataGate::cache";
        return QList<CVFileStruct>();
    }
    return cache;
}

void CVFileDataGate::resetCache(const QString &tableName)
{
    query("*", tableName);
}

void CVFileDataGate::refreshQueriedState()
{
    queried = (cache.length() > 0) ? true : false;
}

