#ifndef CONNECTDB_H
#define CONNECTDB_H

#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "cvfile_struct.h"

class CVFileDataGate{
    public:
        explicit CVFileDataGate(const QString &userName = "root",
                          const QString &password = "");
        virtual ~CVFileDataGate();

        QSqlDatabase connect();

        bool query(const QString &whatToFind = "*", const QString &tableName = "CV_FILE");

        /* Giúp luồng phụ kiểm tra xem file đã tồn tại hay
         * chưa
         */
        bool isPostExist(const QString &whatToFind,
                            const QString &whichAccount,
                            const QString &tableName = "CV_FILE");

        // Insert to database
        bool insert(const CVFileStruct &,
                    const QString &tableName = "CV_FILE");
        bool insert(const QList<CVFileStruct> &,
                    const QString &tableName = "CV_FILE");

        // Đọc cache gốc:
        QList<CVFileStruct> readCache();

        // Dùng khi cần refresh model view trong qml
        void resetCache(const QString &tableName = "CV_FILE");

    private:
        bool queried = false;
        QString m_userName;
        QString m_password;
        QList<CVFileStruct> cache;
        QString m_databaseName;

    private:
        void refreshQueriedState();
};

#endif // CONNECTDB_H
