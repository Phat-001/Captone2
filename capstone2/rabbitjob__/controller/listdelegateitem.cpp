#include "listdelegateitem.h"

ListDelegateItem::ListDelegateItem(QObject *parent) : QObject(parent) {}

ListDelegateItem::ListDelegateItem(bool isSelected, int listNumber){
    m_isSelected = isSelected;
    emit isSelectedChanged();
    m_listNumber = listNumber;
    emit listNumberChanged();
}

bool ListDelegateItem::isSelected(){
    return m_isSelected;
}

void ListDelegateItem::setIsSelected(bool isSelected){
    m_isSelected = isSelected;
    emit isSelectedChanged();
}

int ListDelegateItem::listNumber(){
    return m_listNumber;
}

void ListDelegateItem::setListNumber(int listNumber){
    m_listNumber = listNumber;
    emit listNumberChanged();
}
