#include "account_datagate.h"

AccountDataGate::AccountDataGate(const QString &userName, const QString &password) :
    m_userName(userName), m_password(password)
{}

AccountDataGate::~AccountDataGate()
{
    QSqlDatabase::removeDatabase(m_databaseName);
}

// https://forum.qt.io/topic/103626/problem-with-sqlite-database-and-threads-database-is-locked/10
QSqlDatabase AccountDataGate::connect(){
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

bool AccountDataGate::query(const QString &whatToFind, const QString &tableName)
{
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::query!";
        cache.clear();
        QSqlQuery selected;
        selected.exec("Select " + whatToFind + " from " + tableName);

        while (selected.next())
        {
            AccountStruct pac_str;

            pac_str.setAccountID(selected.value(0).toInt());
            pac_str.setName(selected.value(1).toString());
            pac_str.setEmail(selected.value(2).toString());
            pac_str.setPhone(selected.value(3).toInt());
            pac_str.setName(selected.value(4).toString());
            pac_str.setAddress(selected.value(5).toString());
            pac_str.setUserName(selected.value(6).toString());
            pac_str.setPassword(selected.value(7).toString());

            cache.append(pac_str);
        }

        connect().close();
        refreshQueriedState();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return true;
}

bool AccountDataGate::isPostExist(const QString &whatToFind,
                              const QString &whichUserName,
                              const QString &tableName)
{
    bool result = false;
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::isVersionExist!!";
        QSqlQuery postSelected;

        postSelected.exec("Select count(" + whatToFind +
                             ") from " + tableName + " where username = '" +
                             whichUserName + "'");

        postSelected.next();
        result = postSelected.value(0).toInt();
        connect().close();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return result;
}

bool AccountDataGate::insert(const AccountStruct &singlePackage,
                             const QString &tableName)
{
    return insert(QList<AccountStruct>() << singlePackage, tableName);
}

bool AccountDataGate::insert(const QList<AccountStruct> &accountStructList,
                             const QString &tableName)
{
    if (connect().open())
    {
        QSqlQuery qInsert;

        qInsert.prepare("Insert into " + tableName + " values (?, ?, ?, ?, ?, ?, ?)");
        for( QList<AccountStruct>::ConstIterator it = accountStructList.cbegin();
             it != accountStructList.cend(); it++ )
        {
            qInsert.addBindValue(it->getAccountID());
            qInsert.addBindValue(it->getName());
            qInsert.addBindValue(it->getEmail());
            qInsert.addBindValue(it->getPhone());
            qInsert.addBindValue(it->getAddress());
            qInsert.addBindValue(it->getUserName());
            qInsert.addBindValue(it->getPassword());

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

QList<AccountStruct> AccountDataGate::readCache()
{
    if(queried == false)
    {
        qDebug() << "You have not executed the query to "\
                    "write the data to the DataGate::cache";
        return QList<AccountStruct>();
    }
    return cache;
}

void AccountDataGate::resetCache(const QString &tableName)
{
    query("*", tableName);
}

void AccountDataGate::refreshQueriedState()
{
    queried = (cache.length() > 0) ? true : false;
}

