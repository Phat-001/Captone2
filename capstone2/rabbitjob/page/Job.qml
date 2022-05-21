import QtQuick 2.12
import QtQuick.Controls 2.5
import "../unit"

Page{
    id: root
    width: 412
    height: 846

    Image{
        id: header
        width: 412
        height: 200
        source: "file:/home/karl/Desktop/capstone2/image/wearehiring.jpg"

        Image {
            source: "file:/home/karl/Desktop/capstone2/image/app_logo.png"
            width: 100
            height: 70
        }

        SearchFieldFake {
            x: 100
            y: 10
        }
    }

    ListView {
        id: newsList
        width: 400
        height: 500
        clip: true
        x: 5
        y: 250
        model: newsModel
        delegate: Item {
            width: 400
            height: 100
            Rectangle {
                anchors.fill: parent
                color: "transparent"
            }
            Text {
                wrapMode: Text.Wrap
                text: model
            }
        }
    } // newsList
}
