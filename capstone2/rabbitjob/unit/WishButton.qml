import QtQuick 2.12

Image {
    id: wishButton
    source: "file:/home/karl/Desktop/capstone2/image/wish_icon.png"
    width: basicSize
    height: width
    property int basicSize: 40

    //enabled: source === "file:/home/karl/Desktop/capstone2/image/wish_icon.png" ? true : false

    property alias wishButtonMouseArea: wishButtonMouseArea
    MouseArea {
        id: wishButtonMouseArea
        anchors.fill: parent
        onPressed: {
            wishButton.width = 45
        }
    }
}
