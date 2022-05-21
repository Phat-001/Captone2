#include "account_struct.h"

AccountStruct::AccountStruct(QObject *parent)
    : QObject(parent) {}

AccountStruct::AccountStruct(const AccountStruct &_account)
{
    setAccountID(_account.getAccountID());
    setName(_account.getName());
    setEmail(_account.getEmail());
    setPhone(_account.getPhone());
    setAddress(_account.getAddress());
    setUserName(_account.getUserName());
    setPassword(_account.getPassword());
}

void AccountStruct::setAccountID(int idTK){
    m_accountID = idTK;
}
void AccountStruct::setName(const QString &fullName){
    m_name = fullName;
}
void AccountStruct::setEmail(const QString &_email){
    m_email = _email;
}
void AccountStruct::setPhone(int sdt){
    m_phone = sdt;
}
void AccountStruct::setAddress(const QString &diaChi){
    m_address = diaChi;
}
void AccountStruct::setUserName(const QString &usn){
    m_userName = usn;
}
void AccountStruct::setPassword(const QString &mk){
    m_password = mk;
}

int AccountStruct::getAccountID() const{
    return m_accountID;
}
QString AccountStruct::getName() const{
    return m_name;
}
QString AccountStruct::getEmail() const{
    return m_email;
}
int AccountStruct::getPhone() const{
    return m_phone;
}
QString AccountStruct::getAddress() const{
    return m_address;
}
QString AccountStruct::getUserName() const{
    return m_userName;
}
QString AccountStruct::getPassword() const{
    return m_password;
}

void AccountStruct::clear()
{
    m_accountID = 0;
    m_name = "";
    m_email = "";
    m_phone = 0;
    m_address = "";
    m_userName = "";
    m_password = "";
}

void AccountStruct::show() const
{
    qDebug()<< m_name << " " << m_userName;
}

void AccountStruct::operator=(const AccountStruct &_account)
{
    setAccountID(_account.getAccountID());
    setName(_account.getName());
    setEmail(_account.getEmail());
    setPhone(_account.getPhone());
    setAddress(_account.getAddress());
    setUserName(_account.getUserName());
    setPassword(_account.getPassword());
}

bool AccountStruct::operator==(const AccountStruct &_ps) const
{
    return m_accountID == _ps.getAccountID();
}
