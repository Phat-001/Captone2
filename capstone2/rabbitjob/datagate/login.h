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

class Login : public QObject{
    Q_OBJECT
    Q_PROPERTY(AccountStruct *account READ account NOTIFY accountChanged)
    Q_PROPERTY(bool isLoggedIn READ isLoggedIn WRITE setIsLoggedIn NOTIFY isLoggedInChanged)

    public:
        Login(const Login &) = delete;
        void operator=(const Login &) = delete;

        Q_INVOKABLE void login(QString username, QString password);
        Q_INVOKABLE void logout();
        Q_INVOKABLE void show();
        Q_INVOKABLE void updateInfo(QString _name, QString _email, int _phone, QString _address);

        // READ:
        AccountStruct *account();
        bool isLoggedIn();

        // WRITE:
        void setIsLoggedIn(bool _state);

        // Other methods:
        static Login *getInstance(QString dbUserName = "root", QString dbPassword = "");

    signals:
        void accountChanged();
        void accountLoggedIn();
        void accountLoggedOut();
        void isLoggedInChanged();
        void loginInfoIncorrect();

    private:
        static Login* m_loginPtr;
        AccountStruct m_account;
        bool m_isLoggedIn = false;
        QString m_dbUserName = "root";
        QString m_dbPassword = "";
        const QString m_databaseName = "qt_sql_default_connection";

    private:
        QSqlDatabase connect();
        Login(QString, QString);
};

#endif // LOGIN_H
