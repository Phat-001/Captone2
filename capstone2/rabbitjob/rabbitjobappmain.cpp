#include "rabbitjobappmain.h"

RabbitJobAppMain::RabbitJobAppMain(QGuiApplication *pApp, QObject *parent) :
    QObject(parent), m_pApp(pApp)
{
    //appInit();
}

int RabbitJobAppMain::appInit()
{
    m_pEngine = new QQmlApplicationEngine;
    const QUrl url(QStringLiteral("qrc:/main.qml"));

    qDebug() << "App started";

    m_pPositionDetect = new PositionDetect;
    m_newsService = new NewsService();
    m_newsModel = new NewsModel(m_newsService->getListReference());
    m_pLogin = Login::getInstance(); // not problem
    m_pWishJobDataGate = new WishJobDataGate();
    m_pWeekControl = new WeekControl();
    m_pJobDataGateSearchPage = new JobDataGate; // not problem
    //     ListNavigatorControl(.., .., int _limitRowsPerList, int _limitIndexesPerNavigator):
    m_pListNavigatorSearchPage = new ListNavigatorControl(m_pJobDataGateSearchPage, 1, 4, 3);
    m_pJobInfoModelSearchPage = new JobInfoModel(m_pJobDataGateSearchPage->getDataReference(), nullptr);

    qDebug () << "--------------------------------------------------------";
    m_pEngine->rootContext()->setContextProperty("mockproject","eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJhMWY0M2QyNC1mM2QxLTRiN2QtOWFiMi0zMGIzNmYxOGE5NGEiLCJleHAiOjE2NTgzNTA4MDAsImlzcyI6IkdlbmVyYWwgTWFnaWMiLCJqdGkiOiJjYmFjMjI0Yy01NmQxLTRiYjAtODJmMi00ZjhkM2JhNTVjNGIiLCJuYmYiOjE2NDk0MzAwNDh9.tXoTzdvGNKT_Z3Cg8URxb1PJiovVHI2LDk5vBna8t509dkIw5KJmMrvMvzEPaKZhLHI45aQtsCF_EFTw-iWNGw");
    qDebug () << "myRabbitJobAppMain created";
    m_pEngine->rootContext()->setContextProperty("myRabbitJobAppMain", this);
    qDebug () << "newsServeice created";
    m_pEngine->rootContext()->setContextProperty("newsServeice", m_newsService);
    qDebug () << "newsModel created";
    m_pEngine->rootContext()->setContextProperty("newsModel", m_newsModel);
    m_pEngine->rootContext()->setContextProperty("mockproject","eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJhMWY0M2QyNC1mM2QxLTRiN2QtOWFiMi0zMGIzNmYxOGE5NGEiLCJleHAiOjE2NTgzNTA4MDAsImlzcyI6IkdlbmVyYWwgTWFnaWMiLCJqdGkiOiJjYmFjMjI0Yy01NmQxLTRiYjAtODJmMi00ZjhkM2JhNTVjNGIiLCJuYmYiOjE2NDk0MzAwNDh9.tXoTzdvGNKT_Z3Cg8URxb1PJiovVHI2LDk5vBna8t509dkIw5KJmMrvMvzEPaKZhLHI45aQtsCF_EFTw-iWNGw");
    qDebug () << "positionDetect created";
    m_pEngine->rootContext()->setContextProperty("positionDetect", m_pPositionDetect);
    qDebug () << "login created";
    m_pEngine->rootContext()->setContextProperty("loginService", m_pLogin);
    qDebug () << "wishJobDataGate created";
    m_pEngine->rootContext()->setContextProperty("wishJobDataGate", m_pWishJobDataGate);
    qDebug () << "weekControl created";
    m_pEngine->rootContext()->setContextProperty("weekControl", m_pWeekControl);
    qDebug () << "jobDataGateSearchPage created";
    m_pEngine->rootContext()->setContextProperty("jobDataGateSearchPage", m_pJobDataGateSearchPage);
    qDebug () << "listNavigatorSearchPage created";
    m_pEngine->rootContext()->setContextProperty("listNavigatorSearchPage", m_pListNavigatorSearchPage);
    qDebug () << "jobInfoModelSearchPage created";
    m_pEngine->rootContext()->setContextProperty("jobInfoModelSearchPage", m_pJobInfoModelSearchPage);
    qDebug () << "--------------------------------------------------------";

    QObject::connect(m_pEngine, &QQmlApplicationEngine::objectCreated,
        m_pApp, [url](QObject *obj, const QUrl &objUrl) {
            if (!obj && url == objUrl)
                QCoreApplication::exit(-1);
        }, Qt::QueuedConnection);
    m_pEngine->load(url);
    return m_pApp->exec();
}

void RabbitJobAppMain::registerType()
{

}

//JobInfoModel *RabbitJobAppMain::resultModel()
//{
//    if(m_pJobInfoModelSearchPage == nullptr){
//        qDebug() << "[RabbitJobAppMain::resultModel()] : m_pJobInfoModelSearchPage == nullptr";
//        return 0;
//    }
//    else {
//        return m_pJobInfoModelSearchPage;
//    }
//}
