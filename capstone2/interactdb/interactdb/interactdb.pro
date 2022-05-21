QT -= gui
QT += sql

CONFIG += c++17 console
CONFIG -= app_bundle

# You can make your code fail to compile if it uses deprecated APIs.
# In order to do so, uncomment the following line.
#DEFINES += QT_DISABLE_DEPRECATED_BEFORE=0x060000    # disables all the APIs deprecated before Qt 6.0.0

SOURCES += \
        datagate/account_datagate/account_datagate.cpp \
        datagate/account_datagate/account_struct.cpp \
        datagate/cvfile_datagate/cvfile_datagate.cpp \
        datagate/cvfile_datagate/cvfile_struct.cpp \
        datagate/jobinfo_datagate/jobinfo_datagate.cpp \
        datagate/jobinfo_datagate/jobinfo_struct.cpp \
        datagate/posts_datagate/posts_datagate.cpp \
        datagate/posts_datagate/posts_struct.cpp \
        login.cpp \
        main.cpp

# Default rules for deployment.
qnx: target.path = /tmp/$${TARGET}/bin
else: unix:!android: target.path = /opt/$${TARGET}/bin
!isEmpty(target.path): INSTALLS += target

HEADERS += \
    datagate/account_datagate/account_datagate.h \
    datagate/account_datagate/account_struct.h \
    datagate/account_datagate/systeminteraction.h \
    datagate/cvfile_datagate/cvfile_datagate.h \
    datagate/cvfile_datagate/cvfile_struct.h \
    datagate/cvfile_datagate/systeminteraction.h \
    datagate/jobinfo_datagate/jobinfo_datagate.h \
    datagate/jobinfo_datagate/jobinfo_struct.h \
    datagate/jobinfo_datagate/systeminteraction.h \
    datagate/login.h \
    datagate/posts_datagate/posts_datagate.h \
    datagate/posts_datagate/posts_struct.h \
    datagate/posts_datagate/systeminteraction.h
