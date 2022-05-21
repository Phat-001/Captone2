#include "newsservice.h"

NewsService::NewsService(QString _target, QObject *parent)
    : QObject{parent}
{
    m_pFetch = new FetchHTML(new QNetworkAccessManager);
    m_target = _target;
    QObject::connect(m_pFetch, &FetchHTML::fetchFinished, this, &NewsService::onFinishFetchNewList);
    QObject::connect(m_pFetch, &FetchHTML::newsContentChanged, this, &NewsService::onNewsContentChanged);
}

QString NewsService::newsContent() const
{
    return m_newsContent;
}

void NewsService::setNewsContent(const QString &_content)
{
    m_newsContent = _content;
    emit newsContentChanged();
}

QList<HTMLDataStruct> *NewsService::getListReference()
{
    return &m_newsList;
}

void NewsService::refreshNewsList()
{
    m_pFetch->exec(m_target);
}

void NewsService::findContent(QString _url)
{
    m_pFetch->exec(_url, false);
}

void NewsService::onFinishFetchNewList()
{
    // <a data-medium=\"Item-
    // "data-thumb=\"
    m_newsList.clear();
    QString HTMLData = m_pFetch->readAllHtmlData();
    Q_FOREACH(auto line, HTMLData.split('\n')){
        if(line.contains("<a data-medium=\"Item-") && line.contains("data-thumb=")){
            QString _title; QString _link;
            for(int i = line.indexOf("title=\"") + 7; line[i] != '\"'; i++){
                _title += line[i];
            }
            for(int i = line.indexOf("href=\"") + 6; line[i] != '\"'; i++){
                _link += line[i];
            }
            m_newsList.push_back(HTMLDataStruct(_title, _link));
        }
    }
    emit dataChanged();
}

void NewsService::onNewsContentChanged()
{
    setNewsContent(m_pFetch->readAllHtmlData());
}
