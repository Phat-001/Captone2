#include "wishjobdatagate.h"

WishJobDataGate::WishJobDataGate(const QString &userName, const QString &password, QObject *parent)
    : QAbstractListModel{parent},
      m_dbUserName{userName},
      m_dbPassword{password}
{
    m_login = Login::getInstance();
    QObject::connect(m_login, &Login::isLoggedInChanged, this, &WishJobDataGate::onIsLoggedInChanged);
}

int WishJobDataGate::rowCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return m_wishJobStructList.length();
}

int WishJobDataGate::columnCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return (m_wishJobStructList.length() == 0)? 0 : 1;
}

QVariant WishJobDataGate::data(const QModelIndex &index, int role) const
{
    if(!index.isValid() || (m_wishJobStructList.length() == 0)) return QVariant();
    switch (role) {
        case JobTitleRole:
            return m_wishJobStructList.at(index.row()).getJobTitle();
        case JobDayOfMonthRole:
            return m_wishJobStructList.at(index.row()).getJobDate().day();
        case JobMonthRole:
            return m_wishJobStructList.at(index.row()).getJobDate().month();
        case JobYearRole:
            return m_wishJobStructList.at(index.row()).getJobDate().year();
        case AddressRole:
            return m_wishJobStructList.at(index.row()).getAddress();
        case SalaryRole:
            return m_wishJobStructList.at(index.row()).getSalary();
        case LevelRole:
            return m_wishJobStructList.at(index.row()).getLevel();
        case DescriptionRole:
            return m_wishJobStructList.at(index.row()).getDescription();
        case LogoRole:
            return m_wishJobStructList.at(index.row()).getLogo();
        case JobTypeRole:
            return m_wishJobStructList.at(index.row()).getJobType();
        case LongitudeRole:
            return m_wishJobStructList.at(index.row()).getLongitude();
        case LatitudeRole:
            return m_wishJobStructList.at(index.row()).getLatitude();
        case IsScheduleSettedRole:
            return m_wishJobStructList.at(index.row()).getIsScheduleSetted();
        case ScheduleDayOfWeekRole:
            return dayMapping[m_wishJobStructList.at(index.row()).getScheduleDate().dayOfWeek()];
        case ScheduleDayOfMonthRole:
            return m_wishJobStructList.at(index.row()).getScheduleDate().day();
        case ScheduleMonthRole:
            return m_wishJobStructList.at(index.row()).getScheduleDate().month();
        case ScheduleYearRole:
            return m_wishJobStructList.at(index.row()).getScheduleDate().year();
        case StartHourRole:
            return m_wishJobStructList.at(index.row()).getStartHour();
        case StartMinuteRole:
            return m_wishJobStructList.at(index.row()).getStartMinute();
        case FinishHourRole:
            return m_wishJobStructList.at(index.row()).getFinishHour();
        case FinishMinuteRole:
            return m_wishJobStructList.at(index.row()).getFinishMinute();
        case NoteRole:
            return m_wishJobStructList.at(index.row()).getNote();
        case JobIDRole:
            return m_wishJobStructList.at(index.row()).getID();
        case DateRole: {
            QDate _date = m_wishJobStructList.at(index.row()).getScheduleDate();
            return QString::number(_date.year()) + '-'
                 + QString::number(_date.month()) + '-'
                 + QString::number(_date.day());
        }
        case TimeRole: {
            WishJobStruct _wish = m_wishJobStructList.at(index.row());
            return QString::number(_wish.getStartHour()) + ':' + QString::number(_wish.getStartMinute()) + '-' +
                   QString::number(_wish.getFinishHour()) + ':' + QString::number(_wish.getFinishMinute());
        }
        default:
            return QVariant();
    }
}

QHash<int, QByteArray> WishJobDataGate::roleNames() const
{
    static QHash<int, QByteArray> mapping{
        {JobTitleRole, "jobTitle"},
        {JobDayOfMonthRole, "jobDayOfMonth"},
        {JobMonthRole, "jobMonth"},
        {JobYearRole, "jobYear"},
        {AddressRole, "address"},
        {SalaryRole, "salary"},
        {LevelRole, "level"},
        {DescriptionRole, "description"},
        {LogoRole, "logo"},
        {JobTypeRole, "jobType"},
        {LongitudeRole, "longitude"},
        {LatitudeRole, "latitude"},
        {IsScheduleSettedRole, "isScheduleSetted"},
        {ScheduleDayOfWeekRole, "scheduleDayOfWeek"},
        {ScheduleDayOfMonthRole, "scheduleDayOfMonth"},
        {ScheduleMonthRole, "scheduleMonth"},
        {ScheduleYearRole, "scheduleYear"},
        {StartHourRole, "startHour"},
        {StartMinuteRole, "startMinute"},
        {FinishHourRole, "finishHour"},
        {FinishMinuteRole, "finishMinute"},
        {NoteRole, "note"},
        {JobIDRole, "jobID"},
        {DateRole, "date"},
        {TimeRole, "time"}
    };
    return mapping;
}

void WishJobDataGate::show() const
{

}

void WishJobDataGate::queryWishJob()
{
    m_wishJobStructList.clear();
    if(!m_login->isLoggedIn()){
        qDebug() << "[WishJobDataGate::queryWishJob()] : You are not logged in!";
        emit modelChanged();
        return;
    }
    QString queryStatement =
            "SELECT i.job_title, i.job_date, i.address, i.salary, i.level, i.description, i.logo, i.job_type, i.longitude, i.latitude, "\
            "w.isScheduleSetted, w.schedule_date, w.start_hour, w.start_minute, w.finish_hour, w.finish_minute, w.note, i.job_id " \
            "FROM ACCOUNT a, WISH_JOB w, JOB_INFORMATION i " \
            "WHERE a.account_id = w.account_id AND w.job_id = i.job_id AND a.account_id = " + QString::number(m_login->account()->getAccountID()) + ";";
    qDebug()<< "[WishJobDataGate::queryWishJob()][queryStatement] := \n" + queryStatement;
    // do something
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        while (qSelect.next()){
            WishJobStruct jobInfo; // do something with this
            jobInfo.setJobTitle(qSelect.value(0).toString());
            jobInfo.setJobDate(qSelect.value(1).toDate());
            jobInfo.setAddress(qSelect.value(2).toString());
            jobInfo.setSalary(qSelect.value(3).toInt());
            jobInfo.setLevel(qSelect.value(4).toString());
            jobInfo.setDescription(qSelect.value(5).toString());
            jobInfo.setLogo(qSelect.value(6).toString());
            jobInfo.setJobType(qSelect.value(7).toString());
            jobInfo.setLongitude(qSelect.value(8).toFloat());
            jobInfo.setLatitude(qSelect.value(9).toFloat());
            jobInfo.setIsScheduleSetted(qSelect.value(10).toBool());
            jobInfo.setScheduleDate(qSelect.value(11).toDate());
            jobInfo.setStartTime(qSelect.value(12).toInt(), qSelect.value(13).toInt());
            jobInfo.setFinishTime(qSelect.value(14).toInt(), qSelect.value(15).toInt());
            jobInfo.setNote(qSelect.value(16).toString());
            jobInfo.setID(qSelect.value(17).toInt());
            //jobInfo.show();
            m_wishJobStructList.append(jobInfo);
        }
        setIsEmpty(isEmpty());
        connect().close();
    }
    else
        qDebug()<<"[JobDataGate::queryRowsInList] := Connect unsuccessful!!!";

    emit modelChanged();
}

void WishJobDataGate::addWishJob(int _jobID)
{
    if(!m_login->isLoggedIn()){
        qDebug() << "[WishJobDataGate::addWishJob(int _jobID)] : You are not logged in!";
        return;
    }
    QString queryStatement =
            "INSERT INTO WISH_JOB (account_id, job_id, schedule_date, note) "\
            "VALUES (" + QString::number(m_login->account()->getAccountID()) + ", "
            + QString::number(_jobID) + ", " + QString("'2000-01-01'") + ", ''" + ")";
    qDebug() << "[WishJobDataGate::addWishJob(int _jobID)][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        Q_UNUSED(qSelect);
        connect().close();
        queryWishJob();
    }
    else
        qDebug()<<"[WishJobDataGate::addWishJob(int _jobID)] := Connect unsuccessful!!!";
}

void WishJobDataGate::cancelSchedule(int _jobID)
{
    if(!m_login->isLoggedIn()){
        qDebug() << "[WishJobDataGate::cancelSchedule(int _jobID)] : You are not logged in!";
        return;
    }
    QString queryStatement =
            "UPDATE WISH_JOB "\
            "SET isScheduleSetted = 0 "\
            "WHERE account_id = " + QString::number(m_login->account()->getAccountID()) + " AND job_id = " + QString::number(_jobID);
    qDebug() << "[WishJobDataGate::cancelSchedule(int _jobID)][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        Q_UNUSED(qSelect);
        connect().close();
        queryWishJob();
    }
    else
        qDebug()<<"[WishJobDataGate::addWishJob(int _jobID)] := Connect unsuccessful!!!";
}

void WishJobDataGate::setSchedule(int _jobID, QString _date, QString _startHour, QString _startMinute,
                                  QString _finishHour, QString _finishMinute, QString _note)
{
    if(!m_login->isLoggedIn()){
        qDebug() << "[WishJobDataGate::setSchedule(int, QString, QString, QString, QString, QString, QString)] : You are not logged in!";
        return;
    }
    QString queryStatement =
            "UPDATE WISH_JOB "\
            "SET schedule_date = '" + _date + "', start_hour = " + _startHour + ", start_minute = " + _startMinute
            + ", finish_hour = " + _finishHour + ", finish_minute = " + _finishMinute + ", note = '" + _note + "'"
            + ", isScheduleSetted = 1 "\
            "WHERE account_id = " + QString::number(m_login->account()->getAccountID()) + " AND job_id = " + QString::number(_jobID);
    qDebug() << "[WishJobDataGate::setSchedule(int, QString, QString, QString, QString, QString, QString)][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        Q_UNUSED(qSelect);
        connect().close();
        queryWishJob();
    }
    else
        qDebug()<<"[WishJobDataGate::addWishJob(int _jobID)] := Connect unsuccessful!!!";
}

void WishJobDataGate::deleteWishJob(int _jobID)
{
    if(!m_login->isLoggedIn()){
        qDebug() << "[WishJobDataGate::addWishJob(int _jobID)] : You are not logged in!";
        return;
    }
    QString queryStatement =
            "DELETE FROM WISH_JOB WHERE " + QString("account_id = ") + QString::number(m_login->account()->getAccountID())
            + " AND job_id = " + QString::number(_jobID);
    qDebug() << "[WishJobDataGate::deleteWishJob(int _jobID)][queryStatement] := " << queryStatement;
    if (connect().open()){
        QSqlQuery qSelect(queryStatement);
        connect().close();
        queryWishJob();
    }
    else
        qDebug()<<"[WishJobDataGate::deleteWishJob(int _jobID)] := Connect unsuccessful!!!";
}

bool WishJobDataGate::isInWishList(int _jobID) const
{
    if(m_login->isLoggedIn()){
        for(auto iter = m_wishJobStructList.cbegin(); iter != m_wishJobStructList.cend(); iter++){
            if(iter->getID() == _jobID) return true;
        }
    }
    return false;
}

QString WishJobDataGate::findSchedule(QString _date) // 2020-12-25
{
    QString result;
    for(auto iter = m_wishJobStructList.begin(); iter != m_wishJobStructList.end(); iter++){
        if(_date == iter->getDate() && iter->getIsScheduleSetted() == 1){
            result += iter->getJobTitle() + "-@-"; /*job title*/
            result += QString::number(iter->getDeltaTime()) + "-@-"; /*delta time*/
            result += QString::number(float(iter->getStartHour()) + float(iter->getStartMinute())/60.0) + "-@-"; /*start time, exp: 7.5 is 7h30m*/
            result += QString::number(iter->getStartHour()) + ":" + QString::number(iter->getStartMinute()) + "-" +
                      QString::number(iter->getFinishHour()) + ":" + QString::number(iter->getFinishMinute()) + "-@-"; /*time*/
            result += iter->getNote() + "-@-"; /*note*/
            //---------------------
            result += QString::number(iter->getSalary()) + "-@-"; /*salary*/
            result += iter->getAddress() + "-@-"; /*address*/
            result += iter->getLevel() + "-@-"; /*level*/
            result += iter->getJobType() + "-@-"; /*type*/
            result += iter->getLogo() + "-@-"; /*logo*/
            result += QString::number(iter->getLongitude()) + "-@-"; /*longitude*/
            result += QString::number(iter->getLatitude()) + "-@-"; /*latitude*/
            result += iter->getDescription() + "-&-"; /*description*/
            // -&-
        }
    }
    return result;
}

bool WishJobDataGate::isEmpty() const
{
    return m_wishJobStructList.length() == 0;
}

void WishJobDataGate::setIsEmpty(bool _isEmpty)
{
    m_isEmpty = _isEmpty;
    emit isEmptyChanged();
}

QList<WishJobStruct> *WishJobDataGate::getDataReference()
{
    return &m_wishJobStructList;
}

void WishJobDataGate::onIsLoggedInChanged()
{
    queryWishJob();
}

QSqlDatabase WishJobDataGate::connect()
{
    QSqlDatabase database;
    if(QSqlDatabase::contains("qt_sql_default_connection")){
        database = QSqlDatabase::database("qt_sql_default_connection");
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
