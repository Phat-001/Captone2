import QtQuick 2.12
import QtQuick.Controls 2.5

Item {
    width: 412
    height: 300

    Text {
        text: qsTr("Popular search")
        font.pointSize: 15
        color: "white"
    }

    Rectangle {
        id: item1
        y: 25
        width: 100
        height: 50
        color: "transparent"
        border.color: "green"
        border.width: 2
        Text {
            text: "PHP Laravel"
            font.pointSize: 13
            anchors.centerIn: parent
        }
    }
    Rectangle {
        id: item2
        x: 105
        y: 25
        width: 100
        height: 50
        color: "transparent"
        border.color: "green"
        border.width: 2
        Text {
            text: "Angular JS"
            font.pointSize: 13
            anchors.centerIn: parent
        }
    }
    Rectangle {
        id: item3
        x: 210
        y: 25
        width: 100
        height: 50
        color: "transparent"
        border.color: "green"
        border.width: 2
        Text {
            text: "Java FX"
            font.pointSize: 13
            anchors.centerIn: parent
        }
    }
    Rectangle {
        id: item4
        y: 85
        width: 100
        height: 50
        color: "transparent"
        border.color: "green"
        border.width: 2
        Text {
            text: ".Net"
            font.pointSize: 13
            anchors.centerIn: parent
        }
    }

}
