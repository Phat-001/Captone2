QT += quick
QT += sql
QT += positioning
QT += network

CONFIG += c++11

# You can make your code fail to compile if it uses deprecated APIs.
# In order to do so, uncomment the following line.
#DEFINES += QT_DISABLE_DEPRECATED_BEFORE=0x060000    # disables all the APIs deprecated before Qt 6.0.0

SOURCES += \
        controller/listdelegateitem.cpp \
        controller/listnavigatorcontrol.cpp \
        controller/weekcontrol.cpp \
        datagate/account_datagate/account_datagate.cpp \
        datagate/account_datagate/account_struct.cpp \
        datagate/cvfile_datagate/cvfile_datagate.cpp \
        datagate/cvfile_datagate/cvfile_struct.cpp \
        datagate/jobdatagate.cpp \
        datagate/jobinfo_datagate/jobinfo_datagate.cpp \
        datagate/jobinfo_datagate/jobinfo_struct.cpp \
        datagate/jobinfo_datagate/wishjobstruct.cpp \
        datagate/login.cpp \
        datagate/posts_datagate/posts_datagate.cpp \
        datagate/posts_datagate/posts_struct.cpp \
        datagate/wishjobdatagate.cpp \
        fetchhtml.cpp \
        htmldatastruct.cpp \
        main.cpp \
        model/jobinfomodel.cpp \
        model/newsmodel.cpp \
        newsservice.cpp \
        positiondetect.cpp \
        rabbitjobappmain.cpp

RESOURCES += qml.qrc

# Additional import path used to resolve QML modules in Qt Creator's code model
QML_IMPORT_PATH =

# Additional import path used to resolve QML modules just for Qt Quick Designer
QML_DESIGNER_IMPORT_PATH =

# Default rules for deployment.
qnx: target.path = /tmp/$${TARGET}/bin
else: unix:!android: target.path = /opt/$${TARGET}/bin
!isEmpty(target.path): INSTALLS += target

HEADERS += \
    controller/listdelegateitem.h \
    controller/listnavigatorcontrol.h \
    controller/weekcontrol.h \
    datagate/account_datagate/account_datagate.h \
    datagate/account_datagate/account_struct.h \
    datagate/account_datagate/systeminteraction.h \
    datagate/cvfile_datagate/cvfile_datagate.h \
    datagate/cvfile_datagate/cvfile_struct.h \
    datagate/cvfile_datagate/systeminteraction.h \
    datagate/jobdatagate.h \
    datagate/jobinfo_datagate/jobinfo_datagate.h \
    datagate/jobinfo_datagate/jobinfo_struct.h \
    datagate/jobinfo_datagate/systeminteraction.h \
    datagate/jobinfo_datagate/wishjobstruct.h \
    datagate/login.h \
    datagate/posts_datagate/posts_datagate.h \
    datagate/posts_datagate/posts_struct.h \
    datagate/posts_datagate/systeminteraction.h \
    datagate/wishjobdatagate.h \
    fetchhtml.h \
    htmldatastruct.h \
    model/jobinfomodel.h \
    model/newsmodel.h \
    newsservice.h \
    positiondetect.h \
    rabbitjobappmain.h \
    rabbitjobenums.h
