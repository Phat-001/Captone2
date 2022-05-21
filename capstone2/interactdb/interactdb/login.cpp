#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "datagate/account_datagate/account_struct.h"
#include "datagate/login.h"

Login::Login(const QString &userName, const QString &password) :
    m_dbUserName(userName), m_dbPassword(password)
{}

Login::~Login()
{
    QSqlDatabase::removeDatabase(m_databaseName);
}

QSqlDatabase Login::connect()
{
    m_databaseName = "qt_sql_default_connection";
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

void Login::login(QString username, QString password)
{
    if (connect().open()){
        QSqlQuery qSelect("SELECT COUNT(*) FROM ACCOUNT where username = '"+username+"' and password = '"+password+"'");
        qSelect.next();
        if (qSelect.value(0).toInt() == 1){
            isLoggedIn = true;
            QSqlQuery qWrite("SELECT * FROM ACCOUNT where username = '"+username+"' and password = '"+password+"'");
            while (qWrite.next()){

                m_account.setAccountID(qWrite.value(0).toInt());
                m_account.setName(qWrite.value(1).toString());
                m_account.setEmail(qWrite.value(2).toString());
                m_account.setPhone(qWrite.value(3).toInt());
                m_account.setName(qWrite.value(4).toString());
                m_account.setAddress(qWrite.value(5).toString());
                m_account.setUserName(qWrite.value(6).toString());
                m_account.setPassword(qWrite.value(7).toString());
            }
        }
        else
            isLoggedIn = false;
        connect().close();
    }
    else
        qDebug()<<"Connect unsuccessful!!!";

}

void Login::show()
{
    qDebug()<<m_account.getAccountID()<<" "<<m_account.getName()<<" "<<m_account.getEmail()<<" "
           <<m_account.getPhone()<<" "<<m_account.getName()<<" "<<m_account.getAddress()<<" "
          <<m_account.getUserName()<<" "<<m_account.getPassword();
}
