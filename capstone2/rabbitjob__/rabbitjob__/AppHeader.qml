import QtQuick 2.15

Rectangle {
    id: header
    width: parent.width
    height: parent.height/5
    color: "green"
    Image {
        id: logo
        source: "file:/home/karl/Desktop/capstone2/image/app_logo.png"
        width: 250
        height: parent.height*0.75
        x: 200
        y: (parent.height-height)/2
    }
}
