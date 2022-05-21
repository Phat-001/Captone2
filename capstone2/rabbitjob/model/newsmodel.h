#ifndef NEWSMODEL_H
#define NEWSMODEL_H

#include <QAbstractListModel>
#include <QObject>
#include <QList>
#include <QDebug>
#include "htmldatastruct.h"

/*This class must be created after NewsService instace*/
class NewsModel : public QAbstractListModel
{
    Q_OBJECT
public:
    enum Roles {
        TitleRole = 0,
        LinkRole
    };
    explicit NewsModel(QList<HTMLDataStruct> *_pNewsList, QObject *parent = nullptr);

    int rowCount(const QModelIndex& = QModelIndex()) const override;
    int columnCount(const QModelIndex& = QModelIndex()) const override;
    QVariant data(const QModelIndex&, int role) const override;
    QHash<int, QByteArray> roleNames() const override;

private:
    QList<HTMLDataStruct> *m_pNewsList;
};

#endif // NEWSMODEL_H
