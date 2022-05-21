#include "htmldatastruct.h"

HTMLDataStruct::HTMLDataStruct(){}

HTMLDataStruct::HTMLDataStruct(QString _newTitle, QString _newsLink)
    : m_newsLink(_newsLink), m_newsTitle(_newTitle){}

QString HTMLDataStruct::getNewsTitle() const
{
    return m_newsTitle;
}

QString HTMLDataStruct::getNewsLink() const
{
    return m_newsLink;
}

void HTMLDataStruct::setNewsTitle(QString _newTitle)
{
    m_newsTitle = _newTitle;
}

void HTMLDataStruct::setNewsLink(QString _newsLink)
{
    m_newsLink = _newsLink;
}
