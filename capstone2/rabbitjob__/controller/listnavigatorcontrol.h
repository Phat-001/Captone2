#ifndef LISTNAVIGATORCONTROL_H
#define LISTNAVIGATORCONTROL_H

#include <QObject>
#include <QAbstractItemModel>
#include <QList>
#include "listdelegateitem.h"

class ListNavigatorControl : public QAbstractItemModel
{
    Q_OBJECT
public:
    explicit ListNavigatorControl(QObject *parent = nullptr);

signals:

public slots:

private:
    QList<ListDelegateItem> *m_data = 0;
    int m_totalRows;
    int m_limitRowsPerList = 10;
};

#endif // LISTNAVIGATORCONTROL_H
