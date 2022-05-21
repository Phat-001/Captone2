#ifndef ACCOUNT_STRUCT_H
#define ACCOUNT_STRUCT_H

#include <QObject>
#include <QString>
#include "systeminteraction.h"

class AccountStruct
{
public:
    AccountStruct();

    void setAccountID(int);
    void setName(const QString &);
    void setEmail(const QString &);
    void setPhone(int);
    void setAddress(const QString &);
    void setUserName(const QString &);
    void setPassword(const QString &);

    int getAccountID() const;
    QString getName() const;
    QString getEmail() const;
    int getPhone() const;
    QString getAddress() const;
    QString getUserName() const;
    QString getPassword() const;

    void show() const;

    bool operator==(const AccountStruct &) const;
private:
    int accountID;
    QString name;
    QString email;
    int phone;
    QString address;
    QString userName;
    QString password;
};

#endif // ACCOUNT_STRUCT_H
