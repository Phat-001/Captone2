#include <QGuiApplication>
#include "rabbitjobappmain.h"

int main(int argc, char *argv[])
{
#if QT_VERSION < QT_VERSION_CHECK(6, 0, 0)
    QCoreApplication::setAttribute(Qt::AA_EnableHighDpiScaling);
#endif

    QGuiApplication app(argc, argv);
/*
    QQmlApplicationEngine engine;

    const QUrl url(QStringLiteral("qrc:/main.qml"));
    QObject::connect(&engine, &QQmlApplicationEngine::objectCreated,
        &app, [url](QObject *obj, const QUrl &objUrl) {
            if (!obj && url == objUrl)
                QCoreApplication::exit(-1);
        }, Qt::QueuedConnection);
    engine.load(url);
*/

    //Login *log = Login::getInstance();


    RabbitJobAppMain appMain(&app);
    return appMain.appInit();
}

// http://localhost/phpmyadmin/index.php?route=/sql&db=jmsdb&table=JOB_INFORMATION&pos=0
