#include "cvfile_struct.h"

CVFileStruct::CVFileStruct(){}

void CVFileStruct::setFileID(int _fileID){
    fileID = _fileID;
}
void CVFileStruct::setAccountID(int accID){
    accountID = accID;
}
void CVFileStruct::setHRID(int _hrID){
    HRID = _hrID;
}
void CVFileStruct::setJobID(int _jobID){
    jobID = _jobID;
}
void CVFileStruct::setUploadFile(const QString &tenFile){
    uploadFile = tenFile;
}

int CVFileStruct::getFileID() const{
    return fileID;
}
int CVFileStruct::getAccountID() const{
    return accountID;
}
int CVFileStruct::getHRID() const{
    return HRID;
}
int CVFileStruct::getJobID() const{
    return jobID;
}
QString CVFileStruct::getUploadFile() const{
    return uploadFile;
}

void CVFileStruct::show() const
{
    qDebug() << uploadFile + "  " + QChar(accountID);
}

bool CVFileStruct::operator==(const CVFileStruct &_ps) const
{
    return fileID == _ps.getFileID();
}
