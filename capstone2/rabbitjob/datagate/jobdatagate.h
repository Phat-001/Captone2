#ifndef JOBDATAGATE_H
#define JOBDATAGATE_H

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QObject>
#include <QDebug>
#include "datagate/jobinfo_datagate/jobinfo_struct.h"
#include "rabbitjobenums.h"

/*
  Class này được viết ra chỉ dành cho việc Search Job, còn việc hiển thị job lên đầu trang home thì dùng class khác ngắn hơn
  setContextProperty cho class này. Phải binding data của các TextField trong filterDrawer với class này. Khi salary thay đổi
  thì isQueryBySalary cũng phải thay đổi theo
 */
class JobDataGate : public QObject
{
    Q_OBJECT
    Q_PROPERTY(int isQueryBySalary READ isQueryBySalary WRITE setIsQueryBySalary NOTIFY isQueryBySalaryChanged)
    Q_PROPERTY(int isQueryByCityName READ isQueryByCityName WRITE setIsQueryByCityName NOTIFY isQueryByCityNameChanged)
    Q_PROPERTY(int isQueryByDistance READ isQueryByDistance WRITE setIsQueryByDistance NOTIFY isQueryByDistanceChanged)
    Q_PROPERTY(int isQueryByJobLevel READ isQueryByJobLevel WRITE setIsQueryByJobLevel NOTIFY isQueryByJobLevelChanged)
    Q_PROPERTY(int isQueryByJobType READ isQueryByJobType WRITE setIsQueryByJobType NOTIFY isQueryByJobTypeChanged)
    Q_PROPERTY(QString distance READ distance WRITE setDistance NOTIFY distanceChanged)
    Q_PROPERTY(QString cityName READ cityName WRITE setCityName NOTIFY cityNameChanged)
    Q_PROPERTY(QString salary READ salary WRITE setSalary NOTIFY salaryChanged)
    Q_PROPERTY(QString jobLevel READ jobLevel WRITE setJobLevel NOTIFY jobLevelChanged)
    Q_PROPERTY(QString skill READ skill WRITE setSkill NOTIFY skillChanged)

public:
    //JobDataGate(QObject *parent = nullptr);
    JobDataGate(const QString &userName = "root", const QString &password = "", QObject *parent = nullptr);
    virtual ~JobDataGate();

    // READ:
    int isQueryBySalary() const;
    int isQueryByCityName() const;
    int isQueryByDistance() const;
    int isQueryByJobLevel() const;
    int isQueryByJobType() const;
    QString distance() const;
    QString cityName() const;
    QString salary() const;
    QString jobLevel() const;
    QString skill() const;
    //QString jobType() const;

    // WRITE:
    void setIsQueryBySalary(int _isQueryBySalary);
    void setIsQueryByCityName(int _isQueryByCityName);
    void setIsQueryByDistance(int _isQueryByDistance);
    void setIsQueryByJobLevel(int _isQueryByJobLevel);
    void setIsQueryByJobType(int _isQueryByJobType);
    void setDistance(const QString &_distance);
    void setCityName(const QString &_cityName);
    void setSalary(const QString &_salary);
    void setJobLevel(const QString &_jobLevel);
    void setSkill(const QString &_skill);
    void setCurrentListIndex(int);
    void setLimitRowsPerList(int);

    // OTHER METHODS:
    void queryTotalRows();
    Q_INVOKABLE void queryRowsInList(int listIndex, int limitRowsInList);
    void show() const;
    void clear();
    QList<JobInfoStruct> readCache() const;
    QList<JobInfoStruct>* getDataReference() const;

signals:
    // NOTIFY:
    void isQueryBySalaryChanged();
    void isQueryByCityNameChanged();
    void isQueryByDistanceChanged();
    void isQueryByJobLevelChanged();
    void isQueryByJobTypeChanged();
    void distanceChanged();
    void cityNameChanged();
    void salaryChanged();
    void jobLevelChanged();
    void skillChanged();
    void skillFieldEmpty();

    // OTHER SIGNALS:
    void totalRowsChanged(int _totalRows); // Được phát ra bởi queryTotalRows()
    void salaryInvalid();
    void salaryValid();
    void distanceInvalid();
    void distanceValid();
    void dataChanged();

private:
    int m_isQueryBySalary;
    int m_isQueryByCityName;
    int m_isQueryByDistance;
    int m_isQueryByJobLevel;
    int m_isQueryByJobType;
    QString m_distance; // meter
    QString m_cityName;
    QString m_salary; // USD
    QString m_jobLevel; // internship, fresher, junior or senior, partleader, PM,...
    QString m_skill; // PHP Laravel, C++, Python, Machine Learning
    //QString m_jobType; // "Part time" or "Full time"

    // Read from API to detect current location, need a pointer to that API to listen signal
    QString m_currentLongitude = "108.238713";
    QString m_currentLatitude = "16.06005";

    // For db connection:
    QString m_dbUserName;
    QString m_dbPassword;
    QString m_databaseName;

    int m_totalRows; // Có thể không cần
    int m_currentListIndex;
    int m_limitRowsPerList;
    QList<JobInfoStruct> *m_pCache;

private: // private method
    QSqlDatabase connect();
    QString queryByConditions();
    QString splitSalaryRangeCondition();
    void checkSalaryValid();
};

#endif // JOBDATAGATE_H
