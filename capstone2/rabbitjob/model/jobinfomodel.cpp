#include "jobinfomodel.h"

JobInfoModel::JobInfoModel(QList<JobInfoStruct> *_pJobInfoStructList, QObject *parent)
         : QAbstractListModel(parent)
{
    if(_pJobInfoStructList == nullptr){
        qDebug()<<"[JobInfoModel::JobInfoModel(QList<JobInfoStruct> *_pJobInfoStructList, QObject *parent)] Warning: _pJobInfoStructList = nullptr";
    }
    else{
        m_pJobInfoStructList = _pJobInfoStructList;
    }
}

int JobInfoModel::rowCount(const QModelIndex &parent) const
{
    if(m_pJobInfoStructList != nullptr){
        Q_UNUSED(parent);
        return m_pJobInfoStructList->length();
    }
    qDebug()<<"[JobInfoModel::rowCount(const QModelIndex &parent)] Warning: m_pJobInfoStructList = nullptr";
    return 0;
}

int JobInfoModel::columnCount(const QModelIndex &parent) const
{
    if(m_pJobInfoStructList != nullptr){
        Q_UNUSED(parent);
        return (m_pJobInfoStructList->length() == 0) ? 0 : 1;
    }
    qDebug()<<"[JobInfoModel::columnCount(const QModelIndex &parent)] Warning: m_pJobInfoStructList = nullptr";
    return 0;
}

QVariant JobInfoModel::data(const QModelIndex &index, int role) const
{
    if(m_pJobInfoStructList != nullptr){
        if(!index.isValid() || (m_pJobInfoStructList->length() == 0)) return QVariant();
        switch (role) {
            case IDRole:
                return m_pJobInfoStructList->at(index.row()).getID();
            case AccountIDRole:
                return m_pJobInfoStructList->at(index.row()).getAccountID();
            case JobTitleRole:
                return m_pJobInfoStructList->at(index.row()).getJobTitle();
            case JobDateRole:
                return m_pJobInfoStructList->at(index.row()).getJobDate();
            case AddressRole:
                return m_pJobInfoStructList->at(index.row()).getAddress();
            case SalaryRole:
                return m_pJobInfoStructList->at(index.row()).getSalary();
            case LevelRole:
                return m_pJobInfoStructList->at(index.row()).getLevel();
            case DescriptionRole:
                return m_pJobInfoStructList->at(index.row()).getDescription();
            case LogoRole:
                return m_pJobInfoStructList->at(index.row()).getLogo();
            case JobTypeRole:
                return m_pJobInfoStructList->at(index.row()).getJobType();
            case LongitudeRole:
                return m_pJobInfoStructList->at(index.row()).getLongitude();
            case LatitudeRole:
                return m_pJobInfoStructList->at(index.row()).getLatitude();
            default:
                return QVariant();
        }
    }
    qDebug()<<"[JobInfoModel::data(const QModelIndex &index, int role)] Warning: m_pJobInfoStructList = nullptr";
    return QVariant();
}

QHash<int, QByteArray> JobInfoModel::roleNames() const
{
    static QHash<int, QByteArray> mapping{
        {IDRole, "id"},
        {AccountIDRole, "accountID"},
        {JobTitleRole, "jobTitle"},
        {JobDateRole, "jobDate"},
        {AddressRole, "address"},
        {SalaryRole, "salary"},
        {LevelRole, "level"},
        {DescriptionRole, "description"},
        {LogoRole, "logo"},
        {JobTypeRole, "jobType"},
        {LongitudeRole, "longitude"},
        {LatitudeRole, "latitude"}
    };
    return mapping;
}

void JobInfoModel::_setData(QList<JobInfoStruct> *_pJobInfoStructList)
{
    /* H??m n??y kh??ng c???n thi???t, b???i v?? n?? ???? c?? m???t tham chi???u ?????n cache(QList<JobInfoStruct>) trong instance JobDataGate,
    v?? v???y m_pJobInfoStructList s??? t??? ?????ng thay ?????i m???i khi data trong cache c???a instance JobDataGate thay ?????i.
     */
    if(m_pJobInfoStructList != nullptr){
        m_pJobInfoStructList = _pJobInfoStructList;
        qDebug()<<"[JobInfoModel::_setData(QList<JobInfoStruct> *_pJobInfoStructList)] Warning: Replaced old data";
    }
}
