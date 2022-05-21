#ifndef JOBINFOMODEL_H
#define JOBINFOMODEL_H

#include <QAbstractListModel>
#include <QObject>
#include <QList>
#include "datagate/jobinfo_datagate/jobinfo_struct.h"

class JobInfoModel : public QAbstractListModel
{
    Q_OBJECT
public:
    enum Roles{
        IDRole = 0,
        AccountIDRole,
        JobTitleRole,
        JobDateRole,
        AddressRole,
        SalaryRole,
        LevelRole,
        DescriptionRole,
        LogoRole,
        JobTypeRole,
        LongitudeRole,
        LatitudeRole,
    };

    JobInfoModel(QList<JobInfoStruct> * _pJobInfoStructList, QObject *parent = nullptr);
    int rowCount(const QModelIndex& = QModelIndex()) const override;
    int columnCount(const QModelIndex& = QModelIndex()) const override;
    QVariant data(const QModelIndex&, int role) const override;
    QHash<int, QByteArray> roleNames() const override;
    void _setData(QList<JobInfoStruct>*);

private:
    QList<JobInfoStruct> *m_pJobInfoStructList = 0; /* Nhận tham chiếu từ class JobDataGate,
                                                    vì vậy instance JobDataGate phải được tạo trước
                                                    instance JobInfoModel */
};

#endif // JOBINFOMODEL_H
