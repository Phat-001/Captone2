#ifndef ACCOUNT_STRUCT_H
#define ACCOUNT_STRUCT_H

#include <QObject>
#include <QString>
#include <QDebug>

class AccountStruct : public QObject {
    Q_OBJECT
    Q_PROPERTY(int accountID MEMBER m_accountID CONSTANT)
    Q_PROPERTY(QString name      MEMBER m_name CONSTANT)
    Q_PROPERTY(QString email     MEMBER m_email CONSTANT)
    Q_PROPERTY(int phone     MEMBER m_phone CONSTANT)
    Q_PROPERTY(QString address   MEMBER m_address CONSTANT)
    Q_PROPERTY(QString userName  MEMBER m_userName CONSTANT)
    Q_PROPERTY(QString password  MEMBER m_password CONSTANT)

public:
    AccountStruct(QObject *parent = nullptr);
    AccountStruct(const AccountStruct &_account);

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

    void clear();
    void show() const;

    void operator=(const AccountStruct &_account);
    bool operator==(const AccountStruct &) const;
private:
    int m_accountID;
    QString m_name;
    QString m_email;
    int m_phone;
    QString m_address;
    QString m_userName;
    QString m_password;
};

#endif // ACCOUNT_STRUCT_H
