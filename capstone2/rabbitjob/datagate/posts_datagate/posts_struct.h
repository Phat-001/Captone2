#ifndef POSTS_STRUCT_H
#define POSTS_STRUCT_H

#include <QObject>
#include <QString>
#include <QDate>
#include <QDebug>

class PostsStruct
{
public:
    PostsStruct();

    void setPostID(int);
    void setAccountID(int);
    void setPostTitle(const QString &);
    void setContent(const QString &);
    void setDate(const QDate &);

    int getPostID() const;
    int getAccountID() const;
    QString getPostTitle() const;
    QString getContent() const;
    QDate getDate() const;

    void show() const;

    bool operator==(const PostsStruct &) const;
private:
    int postID;
    int accountID;
    QString postTitle;
    QString content;
    QDate date;
};

#endif // POSTS_STRUCT_H
