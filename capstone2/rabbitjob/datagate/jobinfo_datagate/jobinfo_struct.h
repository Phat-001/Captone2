#ifndef JOBINFO_STRUCT_H
#define JOBINFO_STRUCT_H

#include <QObject>
#include <QString>
#include <QDate>
#include <QDebug>

class JobInfoStruct
{
public:
    JobInfoStruct();

    void setID(int);
    void setAccountID(int);
    void setJobTitle(const QString &);
    void setJobDate(const QDate &);
    void setAddress(const QString &);
    void setSalary(int);
    void setLevel(const QString &);
    void setDescription(const QString &);
    void setLogo(const QString &);
    void setJobType(const QString &);
    void setLongitude(float);
    void setLatitude(float);

    int getID() const;
    int getAccountID() const;
    QString getJobTitle() const;
    QDate getJobDate() const;
    QString getAddress() const;
    int getSalary() const;
    QString getLevel() const;
    QString getDescription() const;
    QString getLogo() const;
    QString getJobType() const;
    float getLongitude() const;
    float getLatitude() const;

    virtual void show() const;

    bool operator==(const JobInfoStruct &) const;
private:
    int m_id;
    int m_accountID; // Day la account id cua HR
    QString m_jobTitle;
    QDate m_jobDate;
    QString m_address;
    int m_salary;
    QString m_level;
    QString m_description;
    QString m_logo;
    QString m_jobType;
    float m_longitude;
    float m_latitude;
};

#endif // JOBINFO_STRUCT_H
