#include "posts_datagate.h"

PostsDataGate::PostsDataGate(const QString &userName, const QString &password) :
    m_userName(userName), m_password(password)
{}

PostsDataGate::~PostsDataGate()
{
    QSqlDatabase::removeDatabase(m_databaseName);
}

// https://forum.qt.io/topic/103626/problem-with-sqlite-database-and-threads-database-is-locked/10
QSqlDatabase PostsDataGate::connect(){
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

bool PostsDataGate::query(const QString &whatToFind, const QString &tableName)
{
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::query!";
        cache.clear();
        QSqlQuery selected;
        selected.exec("Select " + whatToFind + " from " + tableName);

        while (selected.next())
        {
            PostsStruct pac_str;

            pac_str.setPostID(selected.value(0).toInt());
            pac_str.setAccountID(selected.value(1).toInt());
            pac_str.setPostTitle(selected.value(2).toString());
            pac_str.setContent(selected.value(3).toString());
            pac_str.setDate(selected.value(4).toDate());

            cache.append(pac_str);
        }

        connect().close();
        refreshQueriedState();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return true;
}

bool PostsDataGate::isPostExist(const QString &whatToFind,
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

bool PostsDataGate::insert(const PostsStruct &singlePackage,
                             const QString &tableName)
{
    return insert(QList<PostsStruct>() << singlePackage, tableName);
}

bool PostsDataGate::insert(const QList<PostsStruct> &postStructList,
                             const QString &tableName)
{
    if (connect().open())
    {
        QSqlQuery qInsert;

        qInsert.prepare("Insert into " + tableName + " values (?, ?, ?, ?, ?)");
        for( QList<PostsStruct>::ConstIterator it = postStructList.cbegin();
             it != postStructList.cend(); it++ )
        {
            qInsert.addBindValue(it->getPostID());
            qInsert.addBindValue(it->getAccountID());
            qInsert.addBindValue(it->getPostTitle());
            qInsert.addBindValue(it->getContent());
            qInsert.addBindValue(it->getDate());

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

QList<PostsStruct> PostsDataGate::readCache()
{
    if(queried == false)
    {
        qDebug() << "You have not executed the query to "\
                    "write the data to the DataGate::cache";
        return QList<PostsStruct>();
    }
    return cache;
}

void PostsDataGate::resetCache(const QString &tableName)
{
    query("*", tableName);
}

void PostsDataGate::refreshQueriedState()
{
    queried = (cache.length() > 0) ? true : false;
}

