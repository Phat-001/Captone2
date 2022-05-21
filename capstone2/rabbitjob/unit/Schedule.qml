import QtQuick 2.12
import QtQuick.Controls 2.15

Item {
    x: 5
    width: 140
    property string title
    property string salary
    property string address
    property string level
    property string type // partime or fulltime
    property string description
    property string logo // logo path
    property real longitude
    property real latitude
    /*Properties below use when open this drawer in schedule view*/
    property string time
    property string note

    Rectangle {
        anchors.fill: parent
        radius: 10
        color: "green"
        opacity: 0.8
    }
    Text {
        width: parent.width
        font.pointSize: 12
        text: title.length < 12 ? title : title.slice(0, 12) + "..."
        font.bold: true
        color: "white"
    }
    Text {
        y: 20
        width: parent.width
        font.pointSize: 12
        text: "Time: " + time
        color: "white"
    }
    Text {
        y: 40
        width: parent.width
        height: parent.height - y
        font.pointSize: 12
        text: "Note: " + note
        wrapMode: Text.Wrap
    }

    MouseArea {
        anchors.fill: parent
        onPressed: {
            parent.width = 142
        }
        onReleased: {
            parent.width = 140
            jobDetailDrawer.letOpen(title, salary, address, level, type,
                     description, logo, longitude, latitude, time, note)
        }
    }
}
