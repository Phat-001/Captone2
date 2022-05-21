// standard C++ header:
#include <QGuiApplication>
#include <QQmlApplicationEngine>
#include <QQmlContext>
#include <QGeoPositionInfo>

#include "currentlocation.h"

int main(int argc, char **argv)
{
    QCoreApplication app(argc, argv);

    CurrentLocation c;

    return app.exec();

    /*
    QGuiApplication app(argc, argv);
    QQmlApplicationEngine engine;

    engine.rootContext()->setContextProperty("__my_secret_token", "eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjY2U5MmM1ZC1jODc1LTQxNGUtOTNiMy1lOGZiNjc4YjQxNjkiLCJleHAiOjE2NTY1MzY0MDAsImlzcyI6IkdlbmVyYWwgTWFnaWMiLCJqdGkiOiI4ZTllNWQ1OC03MGUwLTQ3M2EtODAyNi05Nzc2MGI4ZTM2NTIiLCJuYmYiOjE2NDkwODA5OTl9.FlonmromxJP6OwfyS1r3_40LWlaFqsJw8dG4BYwd6vOWYOExus-kloz3gf8fyvXoRTrwED9pp0a8xF8YVDulTQ");

    const QUrl url(QStringLiteral("qrc:/main.qml"));
    QObject::connect(&engine, &QQmlApplicationEngine::objectCreated,
        &app, [url](QObject *obj, const QUrl &objUrl) {
            if (!obj && url == objUrl)
                QCoreApplication::exit(-1);
        }, Qt::QueuedConnection);
    engine.load(url);

    return app.exec();
*/
}




