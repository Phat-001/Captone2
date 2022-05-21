#ifndef HTMLDATASTRUCT_H
#define HTMLDATASTRUCT_H

#include <QObject>
#include <QString>

class HTMLDataStruct
{
public:
    HTMLDataStruct();
    HTMLDataStruct(QString _newTitle, QString _newsLink);

    QString getNewsTitle() const;
    QString getNewsLink() const;
    void setNewsTitle(QString _newTitle);
    void setNewsLink(QString _newsLink);

private:
    QString m_newsLink;
    QString m_newsTitle; /*Chuyển đổi số là sự dịch chuyển chưa có tiền lệ*/
    //QString m_newsData; /*Html format*/
};

#endif // HTMLDATASTRUCT_H
