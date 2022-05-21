#ifndef CONNECTDB_H
#define CONNECTDB_H

#include <QSqlDatabase>
#include <QtDebug>
#include <QSqlQuery>
#include <QTextStream>
#include <QSqlRecord>
#include <iomanip>
#include <QThread>
#include "posts_struct.h"

class PostsDataGate{
    public:
        explicit PostsDataGate(const QString &userName = "root",
                          const QString &password = "");
        virtual ~PostsDataGate();

        QSqlDatabase connect();

        bool query(const QString &whatToFind = "*", const QString &tableName = "POSTS");

        /* Giúp luồng phụ kiểm tra xem bài đăng đã tồn tại hay
         * chưa
         */
        bool isPostExist(const QString &whatToFind,
                            const QString &whichAccount,
                            const QString &tableName = "POSTS");

        // Insert to database
        bool insert(const PostsStruct &,
                    const QString &tableName = "POSTS");
        bool insert(const QList<PostsStruct> &,
                    const QString &tableName = "POSTS");

        // Đọc cache gốc:
        QList<PostsStruct> readCache();

        // Dùng khi cần refresh model view trong qml
        void resetCache(const QString &tableName = "POSTS");

    private:
        bool queried = false;
        QString m_userName;
        QString m_password;
        QList<PostsStruct> cache;
        QString m_databaseName;

    private:
        void refreshQueriedState();
};

#endif // CONNECTDB_H
