#include "jobinfo_struct.h"

JobInfoStruct::JobInfoStruct(){}

void JobInfoStruct::setID(int _id){
    id = _id;
}
void JobInfoStruct::setAccountID(int idTK){
    accountID = idTK;
}
void JobInfoStruct::setJobTitle(const QString &tieudeCV){
    jobTitle = tieudeCV;
}
void JobInfoStruct::setJobDate(const QDate &ngayDang){
    jobDate = ngayDang;
}
void JobInfoStruct::setAddress(const QString &diaChi){
    address = diaChi;
}
void JobInfoStruct::setSalary(int luong){
    salary = luong;
}
void JobInfoStruct::setLevel(const QString &muc){
    level = muc;
}
void JobInfoStruct::setDescription(const QString &moTa){
    description = moTa;
}

void JobInfoStruct::setLogo(const QString &_logo){
    logo = _logo;
}

void JobInfoStruct::setJobType(const QString &loaiCViec){
    jobType = loaiCViec;
}

int JobInfoStruct::getID() const{
    return id;
}

int JobInfoStruct::getAccountID() const{
    return accountID;
}

QString JobInfoStruct::getJobTitle() const{
    return jobTitle;
}

QDate JobInfoStruct::getJobDate() const{
    return jobDate;
}

QString JobInfoStruct::getAddress() const{
    return address;
}

int JobInfoStruct::getSalary() const{
    return salary;
}

QString JobInfoStruct::getLevel() const{
    return level;
}

QString JobInfoStruct::getDescription() const{
    return description;
}

QString JobInfoStruct::getLogo() const{
    return logo;
}

QString JobInfoStruct::getJobType() const{
    return jobType;
}

void JobInfoStruct::show() const
{
    qDebug() << jobTitle + "  " + address + "  " + QChar(salary) + "  " + level + "  " + description + "  " + jobType;
}

bool JobInfoStruct::operator==(const JobInfoStruct &_ps) const
{
    return jobTitle == _ps.getJobTitle();
}
