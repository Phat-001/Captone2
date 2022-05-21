#include "posts_struct.h"

PostsStruct::PostsStruct(){}

void PostsStruct::setPostID(int _postID){
    postID = _postID;
}
void PostsStruct::setAccountID(int idTK){
    accountID = idTK;
}
void PostsStruct::setPostTitle(const QString &tieuDe){
    postTitle = tieuDe;
}
void PostsStruct::setContent(const QString &noiDung){
    content = noiDung;
}
void PostsStruct::setDate(const QDate &ngayDang){
    date = ngayDang;
}

int PostsStruct::getPostID() const{
    return postID;
}
int PostsStruct::getAccountID() const{
    return accountID;
}
QString PostsStruct::getPostTitle() const{
    return postTitle;
}
QString PostsStruct::getContent() const{
    return content;
}
QDate PostsStruct::getDate() const{
    return date;
}

void PostsStruct::show() const
{
    qDebug() << postTitle + "  " + content;
}

bool PostsStruct::operator==(const PostsStruct &_ps) const
{
    return postID == _ps.getPostID();
}
