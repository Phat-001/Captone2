#ifndef FETCHHTML_H
#define FETCHHTML_H

#include <QCoreApplication>
#include <QNetworkAccessManager>
#include <QEventLoop>
#include <QtNetwork>
#include <functional>
#include <QString>
//#include <QList>
#include <fstream>

/**@
   Chương trình này có thể vẫn chưa hoàn thiện do chưa xác
   định được cấu trúc vòng lặp sự kiện của toàn bộ ứng dụng
   QT, cấu trúc vòng lặp sự kiện cần được xác định trong
   tương lai!
*/
class FetchHTML : public QObject{
    Q_OBJECT
public:
    explicit FetchHTML(QNetworkAccessManager *);
    ~FetchHTML() = default;

    void exec(const QString&, bool isDetachData = true);
    QString readAllHtmlData();
    void writeToFile(const QString&);

signals:
    void fetchFinished();
    void newsContentChanged();

private:
    QString str_url;
    QString HTML_Data;
    QNetworkAccessManager *manager = nullptr;
    QEventLoop *p_Loop = nullptr;

    void fetch(const std::function<void(const QString&)>&);
};

#endif // FETCHHTML_H
