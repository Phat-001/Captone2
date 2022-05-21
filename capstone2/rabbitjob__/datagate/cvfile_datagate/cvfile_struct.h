#ifndef CVFILE_STRUCT_H
#define CVFILE_STRUCT_H

#include <QObject>
#include <QString>
#include "systeminteraction.h"

SYSTEMINTERACTION
BEGIN_SYSTEMINTERACTION_NAMESPACE
class CVFileStruct
{
public:
    CVFileStruct();

    void setFileID(int);
    void setAccountID(int);
    void setHRID(int);
    void setJobID(int);
    void setUploadFile(const QString &);

    int getFileID() const;
    int getAccountID() const;
    int getHRID() const;
    int getJobID() const;
    QString getUploadFile() const;

    void show() const;

    bool operator==(const CVFileStruct &) const;
private:
    int fileID;
    int accountID;
    int HRID;
    int jobID;
    QString uploadFile;
};

END_SYSTEMINTERACTION_NAMESPACE
#endif // CVFILE_STRUCT_H
