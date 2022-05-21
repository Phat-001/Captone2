#ifndef WEEKCONTROL_H
#define WEEKCONTROL_H

#include <QAbstractListModel>
#include <QList>
#include <QHash>
#include <QDate>
#include <QDebug>
#include "datagate/wishjobdatagate.h"

class WeekControl : public QAbstractListModel
{
    Q_OBJECT
public:
    enum Role {
        DayOfWeekRole = 0,
        DayOfMonthRole,
        MonthRole,
        YearRole,
        DateRole
    };

    explicit WeekControl(QObject *parent = nullptr);
    int rowCount(const QModelIndex& = QModelIndex()) const override;
    int columnCount(const QModelIndex& = QModelIndex()) const override;
    QVariant data(const QModelIndex&, int role) const override;
    QHash<int, QByteArray> roleNames() const override;

    Q_INVOKABLE void moveToNextWeek();
    Q_INVOKABLE void moveToPreviousWeek();
    Q_INVOKABLE void showDaysInWeek() const;
    Q_INVOKABLE QString getCurrentDay() const;
    void setWeekFollowDate(QDate);

signals:
    void dateListChanged();

public slots:

private:
    QList<QDate> *m_pDateList = 0; // 7 days in a week
    QList<WishJobStruct> *m_pWishJobStructListRef;
    QDate m_currentDay;
    QDate m_anchorDay;

    QHash<int, QString> dayMapping{
        {1, "Monday"},
        {2, "Tuesday"},
        {3, "Wednesday"},
        {4, "Thursday"},
        {5, "Friday"},
        {6, "Saturday"},
        {7, "Sunday"}
    };

};

#endif // WEEKCONTROL_H
