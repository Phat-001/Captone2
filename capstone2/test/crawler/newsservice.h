#ifndef NEWSSERVICE_H
#define NEWSSERVICE_H

#include <QObject>
#include <QList>
#include "fetchhtml.h"
#include "htmldatastruct.h"

class NewsService : public QObject
{
    Q_OBJECT
    Q_PROPERTY(QString newsContent READ newsContent WRITE setNewsContent NOTIFY newsContentChanged)
public:
    explicit NewsService(QString _target = "https://vnexpress.net/tag/cntt-10256",
                         QObject *parent = nullptr);

    QString newsContent() const;
    void setNewsContent(const QString &_content);

    QList<HTMLDataStruct> *getListReference();
    void refreshNewsList();
    Q_INVOKABLE void findContent(QString _url);

signals:
    void dataChanged();
    void newsContentChanged();

public slots:
    void onFinishFetchNewList();
    void onNewsContentChanged(); // slots of FetchHTML::newsContentChanged() signal

private:
    QString m_newsContent;
    QString m_target;
    FetchHTML *m_pFetch = 0;
    QList<HTMLDataStruct> m_newsList;
};

#endif // NEWSSERVICE_H
