#include <QCoreApplication>
#include "fetchhtml.h"

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv); // <a data-medium=\"Item-
                                    // "data-thumb=\"
    FetchHTML fetch(new QNetworkAccessManager);
    QObject::connect(&fetch, &FetchHTML::fetchFinished, [&fetch](){
        Q_FOREACH(auto iter, fetch.readAllHtmlData().split('\n')){
            qDebug() << iter;
        }
    });
    fetch.exec("https://vnexpress.net/tag/cntt-10256");
    return a.exec();
}
