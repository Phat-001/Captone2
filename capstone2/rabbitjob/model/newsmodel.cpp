#include "newsmodel.h"

NewsModel::NewsModel(QList<HTMLDataStruct> *_pNewsList, QObject *parent)
    : QAbstractListModel{parent}
{m_pNewsList = _pNewsList;}

int NewsModel::rowCount(const QModelIndex &parent) const
{
    if(m_pNewsList != nullptr){
        Q_UNUSED(parent);
        return m_pNewsList->length();
    }
    qDebug()<<"[NewsModel::rowCount(const QModelIndex &parent)] Warning: m_pNewsList = nullptr";
    return 0;
}

int NewsModel::columnCount(const QModelIndex &parent) const
{
    if(m_pNewsList != nullptr){
        Q_UNUSED(parent);
        return (m_pNewsList->length() == 0) ? 0 : 1;
    }
    qDebug()<<"[NewsModel::columnCount(const QModelIndex &parent)] Warning: m_pNewsList = nullptr";
    return 0;
}

QVariant NewsModel::data(const QModelIndex &index, int role) const
{
    if(m_pNewsList != nullptr){
        if(!index.isValid() || (m_pNewsList->length() == 0)) return QVariant();
        switch (role) {
            case TitleRole:
                return m_pNewsList->at(index.row()).getNewsTitle();
            case LinkRole:
                return m_pNewsList->at(index.row()).getNewsLink();
            default:
                return QVariant();
        }
    }
    return QVariant();
}

QHash<int, QByteArray> NewsModel::roleNames() const
{
    static QHash<int, QByteArray> mapping{
        {TitleRole, "newsTitle"},
        {LinkRole, "newsLink"}
    };
    return mapping;
}
