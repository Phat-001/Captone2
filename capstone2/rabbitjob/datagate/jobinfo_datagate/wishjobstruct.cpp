#include "wishjobstruct.h"

WishJobStruct::WishJobStruct(){}

void WishJobStruct::setIsScheduleSetted(bool _isScheduleSetted)
{
    m_isScheduleSetted = _isScheduleSetted;
}

void WishJobStruct::setScheduleDate(QDate _scheduleDate)
{
    m_scheduleDate = _scheduleDate;
}

void WishJobStruct::setStartTime(int _startHour, int _startMinute)
{
    m_startHour = _startHour;
    m_startMinute = _startMinute;
}

void WishJobStruct::setFinishTime(int _finishHour, int _finishMinute)
{
    m_finishHour = _finishHour;
    m_finishMinute = _finishMinute;
}

void WishJobStruct::setNote(const QString &_note)
{
    m_note = _note;
}

bool WishJobStruct::getIsScheduleSetted() const
{
    return m_isScheduleSetted;
}

QDate WishJobStruct::getScheduleDate() const
{
    return m_scheduleDate;
}

int WishJobStruct::getStartHour() const
{
    return m_startHour;
}

int WishJobStruct::getStartMinute() const
{
    return m_startMinute;
}

int WishJobStruct::getFinishHour() const
{
    return m_finishHour;
}

int WishJobStruct::getFinishMinute() const
{
    return m_finishMinute;
}

QString WishJobStruct::getNote() const
{
    return m_note;
}

QString WishJobStruct::getDate() const
{
    return QString::number(m_scheduleDate.year()) + '-' +
           QString::number(m_scheduleDate.month()) + '-' +
           QString::number(m_scheduleDate.day());
}

float WishJobStruct::getDeltaTime() const // return hour format, exp: 1.25 h
{
    if(m_isScheduleSetted == false){
        qDebug() << "[WishJobStruct::getDeltaTime()] : This job has not been selected yet";
    }
    return ((m_finishHour-m_startHour)*60.0 + float(m_finishMinute) - float(m_startMinute))/60.0;
}

void WishJobStruct::show() const
{
    qDebug () << "-------------------------------";
    JobInfoStruct::show();
    qDebug () << "Start at " << m_startHour << ":" << m_startMinute << " and finish at "
              << m_finishHour << ":" << m_finishMinute;
}
