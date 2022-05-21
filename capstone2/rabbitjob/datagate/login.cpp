#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "datagate/account_datagate/account_struct.h"
#include "datagate/login.h"

Login* Login::m_loginPtr = nullptr;

void Login::login(QString username, QString password)
{
    if (connect().open()){
        QSqlQuery qSelect("SELECT COUNT(*) FROM ACCOUNT where username = '" + username + "' and password = '" + password + "'");
        qSelect.next();
        if (qSelect.value(0).toInt() == 1){
            //setIsLoggedIn(true);
            QSqlQuery qWrite("SELECT * FROM ACCOUNT where username = '" + username + "' and password = '" + password + "'");
            while (qWrite.next()){
                m_account.setAccountID(qWrite.value(0).toInt());
                m_account.setName(qWrite.value(1).toString());
                m_account.setEmail(qWrite.value(2).toString());
                m_account.setPhone(qWrite.value(3).toInt());
                m_account.setAddress(qWrite.value(4).toString());
                m_account.setUserName(qWrite.value(5).toString());
                m_account.setPassword(qWrite.value(6).toString());
                qDebug () << "[Login::login(QString username, QString password)] Account ID = " << m_account.getAccountID()
                          << ", name = " << m_account.getName();
            }
            emit accountChanged();
            emit accountLoggedIn();
            setIsLoggedIn(true);
            qDebug() << "[Login::login(QString username, QString password)][Login successful]";
        }
        else {
            setIsLoggedIn(false);
            emit loginInfoIncorrect();
            qDebug() << "[Login::login(QString username, QString password)][Username or password incorrect]";
        }
        connect().close();
    }
    else {
        qDebug()<<"[void]Login::login(QString, QString)<line 13> [Connect unsuccessful!]";
    }
}

void Login::logout()
{
    if(m_isLoggedIn){
        m_account.clear();
        m_isLoggedIn = false;
        emit accountChanged();
        emit accountLoggedOut();
        emit isLoggedInChanged();
    }
    else {
        qDebug()<< "[void]Login::logout()<line 44> [Not logged in yet!]";
    }
}

void Login::show()
{
    if(m_isLoggedIn){
        qDebug()<< m_account.getAccountID() << " " << m_account.getName() << " " << m_account.getEmail() << " "
                << m_account.getPhone()     << " " << m_account.getName() << " " << m_account.getAddress() << " "
                << m_account.getUserName()  << " " << m_account.getPassword();
    }
    else{
        qDebug()<< "[void]Login::show()<line 57> [You are not logged in!]";
    }
}

void Login::updateInfo(QString _name, QString _email, int _phone, QString _address)
{
    if (connect().open()){
        if(m_isLoggedIn){
            QString queryStatement =
                    "UPDATE ACCOUNT "\
                    "SET name = '" + _name + "', "\
                    "email = '" + _email + "', "\
                    "phone = " + QString::number(_phone) + ", "\
                    "address = '" + _address + "' "\
                    "WHERE account_id = " + m_account.getAccountID();
            QSqlQuery qSelect(queryStatement);
            connect().close();
            m_account.setName(_name);
            m_account.setEmail(_email);
            m_account.setPhone(_phone);
            m_account.setAddress(_address);
        }
    }
    else {
        qDebug()<<"[Login::updateInfo(QString, QString, int, QString)][Connect unsuccessful!]";
    }
}

AccountStruct *Login::account()
{
    return &m_account;
}

bool Login::isLoggedIn()
{
    return m_isLoggedIn;
}

void Login::setIsLoggedIn(bool _state)
{
    m_isLoggedIn = _state;
    emit isLoggedInChanged();
    qDebug() << "[Login::setIsLoggedIn(bool _state)][m_isLoggedIn] := " << m_isLoggedIn;
}

Login *Login::getInstance(QString dbUserName, QString dbPassword)
{
    if(m_loginPtr == nullptr){
        qDebug()<< "Singleton Login successful initialization";
        m_loginPtr = new Login(dbUserName, dbPassword);
    }
    return m_loginPtr;
}

QSqlDatabase Login::connect()
{
    QSqlDatabase database;
    if(QSqlDatabase::contains(m_databaseName)){
        database = QSqlDatabase::database(m_databaseName);
    }
    else {
        database = QSqlDatabase::addDatabase("QMYSQL");
        database.setHostName("127.0.0.1");
        database.setPort(3303);
        database.setDatabaseName("jmsdb");
        database.setUserName("root");
        database.setPassword("");
    }

    return database;
}

Login::Login(QString dbUserName, QString dbPassword) // constructor
{
    m_dbUserName = dbUserName;
    m_dbPassword = dbPassword;
}
