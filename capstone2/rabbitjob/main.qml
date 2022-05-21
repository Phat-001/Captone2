import QtQuick 2.12
import QtQuick.Controls 2.15
import "page"

ApplicationWindow {
    id: window
    width: 412
    height: 846
    visible: true
    flags: Qt.Window | Qt.FramelessWindowHint

    property alias root: root
    Item {
        id: root
        width: 412
        height: 846

        SwipeView {
            id: swipeView
            anchors.fill: parent
            currentIndex: tabBar.currentIndex

            Job {}
            MePage {}
        }

        property alias tabBar: tabBar
        TabBar {
            y: 800
            id: tabBar
            width: parent.width
            currentIndex: swipeView.currentIndex
            TabButton {
                text: qsTr("Today's job")
            }
            TabButton {
                text: qsTr("Me")
            }
        }
    }

    property alias searchPageLoader: searchPageLoader
    Loader {
        id: searchPageLoader
        source: "qrc:/page/SearchPage.qml"
        visible: false
        //active: false
    }

    property alias jobDetailDrawer: jobDetailDrawer
    JobDetailDrawer {
        id: jobDetailDrawer
    }


}
