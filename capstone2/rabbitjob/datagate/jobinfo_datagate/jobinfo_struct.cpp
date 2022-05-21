#include "jobinfo_struct.h"

JobInfoStruct::JobInfoStruct(){}

void JobInfoStruct::setID(int _id){
    m_id = _id;
}
void JobInfoStruct::setAccountID(int idTK){
    m_accountID = idTK;
}
void JobInfoStruct::setJobTitle(const QString &tieudeCV){
    m_jobTitle = tieudeCV;
}
void JobInfoStruct::setJobDate(const QDate &ngayDang){
    m_jobDate = ngayDang;
}
void JobInfoStruct::setAddress(const QString &diaChi){
    m_address = diaChi;
}
void JobInfoStruct::setSalary(int luong){
    m_salary = luong;
}
void JobInfoStruct::setLevel(const QString &muc){
    m_level = muc;
}
void JobInfoStruct::setDescription(const QString &moTa){
    m_description = moTa;
}

void JobInfoStruct::setLogo(const QString &_logo){
    m_logo = _logo;
}

void JobInfoStruct::setJobType(const QString &loaiCViec){
    m_jobType = loaiCViec;
}

void JobInfoStruct::setLongitude(float longitude)
{
    m_longitude = longitude;
}

void JobInfoStruct::setLatitude(float latitude)
{
    m_latitude = latitude;
}

int JobInfoStruct::getID() const{
    return m_id;
}

int JobInfoStruct::getAccountID() const{
    return m_accountID;
}

QString JobInfoStruct::getJobTitle() const{
    return m_jobTitle;
}

QDate JobInfoStruct::getJobDate() const{
    return m_jobDate;
}

QString JobInfoStruct::getAddress() const{
    return m_address;
}

int JobInfoStruct::getSalary() const{
    return m_salary;
}

QString JobInfoStruct::getLevel() const{
    return m_level;
}

QString JobInfoStruct::getDescription() const{
    return m_description;
}

QString JobInfoStruct::getLogo() const{
    return m_logo;
}

QString JobInfoStruct::getJobType() const{
    return m_jobType;
}

float JobInfoStruct::getLongitude() const
{
    return m_longitude;
}

float JobInfoStruct::getLatitude() const
{
    return m_latitude;
}

void JobInfoStruct::show() const
{
    qDebug() << m_jobTitle + "  " + m_address + "  " + QString(m_salary) + "  " + m_level + "  " + m_description + "  " + m_jobType;
}

bool JobInfoStruct::operator==(const JobInfoStruct &_ps) const
{
    return m_jobTitle == _ps.getJobTitle();
}
