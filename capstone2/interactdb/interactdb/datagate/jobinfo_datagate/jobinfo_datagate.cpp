#include "jobinfo_datagate.h"

JobInfoDataGate::JobInfoDataGate(const QString &userName, const QString &password) :
    m_userName(userName), m_password(password)
{}

JobInfoDataGate::~JobInfoDataGate()
{
    QSqlDatabase::removeDatabase(m_databaseName);
}

QSqlDatabase JobInfoDataGate::connect(){


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

bool JobInfoDataGate::query(const QString &whatToFind, const QString &tableName)
{
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::query!";
        m_cache.clear();
        QSqlQuery selected;
        selected.exec("Select " + whatToFind + " from " + tableName);

        while (selected.next())
        {
            JobInfoStruct pac_str;

            pac_str.setID(selected.value(0).toInt());
            pac_str.setAccountID(selected.value(1).toInt());
            pac_str.setJobTitle(selected.value(2).toString());
            pac_str.setJobDate(selected.value(3).toDate());
            pac_str.setAddress(selected.value(4).toString());
            pac_str.setSalary(selected.value(5).toInt());
            pac_str.setLevel(selected.value(6).toString());
            pac_str.setDescription(selected.value(7).toString());
            pac_str.setLogo(selected.value(8).toString());
            pac_str.setJobType(selected.value(9).toString());

            m_cache.append(pac_str);
        }

        connect().close();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return true;
}

bool JobInfoDataGate::isJobExist(const QString &whatToFind,
                              const QString &whichAccountName,
                              const QString &tableName)
{
    bool result = false;
    if (connect().open())
    {
        //qDebug() << "Connected at DataGate::isVersionExist!!";
        QSqlQuery jobSelected;

        jobSelected.exec("Select count(" + whatToFind +
                             ") from " + tableName + " where account_id = '" +
                             whichAccountName + "'");

        jobSelected.next();
        result = jobSelected.value(0).toInt();
        connect().close();
    }
    QSqlDatabase::removeDatabase(m_databaseName);
    return result;
}

bool JobInfoDataGate::insert(const JobInfoStruct &singlePackage,
                             const QString &tableName)
{
    return insert(QList<JobInfoStruct>() << singlePackage, tableName);
}

bool JobInfoDataGate::insert(const QList<JobInfoStruct> &jobStructList,
                             const QString &tableName)
{
    if (connect().open())
    {
        QSqlQuery qInsert;

        qInsert.prepare("Insert into " + tableName + " values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        for( QList<JobInfoStruct>::ConstIterator it = jobStructList.cbegin();
             it != jobStructList.cend(); it++ )
        {
            qInsert.addBindValue(it->getID());
            qInsert.addBindValue(it->getAccountID());
            qInsert.addBindValue(it->getJobTitle());
            qInsert.addBindValue(it->getJobDate());
            qInsert.addBindValue(it->getAddress());
            qInsert.addBindValue(it->getSalary());
            qInsert.addBindValue(it->getLevel());
            qInsert.addBindValue(it->getDescription());
            qInsert.addBindValue(it->getLogo());
            qInsert.addBindValue(it->getJobType());

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

QList<JobInfoStruct> JobInfoDataGate::readCache()
{
    return QList<JobInfoStruct>();
}

void JobInfoDataGate::resetCache(const QString &tableName)
{
    query("*", tableName);
}

void JobInfoDataGate::queryTotalRow()
{
    if (connect().open()){
        QSqlQuery qSelect("SELECT COUNT(*) FROM JOB_INFORMATION");
        qSelect.next();
        m_totalRow = qSelect.value(0).toInt();
        qDebug()<<m_totalRow;

        connect().close();
    }
    else
        qDebug()<<"Connect unsuccessful!!!";
}

void JobInfoDataGate::queryRowInList(int currentList, int maxRowInList)
{
    m_currentList = currentList;
    m_maxRowInList = maxRowInList;
    int N = m_currentList * m_maxRowInList - m_maxRowInList;
    m_cache.clear();
    if (connect().open()){
        QSqlQuery qSelect("SELECT * FROM JOB_INFORMATION LIMIT "+QString::number(N)+", "+QString::number(m_maxRowInList)+"");

        while (qSelect.next()){
            JobInfoStruct pac_str;

            pac_str.setID(qSelect.value(0).toInt());
            pac_str.setAccountID(qSelect.value(1).toInt());
            pac_str.setJobTitle(qSelect.value(2).toString());
            pac_str.setJobDate(qSelect.value(3).toDate());
            pac_str.setAddress(qSelect.value(4).toString());
            pac_str.setSalary(qSelect.value(5).toInt());
            pac_str.setLevel(qSelect.value(6).toString());
            pac_str.setDescription(qSelect.value(7).toString());
            pac_str.setLogo(qSelect.value(8).toString());
            pac_str.setJobType(qSelect.value(9).toString());

            m_cache.append(pac_str);
        }

        connect().close();
    }
    else
        qDebug()<<"Connect unsuccessful!!!";
}

void JobInfoDataGate::show()
{
    for( QList<JobInfoStruct>::ConstIterator it = m_cache.cbegin();
         it != m_cache.cend(); it++ )
    {
        qDebug()<<it->getAccountID()<<" "<<it->getAddress()<<" "<<it->getDescription()<<" "
               <<it->getID()<<" "<<it->getJobDate()<<" "<<it->getJobTitle()<<" "<<it->getJobType()<<" "
               <<it->getLevel()<<" "<< it->getLogo()<<" "<<it->getSalary();
    }
}




