#ifndef CONNECTDB_H
#define CONNECTDB_H

#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "account_struct.h"

class AccountDataGate{
    public:
        explicit AccountDataGate(const QString &userName = "root",
                          const QString &password = "");
        virtual ~AccountDataGate();

        QSqlDatabase connect();

        bool query(const QString &whatToFind = "*", const QString &tableName = "ACCOUNT");

        /* Giúp luồng phụ kiểm tra tài khoản đã tồn tại hay
         * chưa
         */
        bool isPostExist(const QString &whatToFind,
                            const QString &whichUserName,
                            const QString &tableName = "ACOUNT");

        // Insert to database
        bool insert(const AccountStruct &,
                    const QString &tableName = "ACCOUNT");
        bool insert(const QList<AccountStruct> &,
                    const QString &tableName = "ACCOUNT");

        // Đọc cache gốc:
        QList<AccountStruct> readCache();

        // Dùng khi cần refresh model view trong qml
        void resetCache(const QString &tableName = "ACCOUNT");

    private:
        bool queried = false;
        QString m_userName;
        QString m_password;
        QList<AccountStruct> cache;
        QString m_databaseName;

    private:
        void refreshQueriedState();
};

#endif // CONNECTDB_H
