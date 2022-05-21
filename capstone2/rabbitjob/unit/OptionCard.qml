import QtQuick 2.12

Item {
    id: optionCard
    width: 350
    height: 80
    x: 30
    //anchors.horizontalCenter: parent
    property string logoSource: ""
    property string title: ""
    property real opacity_: 1

    Rectangle {
        id: background
        anchors.fill: parent
        color: "black"
        radius: 5
        opacity: opacity_
        Image {
            id: logo
            width: optionCard.height
            height: width
            source: logoSource
        }
    }

    Text {
        id: cardTitle
        font.pointSize: 17
        text: title
        x: 100
        y: (optionCard.height - cardTitle.font.pointSize)/2
        opacity: opacity_
        color: "white"
    }

    property alias mouseArea: optionCardMouseArea
    MouseArea {
        id: optionCardMouseArea
        anchors.fill: parent
    }
}
