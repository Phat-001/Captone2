import QtQuick 2.12
import QtQuick.Controls 2.12
import QtQuick.Layouts 1.12
import QtQuick.Controls.Styles 1.1
import "../unit"

Drawer {
    /* Include job detail and map navigation */
    id: jobDetailDrawer
    width: 412
    height: 820
    edge: Qt.BottomEdge
    property alias jobDetailDrawer : jobDetailDrawer
    property string title
    property string salary
    property string address
    property string level
    property string type // partime or fulltime
    property string description
    property string logo // logo path
    property real longitude
    property real latitude
    /*Properties below use when open this drawer in schedule view*/
    property string time
    property string note

    function letOpen(_title, _salary, _address, _level, _type, _description, _logo = "", _longitude = 0.0, _latitude = 0.0, _time = "", _note = ""){
        title = _title
        salary = _salary
        address = _address
        level = _level
        type = _type
        description = _description
        logo = _logo
        longitude = _longitude
        latitude = _latitude
        time = _time
        note = _note
        //console.log(_title + ", " + _salary + ", " + _address + ", " + _level + ", " + _type + ", " + _description)
        jobDetailDrawer.open()
    }

    onVisibleChanged: {
        if(visible === false){
            mapLoader.source = ""
        }
        else if(visible === true){
            mapLoaderTimer.start()
        }
    }

    BackButton {
        source: "file:/home/karl/Desktop/capstone2/image/back_bottom_white.png"
        width: 80
        height: 20
        x: 160
        MouseArea {
            anchors.fill: parent
            onPressed: {
                parent.width = 85
                parent.height = 25
            }
            onReleased: {
                parent.width = 80
                parent.height = 20
                jobDetailDrawer.close()
            }
        }
    }

    ScrollView {
        id: scrollView
        width: 412
        height: 400
        x: 10
        y: 40
        contentHeight: 500
        clip: true
        Column {
            id: detailColumn
            spacing: 10
            Row { /* Title */
                id: titleText
                spacing: 10
                Rectangle {
                    width: 70
                    height: 70
                    radius: 5
                    color: "white"
                    Image {
                        anchors.fill: parent
                        source: logo
                    }
                }
                Text {
                    y: 20
                    text: title
                    font.pointSize: 15
                    font.bold: true
                    color: "cyan"
                }
            }
            Rectangle {
                id: partition1
                width: jobDetailDrawer.width - 5
                height: 2
                color: "blue"
            }
            Row { /* Salary */
                id: salaryText
                spacing: 5
                Image {
                    width: 20
                    height: 20
                    source: "file:/home/karl/Desktop/capstone2/image/salary_icon.png"
                }
                Text {
                    text: salary + " $"
                    font.pointSize: 15
                    color: "lime"
                }
            }
            Row { /* Address */
                id: addressText
                spacing: 5
                Image {
                    width: 20
                    height: 20
                    source: "file:/home/karl/Desktop/capstone2/image/location_icon.png"
                }
                Text {
                    text: address
                    font.pointSize: 15
                    color: "white"
                    width: 412-40
                    wrapMode: Text.Wrap
                }
            }
            Text { /* Level */
                id: levelText
                text: level === "" ? "" : "Level: " + level
                font.pointSize: 15
                color: "white"
            }
            Text { /* Partime or fulltime */
                id: typeText
                text: "Form of employment: " + type
                font.pointSize: 15
                color: "white"
            }
            Button {
                id: descriptionButton
                width: 412 - 20
                height: basicHeight
                text: textDes.lineCount > 1 && isOpened === false ? textDes.text.slice(0, 40) + "..." : isOpened === true ? "" : textDes.text

                property bool isOpened: false
                property int basicHeight: 50
                contentItem: Text {
                    text: descriptionButton.text
                    font.pointSize: 15
                    color: "white"
                    elide: Text.ElideRight
                }

                Text {
                    id: textDes
                    visible: descriptionButton.isOpened === true ? true : false
                    x: 10
                    y: 10
                    width: parent.width
                    text: "Description: " + description
                    color: "white"
                    font.pointSize: 15
                    wrapMode: Text.Wrap
                }
                onClicked: {
                    if(isOpened === false){
                        if(textDes.lineCount > 1){
                            descriptionButton.height = textDes.contentHeight + 20//basicHeight*textDes.lineCount
                            isOpened = true
                        }
                    }
                    else { /* true */
                        descriptionButton.height = basicHeight
                        isOpened = false
                    }
                }
            } // descriptionButton
            Rectangle {
                id: partition2
                width: jobDetailDrawer.width - 5
                height: (time + note) === ", " ? 0 : 2
                color: "blue"
            }
            Text {
                id: timeText
                text: time === "" ? "" : "Time: " + time
                font.pointSize: 15
                color: "white"
            }
            Text { /* Note */
                id: noteText
                text: note === "" ? "" : "Note: " + note
                font.pointSize: 15
                color: "white"
            }
        } /* Column */
    }

    Timer {
        id: mapLoaderTimer
        interval: 300
        onTriggered: {
            mapLoader.source = "qrc:/unit/NavigationView.qml"
        }
    }
    Loader {
        id: mapLoader
    }
}
