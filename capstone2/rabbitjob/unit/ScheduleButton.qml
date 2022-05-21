import QtQuick 2.12

Rectangle {
    id: scheduleButton
    //source: "file:/home/karl/Desktop/capstone2/image/schedule_icon.png"
    width: basicSize
    height: width
    color: "black"
    property int basicSize: 40
    property bool isScheduleSetted: false

    Image {
        x: 3
        width: 37
        height: width
        source: "file:/home/karl/Desktop/capstone2/image/schedule_icon.png"
    }

    Image {
        id: settedIcon
        source: "file:/home/karl/Desktop/capstone2/image/ok_icon.png"
        width: scheduleButton.width/2
        height: width
        visible: isScheduleSetted
        x: 20
        y: 20
    }

    property alias scheduleButtonMouseArea: scheduleButtonMouseArea
    MouseArea {
        id: scheduleButtonMouseArea
        anchors.fill: parent
        onPressed: {
            scheduleButton.width = 45
        }
    }
}
