#include "weekcontrol.h"

WeekControl::WeekControl(QObject *parent) : QAbstractListModel(parent)
{
    //connect(this, &WeekControl::dateListChanged, [this]{this->showDaysInWeek();});
    m_currentDay = QDate::currentDate();
    m_anchorDay = m_currentDay;
    setWeekFollowDate(m_currentDay);
}

int WeekControl::rowCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return m_pDateList->length();
}

int WeekControl::columnCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return (m_pDateList->length() == 0) ? 0 : 1;
}

QVariant WeekControl::data(const QModelIndex &index, int role) const
{
    if(m_pDateList == nullptr){
        qDebug() << "[WeekControl::data(const QModelIndex &index, int role)] : m_pDateList == nullptr";
    }
    if(!index.isValid() || (m_pDateList->length() == 0)) return QVariant();

    switch (role) {
        case DayOfWeekRole: // Monday, Tuesday
            return dayMapping[m_pDateList->at(index.row()).dayOfWeek()];
        case DayOfMonthRole:
            return m_pDateList->at(index.row()).day();
        case MonthRole:
            return m_pDateList->at(index.row()).month();
        case YearRole:
            return m_pDateList->at(index.row()).year();
        case DateRole: {
            QDate _date = m_pDateList->at(index.row());
            return QString::number(_date.year()) + "-" +
                   QString::number(_date.month()) + "-" +
                   QString::number(_date.day());
        }
        default:
            return QVariant();
    }
    return QVariant();
}

QHash<int, QByteArray> WeekControl::roleNames() const
{
    static QHash<int, QByteArray> mapping{
        {DayOfWeekRole, "dayOfWeek"},
        {DayOfMonthRole, "dayOfMonth"},
        {MonthRole, "month"},
        {YearRole, "year"},
        {DateRole, "date"}
    };
    return mapping;
}

void WeekControl::moveToNextWeek()
{
    m_anchorDay = m_anchorDay.addDays(7);
    setWeekFollowDate(m_anchorDay);
}

void WeekControl::moveToPreviousWeek()
{
    m_anchorDay = m_anchorDay.addDays(-7);
    setWeekFollowDate(m_anchorDay);
}

void WeekControl::showDaysInWeek() const
{
    qDebug()<< m_pDateList->length();
    for(auto iter = m_pDateList->begin(); iter != m_pDateList->end(); iter++){
        qDebug()<< dayMapping.value(iter->dayOfWeek()) << ": " << iter->toString();

    }
}

QString WeekControl::getCurrentDay() const
{
    return QString::number(m_currentDay.year()) + "-" +
           QString::number(m_currentDay.month()) + "-" +
           QString::number(m_currentDay.day());
}

void WeekControl::setWeekFollowDate(QDate _day)
{
    if(m_pDateList == nullptr){
        m_pDateList = new QList<QDate>;
    }
    int dayInWeekOrder = _day.dayOfWeek(); // 1 is monday, 7 is sunday
    int previousDay = dayInWeekOrder-1, nextDay = dayInWeekOrder+1;
    m_pDateList->clear();
    m_pDateList->push_back(_day);
    while ((previousDay >= 1) || (nextDay <= 7)) {
        if(previousDay >= 1){
            m_pDateList->push_front(_day.addDays(previousDay-dayInWeekOrder));
            previousDay--;
        }
        if(nextDay <= 7){
            m_pDateList->push_back(_day.addDays(nextDay-dayInWeekOrder));
            nextDay++;
        }
    }
    emit dateListChanged();
}
