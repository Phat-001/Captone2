#ifndef RABBITJOBAPPMAIN_H
#define RABBITJOBAPPMAIN_H

#include <QObject>
#include <QGuiApplication>
#include <QQmlApplicationEngine>
#include <QQmlContext>
#include "datagate/login.h"
#include "datagate/jobdatagate.h"
#include "model/jobinfomodel.h"
#include "model/newsmodel.h"
#include "controller/listnavigatorcontrol.h"
#include "controller/weekcontrol.h"
#include "datagate/wishjobdatagate.h"
#include "positiondetect.h"
#include "newsservice.h"

class RabbitJobAppMain : public QObject
{
    Q_OBJECT
    //Q_PROPERTY(JobInfoModel *resultModel READ resultModel CONSTANT)
public:
    explicit RabbitJobAppMain(QGuiApplication *pApp, QObject *parent = nullptr);
    int appInit();
    void registerType();

signals:

public slots:

private: // member variables
    PositionDetect *m_pPositionDetect;
    NewsService *m_newsService;
    NewsModel *m_newsModel;
    Login *m_pLogin = 0;
    WishJobDataGate *m_pWishJobDataGate = 0;
    WeekControl *m_pWeekControl = 0;
    JobDataGate *m_pJobDataGateSearchPage = 0;
    ListNavigatorControl *m_pListNavigatorSearchPage = 0;
    JobInfoModel *m_pJobInfoModelSearchPage = 0;
    QGuiApplication *m_pApp;
    QQmlApplicationEngine *m_pEngine;

};

#endif // RABBITJOBAPPMAIN_H
