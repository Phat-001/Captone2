#ifndef WISHJOBDATAGATE_H
#define WISHJOBDATAGATE_H

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QObject>
#include <QDebug>
#include <QAbstractListModel>
#include <QList>
#include "login.h"
#include "datagate/jobinfo_datagate/wishjobstruct.h"

/*
      Lan nay gop chung model voi datagate luon
   Class nay duoc tao sau khi goi Login::getInstance
   lan dau tien
*/
class WishJobDataGate : public QAbstractListModel
{
    Q_OBJECT
    Q_PROPERTY(bool isEmpty READ isEmpty WRITE setIsEmpty NOTIFY isEmptyChanged)
public:
    enum Roles{
        JobTitleRole = 0,
        JobDayOfMonthRole,
        JobMonthRole,
        JobYearRole,
        AddressRole,
        SalaryRole,
        LevelRole,
        DescriptionRole,
        LogoRole,
        JobTypeRole, /*10*/
        LongitudeRole,
        LatitudeRole,
        IsScheduleSettedRole,
        ScheduleDayOfWeekRole,
        ScheduleDayOfMonthRole,
        ScheduleMonthRole,
        ScheduleYearRole,
        StartHourRole,
        StartMinuteRole,
        FinishHourRole,
        FinishMinuteRole,
        NoteRole,
        JobIDRole,
        DateRole,
        TimeRole
    };

    explicit WishJobDataGate(const QString &userName = "root", const QString &password = "", QObject *parent = nullptr);

    int rowCount(const QModelIndex& = QModelIndex()) const override;
    int columnCount(const QModelIndex& = QModelIndex()) const override;
    QVariant data(const QModelIndex&, int role) const override;
    QHash<int, QByteArray> roleNames() const override;
    void show() const;
    void queryWishJob();
    Q_INVOKABLE void addWishJob(int _jobID);
    Q_INVOKABLE void cancelSchedule(int _jobID);
    Q_INVOKABLE void setSchedule(int _jobID, QString _date, QString _startHour, QString _startMinute,
                                 QString _finishHour, QString _finishMinute, QString _note);
    Q_INVOKABLE void deleteWishJob(int _jobID);
    Q_INVOKABLE bool isInWishList(int _jobID) const;

    Q_INVOKABLE QString findSchedule(QString _date); //////////////////////
    // READ:
    bool isEmpty() const;

    // WRITE:
    void setIsEmpty(bool _isEmpty);

    QList<WishJobStruct> *getDataReference();

signals:
    void modelChanged();
    void isEmptyChanged();

public slots:
    void onIsLoggedInChanged();

private:
    QList<WishJobStruct> m_wishJobStructList;
    QHash<int, QString> dayMapping{
        {1, "Monday"},
        {2, "Tuesday"},
        {3, "Wednesday"},
        {4, "Thursday"},
        {5, "Friday"},
        {6, "Saturday"},
        {7, "Sunday"}
    };
private:
    QSqlDatabase connect();
    Login *m_login = nullptr;
    QString m_dbUserName;
    QString m_dbPassword;
    bool m_isEmpty = true;
};

#endif // WISHJOBDATAGATE_H
