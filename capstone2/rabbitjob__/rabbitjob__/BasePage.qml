import QtQuick 2.15

Item {
    id: root
    width: 412
    height: 1500

    property int standardHeight: 846

    AppHeader {
        id: header
        height: standardHeight/5
    }

}
