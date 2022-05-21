#include <QCoreApplication>
#include "../../rabbitjob/positiondetect.h"

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);

    PositionDetect pd;

    return a.exec();
}
