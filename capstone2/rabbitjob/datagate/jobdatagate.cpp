#include "jobdatagate.h"

JobDataGate::JobDataGate(const QString &userName, const QString &password, QObject *parent) :
    QObject(parent),
    m_dbUserName{userName},
    m_dbPassword{password}
{
    m_isQueryBySalary   = RabbitJobEnums::NO_QUERY_BY_SALARY;
    m_isQueryByCityName = RabbitJobEnums::NO_QUERY_BY_CITY_NAME;
    m_isQueryByDistance = RabbitJobEnums::NO_QUERY_BY_DISTANCE;
    m_isQueryByJobLevel = RabbitJobEnums::NO_QUERY_BY_JOB_LEVEL;
    m_isQueryByJobType  = RabbitJobEnums::NO_QUERY_BY_JOB_TYPE;
    m_pCache            = new QList<JobInfoStruct>;
}

JobDataGate::~JobDataGate()
{
    if(m_pCache != nullptr){
        delete m_pCache;
        m_pCache = nullptr;
    }
}

int JobDataGate::isQueryBySalary() const
{
    return m_isQueryBySalary;
}

int JobDataGate::isQueryByCityName() const
{
    return m_isQueryByCityName;
}

int JobDataGate::isQueryByDistance() const
{
    return m_isQueryByDistance;
}

int JobDataGate::isQueryByJobLevel() const
{
    return m_isQueryByJobLevel;
}

int JobDataGate::isQueryByJobType() const
{
    return m_isQueryByJobType;
}

QString JobDataGate::distance() const
{
    return m_distance;
}

QString JobDataGate::cityName() const
{
    return m_cityName;
}

QString JobDataGate::salary() const
{
    return m_salary;
}

QString JobDataGate::jobLevel() const
{
    return m_jobLevel;
}

QString JobDataGate::skill() const
{
    return m_skill;
}

void JobDataGate::setIsQueryBySalary(int _isQueryBySalary)
{
    m_isQueryBySalary = _isQueryBySalary;
    qDebug() << "[JobDataGate::setIsQueryBySalary][m_isQueryBySalary] := " << m_isQueryBySalary;
    emit isQueryBySalaryChanged();
}

void JobDataGate::setIsQueryByCityName(int _isQueryByCityName)
{
    m_isQueryByCityName = _isQueryByCityName;
    qDebug() << "[JobDataGate::setIsQueryByCityName][m_isQueryByCityName] := " << m_isQueryByCityName;
    emit isQueryByCityNameChanged();
}

void JobDataGate::setIsQueryByDistance(int _isQueryByDistance)
{
    m_isQueryByDistance = _isQueryByDistance;
    qDebug() << "[JobDataGate::setIsQueryByDistance][m_isQueryByDistance] := " << m_isQueryByDistance;
    emit isQueryByDistanceChanged();
}

void JobDataGate::setIsQueryByJobLevel(int _isQueryByJobLevel)
{
    m_isQueryByJobLevel = _isQueryByJobLevel;
    qDebug() << "[JobDataGate::setIsQueryByJobLevel][m_isQueryByJobLevel] := " << m_isQueryByJobLevel;
    emit isQueryByJobLevelChanged();
}

void JobDataGate::setIsQueryByJobType(int _isQueryByJobType)
{
    m_isQueryByJobType = _isQueryByJobType;
    qDebug() << "[JobDataGate::setIsQueryByJobType][m_isQueryByJobType] := " << m_isQueryByJobType;
    emit isQueryByJobTypeChanged();
}

void JobDataGate::setDistance(const QString &_distance) // is kilometers
{
    m_distance = QString::number(_distance.toFloat()*1000);
    qDebug() << "[JobDataGate::setDistance][m_distance] := " << m_distance;
    if(_distance.length() == 0){
        setIsQueryByDistance(RabbitJobEnums::NO_QUERY_BY_DISTANCE);
        return;
    }

    if(_distance.toFloat() > 200){
        setIsQueryByDistance(RabbitJobEnums::NO_QUERY_BY_DISTANCE);
        emit distanceInvalid();
        return;
    }
    else {
        setIsQueryByDistance(RabbitJobEnums::QUERY_BY_DISTANCE);
        emit distanceValid();
        qDebug () << m_isQueryByDistance;
    }
    emit distanceChanged();
}

void JobDataGate::setCityName(const QString &_cityName)
{
    m_cityName = _cityName;
    qDebug() << "[JobDataGate::setDistance][m_cityName] := " << m_cityName;
    if(m_cityName.length() == 0){
        setIsQueryByCityName(RabbitJobEnums::NO_QUERY_BY_CITY_NAME);
        return;
    }
    setIsQueryByCityName(RabbitJobEnums::QUERY_BY_CITY_NAME);
    emit cityNameChanged();
}

void JobDataGate::setSalary(const QString &_salary) // USD
{
    m_salary = _salary;
    qDebug() << "[JobDataGate::setSalary][m_salary] := " << m_salary;
    if(m_salary.length() == 0){
        setIsQueryBySalary(RabbitJobEnums::NO_QUERY_BY_SALARY);
        return;
    }
    checkSalaryValid();
    emit salaryChanged();
}

void JobDataGate::setJobLevel(const QString &_jobLevel)
{
    m_jobLevel = _jobLevel;
    if(m_jobLevel.length() == 0) {
        setIsQueryByJobLevel(RabbitJobEnums::NO_QUERY_BY_JOB_LEVEL);
    }
    else {
        setIsQueryByJobLevel(RabbitJobEnums::QUERY_BY_JOB_LEVEL);
        qDebug() << "[JobDataGate::setJobLevel][m_jobLevel] := " << m_jobLevel;
    }
    emit jobLevelChanged();
}

void JobDataGate::setSkill(const QString &_skill)
{
    m_skill = _skill;
    emit skillChanged();
//    if(m_skill == ""){
//        emit skillFieldEmpty();
//    }
}

void JobDataGate::setCurrentListIndex(int _currentListIndex)
{
    m_currentListIndex = _currentListIndex;
}

void JobDataGate::setLimitRowsPerList(int _limitRowsPerList)
{
    m_limitRowsPerList = _limitRowsPerList;
}

void JobDataGate::queryTotalRows()
{
    if(m_skill == "") {
        qDebug() << "[JobDataGate::queryTotalRows] : searchFieldArea is empty (m_skill.length() == 0), do not execute the query";
        m_totalRows = 0;
        emit totalRowsChanged(m_totalRows);
        return this->clear();
    }
    QString queryStatement = "SELECT COUNT(*) FROM JOB_INFORMATION" + queryByConditions();
    qDebug() << "[JobDataGate::queryTotalRows][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        qSelect.next();
        m_totalRows = qSelect.value(0).toInt();
        emit totalRowsChanged(m_totalRows);
        qDebug() << "[JobDataGate::queryTotalRows][m_totalRows] := " << m_totalRows;
        connect().close();
    }
    else
        qDebug()<<"[JobDataGate::queryTotalRows] := Connect unsuccessful!!!";
}

void JobDataGate::queryRowsInList(int listIndex, int limitRowsInList)
{
    int N = listIndex * limitRowsInList - limitRowsInList;
    clear();
    if(m_skill == ""){
        emit dataChanged();
        return;
    }
    QString queryStatement = "SELECT * FROM JOB_INFORMATION" + queryByConditions() + " LIMIT " + QString::number(N) + ", " + QString::number(limitRowsInList) + "";
    qDebug() << "[JobDataGate::queryRowsInList][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        while (qSelect.next()){
            JobInfoStruct jobInfo; // do something with this
            jobInfo.setID(qSelect.value(0).toInt());
            jobInfo.setAccountID(qSelect.value(1).toInt());
            jobInfo.setJobTitle(qSelect.value(2).toString());
            jobInfo.setJobDate(qSelect.value(3).toDate());
            jobInfo.setAddress(qSelect.value(4).toString());
            jobInfo.setSalary(qSelect.value(5).toInt());
            jobInfo.setLevel(qSelect.value(6).toString());
            jobInfo.setDescription(qSelect.value(7).toString());
            jobInfo.setLogo(qSelect.value(8).toString());
            jobInfo.setJobType(qSelect.value(9).toString());
            jobInfo.setLongitude(qSelect.value(10).toFloat());
            jobInfo.setLatitude(qSelect.value(11).toFloat());
            //jobInfo.show();
            m_pCache->append(jobInfo);
        }
        connect().close();
        emit dataChanged();
    }
    else
        qDebug()<<"[JobDataGate::queryRowsInList] := Connect unsuccessful!!!";
}

void JobDataGate::clear()
{
    m_pCache->clear();
}

QList<JobInfoStruct> *JobDataGate::getDataReference() const
{
    return m_pCache;
}

QSqlDatabase JobDataGate::connect()
{
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
        database.setUserName(m_dbUserName);
        database.setPassword(m_dbPassword);
    }
    return database;
}

QString JobDataGate::queryByConditions()
{
//    if(m_skill.length() == 0) {
//        return "";
//    }
    QString conditions = " WHERE `job_title` LIKE '%" + m_skill + "%'";
    switch (m_isQueryBySalary) {
        case RabbitJobEnums::NO_QUERY_BY_SALARY: {
            break;
        }
        case RabbitJobEnums::QUERY_BY_SALARY: {
            conditions += " AND `salary` = " + m_salary;
            break;
        }
        case RabbitJobEnums::QUERY_BY_SALARY_RANGE: {
            conditions += splitSalaryRangeCondition();
            break;
        }
        default: break;
    } // switch (m_isQueryBySalary)
    switch (m_isQueryByCityName) {
        case RabbitJobEnums::NO_QUERY_BY_CITY_NAME: {
            break;
        }
        case RabbitJobEnums::QUERY_BY_CITY_NAME: {
            conditions += " AND `address` LIKE '%" + m_cityName + "%'";
            break;
        }
        default: break;
    } // switch (m_isQueryByCityName)
    switch (m_isQueryByDistance) {
        case RabbitJobEnums::NO_QUERY_BY_DISTANCE: {
            break;
        }
        case RabbitJobEnums::QUERY_BY_DISTANCE: {
            // query dựa trên công thức tính kinh độ và vĩ độ hiện tại so với kinh độ và vĩ độ trong jobinfo
            // ACOS( SIN(lat1)*SIN(lat2) + COS(lat1)*COS(lat2)*COS(lon2-lon1) ) * 6371000
            // 1 is job location, 2 is current location
            conditions += " AND ACOS(SIN(latitude)*SIN(" + m_currentLatitude + ")+COS(latitude)*COS(" + m_currentLatitude + ")*COS(" + m_currentLongitude + "-longitude))*6377.830272 <= " + m_distance;
            break;
        }
        default: break;
    } // switch (m_isQueryByDistance)
    switch (m_isQueryByJobLevel) {
        case RabbitJobEnums::NO_QUERY_BY_JOB_LEVEL: {
            break;
        }
        case RabbitJobEnums::QUERY_BY_JOB_LEVEL: {
            conditions += " AND `level` LIKE '%" + m_jobLevel + "%'";
            break;
        }
        default: break;
    } // switch (m_isQueryByJobLevel)
    switch (m_isQueryByJobType) {
        case RabbitJobEnums::NO_QUERY_BY_JOB_TYPE: {
            break;
        }
        case RabbitJobEnums::QUERY_BY_FULLTIME: {
            conditions += " AND `job_type` = 'Full time'";
            break;
        }
        case RabbitJobEnums::QUERY_BY_PARTTIME: {
            conditions += " AND `job_type` = 'Part time'";
            break;
        }
        default: break;
    }
    return conditions;
}

QString JobDataGate::splitSalaryRangeCondition() // ???????????????/
{
    // find minSalary(QString) and maxSalary(QString) if m_salary looks like: "1000-5000"
    // Alway return "'salary' >= minSalary AND 'salary' <= maxSalary"
    qDebug() << "----------------------------------------------------";
    QList<QString> salaryRange;
    int count = 0;
    Q_FOREACH(QString salary, m_salary.split('-')){
        salaryRange.push_back(salary);
        count++;
    }
    qDebug() << "[JobDataGate::splitSalaryRangeCondition()]: AND `salary` >= " + salaryRange[0] + " AND `salary` <= " + salaryRange[1];;
    return " AND `salary` >= " + salaryRange[0] + " AND `salary` <= " + salaryRange[1];
}

void JobDataGate::checkSalaryValid()
{
    if(!m_salary.contains('-')){
        if(m_salary.toInt()){
            setIsQueryBySalary(RabbitJobEnums::QUERY_BY_SALARY);
            emit salaryValid();
        }
        else{
            setIsQueryBySalary(RabbitJobEnums::NO_QUERY_BY_SALARY);
            emit salaryInvalid();
        }
    }
    else {
        int count = 0;
        Q_FOREACH(QString salary, m_salary.split('-')){
            if(count == 2 || !salary.toInt()){
                setIsQueryBySalary(RabbitJobEnums::NO_QUERY_BY_SALARY);
                emit salaryInvalid();
                return;
            }
            count++;
        } // Q_FOREACH

        setIsQueryBySalary(RabbitJobEnums::QUERY_BY_SALARY_RANGE);
        emit salaryValid();
    }
}
