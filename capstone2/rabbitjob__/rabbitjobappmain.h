#ifndef RABBITJOBAPPMAIN_H
#define RABBITJOBAPPMAIN_H

#include <QObject>

class RabbitJobAppMain : public QObject
{
    Q_OBJECT
public:
    explicit RabbitJobAppMain(QObject *parent = nullptr);
    void appInit();

signals:

public slots:

private: // member variables

};

#endif // RABBITJOBAPPMAIN_H
