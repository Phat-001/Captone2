import QtQuick 2.12
import QtQuick.Controls 2.5
import "../page"

Rectangle {
    id: searchFieldFaking
    width: 260
    height: 30
    color: "white"
    opacity: 0.6
    radius: 10

    Text {
        id: text
        x: searchIcon.width + 20
        y: 7
        width: searchFieldFaking.width - searchIcon.width
        height: searchFieldFaking.height
        text: qsTr("PHP Laravel")
    }

    Image {
        id: searchIcon
        width: searchFieldFaking.height
        height: searchIcon.width
        source: "file:/home/karl/Desktop/capstone2/image/search_icon.png"
    }

    MouseArea {
        id: searchFieldFakingMouseArea
        anchors.fill: parent
        hoverEnabled: true
        onPressed: {
            text.y = 8
            searchFieldFaking.width = 285
            searchFieldFaking.height = 33
        }
        onReleased: {
            if(searchFieldFakingMouseArea.containsMouse){
                //searchPageLoader.active = true
                searchPageLoader.visible = true
            }
            text.y = 7
            searchFieldFaking.width = 280
            searchFieldFaking.height = 30
        }
    }

}
