import QtQuick 2.12
import QtQuick.Controls 2.15
import "../unit"

Rectangle {
    // 7h a.m to 21h p.m = 14h
    width: 150
    height: 800
    property string thu: ""
    property string textDate: ""
    property bool isCurrentDate: false
    property var scheduleArray: []

    property int timeHeight: 750 - date.height
    property int timePartitionCount: 14 // from 7h to 21h
    property int startLimitTime: 7
    property int finishLimitTime: 21

    //color: isCurrentDate ?  "peru" : "transparent"

    gradient: Gradient {
        GradientStop { position: isCurrentDate ? 0.0 : 1.0; color: isCurrentDate ? "peru" : "transparent" }
        GradientStop { position: isCurrentDate ? 0.8 : 1.0; color: "transparent" }
    }

    Rectangle {
        id: date
        width: parent.width
        height: 50
        color: isCurrentDate ? "peru" : "black"
        Text {
            x: 40
            y: 5
            text: thu
            font.pointSize: 13
            color: isCurrentDate ? "black" : "white"
            font.bold: true
            //anchors.horizontalCenter: parent
        }
        Text { // date text
            x: 40
            y: 30
            text: textDate
            color: isCurrentDate ? "black" : "white"
            //anchors.horizontalCenter: parent
        }
    }

    Component.onDestruction: {
        // Xoa mang
//        var N = scheduleArray.length
//        for(var i = 0; i < scheduleArray.length; i++){
//            scheduleArray.pop()
//        }
    }

}
