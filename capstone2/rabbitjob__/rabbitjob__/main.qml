import QtQuick 2.15
import QtQuick.Window 2.15
import QtQuick.Controls 2.12

Window {
    width: 412
    height: 846
    visible: true
    title: qsTr("Rabbit Job")

    // standard height 846

    ScrollView{
        anchors.fill: parent
        clip: true
        BasePage{}
    }



}
