#include "account_struct.h"

AccountStruct::AccountStruct(){}

void AccountStruct::setAccountID(int idTK){
    accountID = idTK;
}
void AccountStruct::setName(const QString &fullName){
    name = fullName;
}
void AccountStruct::setEmail(const QString &_email){
    email = _email;
}
void AccountStruct::setPhone(int sdt){
    phone = sdt;
}
void AccountStruct::setAddress(const QString &diaChi){
    address = diaChi;
}
void AccountStruct::setUserName(const QString &usn){
    userName = usn;
}
void AccountStruct::setPassword(const QString &mk){
    password = mk;
}

int AccountStruct::getAccountID() const{
    return accountID;
}
QString AccountStruct::getName() const{
    return name;
}
QString AccountStruct::getEmail() const{
    return email;
}
int AccountStruct::getPhone() const{
    return phone;
}
QString AccountStruct::getAddress() const{
    return address;
}
QString AccountStruct::getUserName() const{
    return userName;
}
QString AccountStruct::getPassword() const{
    return password;
}

void AccountStruct::show() const
{
    qDebug()<<name<<" "<<userName;
}

bool AccountStruct::operator==(const AccountStruct &_ps) const
{
    return accountID == _ps.getAccountID();
}
