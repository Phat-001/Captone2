#include "datagate/login.h"
#include <QCoreApplication>
#include <QSqlDatabase>
#include <QSqlQuery>

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);
    /*
    AccountDataGate dg;
    if (dg.connect().open()){
       QSqlQuery query("SELECT * FROM ACCOUNT");
       while (query.next()) {
           QString name = query.value(1).toString();
           QString username = query.value(5).toString();          
           qDebug()<<name<<" "<<username;
       }
       dg.connect().close();
    }
    else
        qDebug()<<"Connect unsuccessful!!!";

    JobInfoDataGate dg;
    dg.queryTotalRow();
    dg.queryRowInList(1,5);
    dg.show();
    return a.exec();
    */
    Login lg;
    lg.login("nhdliu","liu2000");
    lg.show();
}
