import QtQuick 2.12
import QtQuick.Controls 2.5

Item {
    id: root
    width: 340
    height: 50

    TextField {
        id: searchField
        width: 260
        height: 50
        placeholderText: qsTr("PHP laravel")
        onTextChanged: {
            jobDataGateSearchPage.skill = text
        }

    }

    Image {
        id: filterButton
        width: 50
        height: 50
        x: 265
        source: "file:/home/karl/Desktop/capstone2/image/filter.png"
        MouseArea {
            id: filterButtonMouseArea
            anchors.fill: parent
            hoverEnabled: true
            onPressed: {
                parent.width = 54
                parent.height = 54
            }
            onReleased: {
                if(filterButtonMouseArea.containsMouse){
                    filterDrawer.open()
                }
                filterButton.width = 50
                filterButton.height = 50
            }
        }
    }

}
