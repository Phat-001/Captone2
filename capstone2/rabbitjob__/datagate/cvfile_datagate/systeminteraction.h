#ifndef SYSTEMINTERACTION_H
#define SYSTEMINTERACTION_H

#include <QCoreApplication>
#include <QObject>
#include <QEventLoop>
#include <QProcess>
#include <QList>
#include <QFile>
#include <QDir>
#include <QTextStream>
#include <QString>
#include <QDebug>

namespace systeminteraction {}

/*
    Required to run as administrator
 */

#define BEGIN_SYSTEMINTERACTION_NAMESPACE namespace systeminteraction {
#define END_SYSTEMINTERACTION_NAMESPACE }
#define SYSTEMINTERACTION using namespace systeminteraction;

#endif // SYSTEMINTERACTION_H
