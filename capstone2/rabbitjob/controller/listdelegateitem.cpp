#include "listdelegateitem.h"

ListDelegateItem::ListDelegateItem(QObject *parent) : QObject(parent) {}

ListDelegateItem::~ListDelegateItem(){}

bool ListDelegateItem::isSelected(){
    return m_isSelected;
}

int ListDelegateItem::listNumber(){
    return m_listNumber;
}

void ListDelegateItem::setIsSelected(bool isSelected){
    m_isSelected = isSelected;
    emit isSelectedChanged();
}

void ListDelegateItem::setListNumber(int listNumber){
    m_listNumber = listNumber;
    emit listNumberChanged();
}
