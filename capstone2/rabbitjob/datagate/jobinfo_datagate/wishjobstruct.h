#ifndef WISHJOBSTRUCT_H
#define WISHJOBSTRUCT_H

#include "jobinfo_struct.h"

class WishJobStruct : public JobInfoStruct
{
public:
    WishJobStruct();

    //void setJobID(int _jobID);
    void setIsScheduleSetted(bool _isScheduleSetted);
    void setScheduleDate(QDate _scheduleDate);
    void setStartTime(int _startHour = 0, int _startMinute = 0);
    void setFinishTime(int _finishHour = 0, int _finishMinute = 0);
    void setNote(const QString &_note);

    //int getJobID() const;
    bool getIsScheduleSetted() const;
    QDate getScheduleDate() const;
    int getStartHour() const;
    int getStartMinute() const;
    int getFinishHour() const;
    int getFinishMinute() const;
    QString getNote() const;
    QString getDate() const;

    float getDeltaTime() const;

    void show() const override;

private:
    bool m_isScheduleSetted = false;
    QDate m_scheduleDate;
    int m_startHour = 0;
    int m_startMinute = 0;
    int m_finishHour = 0;
    int m_finishMinute = 0;
    QString m_note = "";
};

#endif // WISHJOBSTRUCT_H
