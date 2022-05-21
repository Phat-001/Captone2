#ifndef CONNECTDB_H
#define CONNECTDB_H

#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "jobinfo_struct.h"

class JobInfoDataGate{
    public:
        explicit JobInfoDataGate(const QString &userName = "root",
                          const QString &password = "");
        virtual ~JobInfoDataGate();

        QSqlDatabase connect();

        bool query(const QString &whatToFind = "*", const QString &tableName = "JOB_INFORMATION");

        /* Giúp luồng phụ kiểm tra xem công việc đã tồn tại hay
         * chưa
         */
        bool isJobExist(const QString &whatToFind,
                            const QString &whichAccountName,
                            const QString &tableName = "JOB_INFORMATION");

        // Insert to database
        bool insert(const JobInfoStruct &,
                    const QString &tableName = "JOB_INFORMATION");
        bool insert(const QList<JobInfoStruct> &,
                    const QString &tableName = "JOB_INFORMATION");

        // Đọc cache gốc:
        QList<JobInfoStruct> readCache();

        // Dùng khi cần refresh model view trong qml
        void resetCache(const QString &tableName = "JOB_INFORMATION");

        void queryTotalRow();

        void queryRowInList(int currentList = 1, int maxRowInList = 10);

        void show();

    private:
        QString m_userName;
        QString m_password;
        QList<JobInfoStruct> m_cache;
        QString m_databaseName;
        int m_totalRow;
        int m_maxRowInList = 10;
        int m_currentList = 1;

};

#endif // CONNECTDB_H
