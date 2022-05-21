#ifndef LOGIN_H
#define LOGIN_H

#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "account_datagate/account_struct.h"

class Login{
    public:
        explicit Login(const QString &userName = "root",
                          const QString &password = "");
        virtual ~Login();

        QSqlDatabase connect();
        void login(QString username, QString password);
        void show();

    public:
        AccountStruct m_account;
        bool isLoggedIn = false;
    private:
        QString m_dbUserName;
        QString m_dbPassword;
        QString m_databaseName;

    private:
        void refreshQueriedState();
};

#endif // LOGIN_H
