#ifndef RABBITJOBENUMS_H
#define RABBITJOBENUMS_H
#include <QObject>

class RabbitJobEnums : public QObject
{
    Q_OBJECT
public:
    RabbitJobEnums() {}

    enum QUERY_BY_SALARY_STATE_ID: int {
        NO_QUERY_BY_SALARY = 0,
        QUERY_BY_SALARY,
        QUERY_BY_SALARY_RANGE
    };

    enum QUERY_BY_CITY_NAME_STATE_ID: int {
        NO_QUERY_BY_CITY_NAME = 0,
        QUERY_BY_CITY_NAME
    };

    enum QUERY_BY_DISTANCE_STATE_ID: int {
        NO_QUERY_BY_DISTANCE = 0,
        QUERY_BY_DISTANCE
    };

    enum QUERY_BY_JOB_LEVEL_STATE_ID: int {
        NO_QUERY_BY_JOB_LEVEL = 0,
        QUERY_BY_JOB_LEVEL
    };

    enum QUERY_BY_JOB_TYPE_STATE_ID: int {
        NO_QUERY_BY_JOB_TYPE = 0,
        QUERY_BY_FULLTIME,
        QUERY_BY_PARTTIME
    };
};
#endif // RABBITJOBENUMS_H
