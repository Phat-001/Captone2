#include "listnavigatorcontrol.h"

ListNavigatorControl::ListNavigatorControl(JobDataGate *_pJobDataGate, int _currentListIndex, int _limitRowsPerList, int _limitIndexesPerNavigator, QObject *parent) :
    QAbstractListModel(parent)
{
    qDebug () << "m_pJobDataGate: " << _pJobDataGate;
    m_listNavigator = new QList<int>;
    m_pJobDataGate = _pJobDataGate;
    setCurrentListIndex(_currentListIndex); // This is problem, Đôi lúc db ko query được, sẽ khiến app bị treo, nếu muốn
                                              // app luôn luôn khởi động được thì có thể sử dụng lập trình không đồng bộ
    m_limitRowsPerList = _limitRowsPerList;
    m_limitIndexesPerNavigator = _limitIndexesPerNavigator;

    m_pJobDataGate->setLimitRowsPerList(_limitRowsPerList);

    connect(m_pJobDataGate, SIGNAL(totalRowsChanged(int)), this, SLOT(onTotalRowsChanged(int)));
    connect(m_pJobDataGate, &JobDataGate::skillChanged, this, &ListNavigatorControl::onSkillChanged);
    connect(this, &ListNavigatorControl::currentListIndexChanged, this, &ListNavigatorControl::onCurrentListIndexChanged);
    connect(m_pJobDataGate, &JobDataGate::skillFieldEmpty, this, &ListNavigatorControl::onSkillFieldEmpty);
    /*
       Co 2 truong hop queryRowsInList se duoc goi, 1 la khi skill text thay doi, goi currentListIndex voi arg = 1 (Hien thi
    ket qua dau trang). Truong hop 2 la skill text giu nguyen nhung ta bam trang khac, khi nay currentListIndex co arg la index
    duoc chon
     */
}

int ListNavigatorControl::rowCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return m_listNavigator->length();
}

int ListNavigatorControl::columnCount(const QModelIndex &parent) const
{
    Q_UNUSED(parent);
    return (m_listNavigator->length() == 0) ? 0 : 1;
}

QVariant ListNavigatorControl::data(const QModelIndex &index, int role) const
{
    if(!index.isValid() || (m_listNavigator->length() == 0)) return QVariant();
    switch (role) {
    case IndexRole:
        return m_listNavigator->at(index.row());
    default:
        return QVariant();
    }
}

QHash<int, QByteArray> ListNavigatorControl::roleNames() const
{
    static QHash<int, QByteArray> mapping{{IndexRole, "index"}};
    return mapping;
}

void ListNavigatorControl::show() const
{
    QString navigator = "";
    for(auto iter = m_listNavigator->begin(); iter != m_listNavigator->end(); iter++){
        navigator += QString::number(*iter) + " ";
    }
    //qDebug() << "[ListNavigatorControl::show()] navigator : " << navigator;
}

int ListNavigatorControl::totalRows() const
{
    return m_totalRows;
}

int ListNavigatorControl::totalList() const
{
    return m_totalList;
}

int ListNavigatorControl::currentListIndex() const
{
    return m_currentListIndex;
}

int ListNavigatorControl::limitRowsPerList() const
{
    return m_limitRowsPerList;
}

int ListNavigatorControl::limitIndexesPerNavigator() const
{
    return m_limitIndexesPerNavigator;
}

int ListNavigatorControl::listNavigatorLength() const
{
    return m_listNavigator->length();
}

void ListNavigatorControl::setTotalRows(int _totalRows)
{
    m_totalRows = _totalRows;
    emit totalRowsChanged();
}

void ListNavigatorControl::setTotalList(int _totalList)
{
    m_totalList = _totalList;
    emit totalListChanged();
}

void ListNavigatorControl::setCurrentListIndex(int _currentListIndex)
{
    if(m_pJobDataGate != nullptr){
            m_pJobDataGate->queryTotalRows();
    }
    else {
        qDebug() << "[ListNavigatorControl::setCurrentListIndex][error] : m_pJobDataGate is null pointer";
        return;
    }

    if(m_totalList == 0){
        qDebug() << "[ListNavigatorControl::setCurrentListIndex][m_totalList] := 0";
        m_currentListIndex = 1; // set to default state
        m_pJobDataGate->clear();
        m_listNavigator->clear();
        emit currentListIndexChanged();
        return;
    }
    qDebug() << "[ListNavigatorControl::setCurrentListIndex][m_totalList] := " << m_totalList;
    int left =_currentListIndex,
            right = _currentListIndex,
            remain_count = m_limitIndexesPerNavigator-1;

    m_listNavigator->clear();
    m_listNavigator->push_back(_currentListIndex);
    while(left > 1) {
        if(remain_count == 0) break;
        left--;
        remain_count--;
        m_listNavigator->push_front(left);
    }
    while(right < m_totalList){
        if(remain_count == 0) break;
        right++;
        remain_count--;
        m_listNavigator->push_back(right);
    }
    emit listNavigatorLengthChanged();
    m_currentListIndex = _currentListIndex;
    m_pJobDataGate->setCurrentListIndex(_currentListIndex);
    show();
    emit currentListIndexChanged();
}

void ListNavigatorControl::moveToNextList()
{
    setCurrentListIndex(m_currentListIndex + 1);
}

void ListNavigatorControl::movoToPreviousList()
{
    setCurrentListIndex(m_currentListIndex - 1);
}

void ListNavigatorControl::onCurrentListIndexChanged()
{
    // Không cần nữa, mỗi lần set current list index thì thay đổi mọi thứ tại lúc đấy luôn, không cần hàm này
    if(m_pJobDataGate != nullptr){
        m_pJobDataGate->queryRowsInList(m_currentListIndex, m_limitRowsPerList);
    }
    qDebug() << "[ListNavigatorControl::onCurrentListIndexChanged()] : Current index changed to " << "[" << m_currentListIndex <<"]";
}

void ListNavigatorControl::onTotalRowsChanged(int _totalRows) /* totalRows thay đổi cũng sẽ kéo theo
                                                              totalList thay đổi, totalRows là số hàng
                                                              có trong database
                                                               */
{
    setTotalRows(_totalRows);
    setTotalList(_totalRows == 0 ? 0 : (_totalRows%m_limitRowsPerList > 0) ? _totalRows/m_limitRowsPerList+1 : _totalRows/m_limitRowsPerList);
}

void ListNavigatorControl::onSkillFieldEmpty()
{
    m_listNavigator->clear();
    m_currentListIndex = 1;
    emit currentListIndexChanged();
}

void ListNavigatorControl::onSkillChanged() // Skill text in textfield changed
{
    setCurrentListIndex(1);
}

void ListNavigatorControl::editListNavigator(int start, int end)
{
//    if(start > end){
//        qDebug() << "[ListNavigatorControl::refreshListNavigator][error] : start > end";
//        return;
//    }
//    qDebug() << "[ListNavigatorControl::refreshListNavigator] : start = " << start << ", end = " << end;
//    m_listNavigator->clear();
//    for(int i = m_currentListIndex; i <= end; i++){
//        m_listNavigator->push_back(i);
//    }
//    qDebug() << "[ListNavigatorControl::refreshListNavigator] : refreshed";
//    emit listNavigatorLengthChanged();
}
