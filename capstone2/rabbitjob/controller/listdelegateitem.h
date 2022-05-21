#ifndef LISTDELEGATEITEM_H
#define LISTDELEGATEITEM_H

#include <QObject>

class ListDelegateItem : public QObject {
    Q_OBJECT
    Q_PROPERTY(bool isSelected READ isSelected WRITE setIsSelected NOTIFY isSelectedChanged)
    Q_PROPERTY(int listNumber READ listNumber WRITE setListNumber NOTIFY listNumberChanged)
public:
    ListDelegateItem(QObject *parent = nullptr);
    virtual ~ListDelegateItem();

    // READ
    bool isSelected();
    int listNumber();

    // WRITE
    void setIsSelected(bool);
    void setListNumber(int);

signals:
    void isSelectedChanged();
    void listNumberChanged();

private:
    bool m_isSelected = false;
    int m_listNumber = 0;
};

#endif // LISTDELEGATEITEM_H
