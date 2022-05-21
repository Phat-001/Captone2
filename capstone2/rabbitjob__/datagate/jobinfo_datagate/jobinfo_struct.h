#ifndef JOBINFO_STRUCT_H
#define JOBINFO_STRUCT_H

#include <QObject>
#include <QString>

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


    void show() const;

    bool operator==(const JobInfoStruct &) const;
private:
    int id;
    int accountID;
    QString jobTitle;
    QDate jobDate;
    QString address;
    int salary;
    QString level;
    QString description;
    QString logo;
    QString jobType;
};

#endif // JOBINFO_STRUCT_H
