#include "fetchhtml.h"

FetchHTML::FetchHTML(QNetworkAccessManager *_manager):manager(_manager){}

void FetchHTML::exec(const QString &str_url, bool isDetachData){
    this->str_url = str_url;
    QEventLoop loop;
    fetch(
      [this, &loop, &isDetachData](const QString &html)
      {
           HTML_Data = html;
           if(isDetachData){
               emit fetchFinished();
           }
           else{
               emit newsContentChanged();
           }
           loop.quit();
      }
    );
    loop.exec();
}

QString FetchHTML::readAllHtmlData(){
    return this->HTML_Data;
}

void FetchHTML::writeToFile(const QString& path_file){
    std::ofstream o_file(path_file.toUtf8().constData());
    o_file << HTML_Data.toUtf8().constData();
    o_file.close();
}

void FetchHTML::fetch(const std::function<void(const QString&)> &setHTML_Data)
{
    QNetworkReply *response = manager->get(QNetworkRequest(QUrl({str_url})));

    QObject::connect(response, &QNetworkReply::finished,
       [response, setHTML_Data]
       {
           response->deleteLater();
           //response->manager()->deleteLater();
           if (response->error() != QNetworkReply::NoError) return;
           auto const contentType = response->header(QNetworkRequest::ContentTypeHeader).toString();
           static QRegularExpression re("charset=([!-~]+)");
           auto const match = re.match(contentType);
           if (!match.hasMatch() || 0 != match.captured(1).compare("utf-8", Qt::CaseInsensitive))
           {
              qWarning() << "Content charsets other than utf-8 are not implemented yet:" << contentType;
              return;
           }
           setHTML_Data(QString::fromUtf8(response->readAll()));
       });
}
