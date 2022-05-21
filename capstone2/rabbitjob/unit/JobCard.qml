import QtQuick 2.12

Item {
    id: jobCard
    width: 400
    height: 110

    property string logoLink: ""
    property string jobTitle: ""
    property string salary: ""
    property string address: ""
    property string level: ""
    property string type: ""

    onJobTitleChanged: {}

    Rectangle {
        id: jobCardBackground
        anchors.fill: parent
        border.width: 2
        border.color: "white"
        color: "white"
    }

    Row { /* Title */
        id: titleText
        x: 5
        y: 5
        spacing: 5
        Rectangle {
            width: 100
            height: width
            radius: 5
            color: "gray"
            Image {
                anchors.fill: parent
                source: logo
            }
        }
        Text {
            //y: 10
            text: jobTitle.length < 20 ? jobTitle : jobTitle.slice(0, 20) + "..."
            font.pointSize: 15
            font.bold: true
            color: "cyan"
        }
    }
    Row {
        id: salaryText
        x: 110
        y: 35
        spacing: 5
        Image {
            width: 20
            height: 20
            source: "file:/home/karl/Desktop/capstone2/image/salary_icon.png"
        }
        Text {
            text: salary + " $"
            font.pointSize: 12
            font.bold: true
            font.italic: true
            color: "lime"
        }
    }
    Text {
        id: levelText
        x: 115
        y: 60
        font.pointSize: 12
        color: "black"
        font.bold: true
        text: level
    }
    Text {
        id: typeText
        x: 250
        y: 35
        font.pointSize: 12
        font.bold: true
        color: "red"
        text: type
    }
    Row { /* Address */
        id: addressText
        spacing: 5
        x: 110
        y: 85
        Image {
            width: 20
            height: 20
            source: "file:/home/karl/Desktop/capstone2/image/location_icon.png"
        }
        Text {
            text: address
            font.pointSize: 12
            color: "black"
            width: 412-40
            wrapMode: Text.Wrap
        }
    }
}
