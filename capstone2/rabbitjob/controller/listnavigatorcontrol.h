#ifndef LISTNAVIGATORCONTROL_H
#define LISTNAVIGATORCONTROL_H

#include <QObject>
#include <QAbstractListModel>
#include <QList>
#include <QHash>
#include "datagate/jobdatagate.h"

class ListNavigatorControl : public QAbstractListModel
{
    Q_OBJECT
    Q_PROPERTY(int totalRows READ totalRows WRITE setTotalRows NOTIFY totalRowsChanged)
    Q_PROPERTY(int totalList READ totalList WRITE setTotalList NOTIFY totalListChanged)
    Q_PROPERTY(int currentListIndex READ currentListIndex WRITE setCurrentListIndex NOTIFY currentListIndexChanged)
    Q_PROPERTY(int limitRowsPerList READ limitRowsPerList CONSTANT)
    Q_PROPERTY(int limitIndexesPerNavigator READ limitIndexesPerNavigator CONSTANT)
    Q_PROPERTY(int listNavigatorLength READ listNavigatorLength NOTIFY listNavigatorLengthChanged)
public:
    enum Roles{IndexRole = 0};

    //explicit ListNavigatorControl(QObject *parent = nullptr);
    ListNavigatorControl(JobDataGate *_jobDataGate, int _currentListIndex, int _limitRowsPerList,
                         int _limitIndexesPerNavigator, QObject *parent = nullptr);

    int rowCount(const QModelIndex& = QModelIndex()) const override;
    int columnCount(const QModelIndex& = QModelIndex()) const override;
    QVariant data(const QModelIndex&, int role) const override;
    QHash<int, QByteArray> roleNames() const override;
    void show() const;

    //READ:
    int totalRows() const;
    int totalList() const;
    int currentListIndex() const;
    int limitRowsPerList() const;
    int limitIndexesPerNavigator() const;
    int listNavigatorLength() const;

    //WRITE:
    void setTotalRows(int);
    void setTotalList(int);
    void setCurrentListIndex(int);

    // Methods:
    Q_INVOKABLE void moveToNextList();
    Q_INVOKABLE void movoToPreviousList();

signals:
    void totalRowsChanged();
    void totalListChanged();
    void currentListIndexChanged();
    void dataChanged();
    void listNavigatorLengthChanged();

public slots:
    void onCurrentListIndexChanged(); /* Mỗi lần thay đổi trang hiện tại, requery và hiển thị
                                       thay đổi model content */
    void onTotalRowsChanged(int _totalRows);
    void onSkillFieldEmpty();
    void onSkillChanged();

private:
    QList<int> *m_listNavigator = 0; /* m_listNavigator có thể thay đổi nếu m_currentListIndex thay
                                      đổi */
    int m_totalRows; /* m_totalRows luôn được binding và thay đổi theo yêu cầu query,
                       ví dụ query theo thành phố thì m_totalRows sẽ ít lại so vơi
                       khi query ko theo thành phố, m_totalRows phải phản ánh được */
    int m_currentListIndex = 1 /*= 1*/; // Chỉ số index của trang hiện tại đang hiển thị
    int m_limitRowsPerList /*= 10*/;
    int m_limitIndexesPerNavigator /*= 10*/; // Mỗi navigator giới hạn tối đa 10 list index 1 lần
    int m_totalList = 0; /* Số này thay đổi mỗi khi m_totalRows và m_limitRowsPerList
                        thay đổi, m_totalList = m_totalRows/m_limitRowsPerList */
    JobDataGate *m_pJobDataGate;

    /*
    < 1, 2_, 3, 4, 5, 6, 7<, 8, 9, 10 >
    Gỉa sử khi click vào index 7 (nằm ở vị trí quá nữa trong số 10 index, nó sẽ bắt đầu
 query
    */

private:
    void editListNavigator(int start, int end);

};
#endif // LISTNAVIGATORCONTROL_H
