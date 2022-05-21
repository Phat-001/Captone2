import QtQuick 2.12
import QtQuick.Controls 1.4
import QtQuick.Window 2.2
import QtQuick.Layouts 1.2
import QtQuick.Controls.Styles 1.1

Rectangle {
    width: 412
    height: 846
    id: datePickerOverlay
    color: "black"
    visible: false

    property int jobID

    function clear(){
        startHourTextField.text = ""
        startMinuteTextField.text = ""
        finishHourTextField.text = ""
        finishMinuteTextField.text = ""
        noteTextArea.text = ""
    }

    onVisibleChanged: {
        if(visible === true) clear()
    }

    MouseArea {
        anchors.fill: parent
        onClicked: {}
    }
    Text {
        text: "Choose your job's interview schedule"
        color: "green"
        font.pointSize: 15
        font.italic: true
        x: 20
        y: 25
    }

    property string dateSelected : Qt.formatDateTime (calendar.selectedDate, "yyyy-MM-dd")
    Rectangle {
        id: dataPickerWindow
        width: parent.width
        height: 750
        x: 5
        y: 75
        color: "transparent"
        Calendar {
            id: calendar
            width: 400
            height: 400
            minimumDate: new Date()
            maximumDate: new Date(2082, 1, 1)
            style: CalendarStyle {
                 gridVisible: false
                 dayDelegate: Rectangle {
                     gradient: Gradient {
                         GradientStop {
                             position: 0.00
                             color: styleData.selected ? "#111" : (styleData.visibleMonth && styleData.valid ? "#444" : "#666");
                         }
                         GradientStop {
                             position: 1.00
                             color: styleData.selected ? "#444" : (styleData.visibleMonth && styleData.valid ? "#111" : "#666");
                         }
                         GradientStop {
                             position: 1.00
                             color: styleData.selected ? "#777" : (styleData.visibleMonth && styleData.valid ? "#111" : "#666");
                         }
                     }
                     Label {
                         text: styleData.date.getDate()
                         anchors.centerIn: parent
                         color: styleData.valid ? "white" : "grey"
                     }
                     Rectangle {
                         width: parent.width
                         height: 1
                         color: "#555"
                         anchors.bottom: parent.bottom
                     }
                     Rectangle {
                         width: 1
                         height: parent.height
                         color: "#555"
                         anchors.right: parent.right
                     }
                 }
             }
            onClicked:{}
        }
        Text {
            id: startTimeTitle
            text: "Start"
            font.pixelSize: 25
            color: "white"
            x: 5
            y: 420
        }
        TextField {
            id: startHourTextField
            width: 100
            height: 30
            placeholderText: "00"
            x: 100
            y: startTimeTitle.y
        }
        Text {
            font.pixelSize: 25
            color: "white"
            x: 205
            y: startTimeTitle.y
            text: "H :"
        }
        TextField {
            id: startMinuteTextField
            width: startHourTextField.width
            height: startHourTextField.height
            placeholderText: "00"
            x: 250
            y: startTimeTitle.y
        }
        Text {
            font.pixelSize: 25
            color: "white"
            x: 355
            y: startTimeTitle.y
            text: "M"
        }
// -----------------------------------------------
        Text {
            id: finishTimeTitle
            text: "Finish"
            font.pixelSize: 25
            color: "white"
            x: 5
            y: 475
        }
        TextField {
            id: finishHourTextField
            width: 100
            height: 30
            placeholderText: "00"
            x: 100
            y: finishTimeTitle.y
        }
        Text {
            font.pixelSize: 25
            color: "white"
            x: 205
            y: finishTimeTitle.y
            text: "H :"
        }
        TextField {
            id: finishMinuteTextField
            width: finishHourTextField.width
            height: finishHourTextField.height
            placeholderText: "00"
            x: 250
            y: finishTimeTitle.y
        }
        Text {
            font.pixelSize: 25
            color: "white"
            x: 355
            y: finishTimeTitle.y
            text: "M"
        }
        Text {
            id: noteTitle
            text: "Note"
            font.pixelSize: 25
            color: "white"
            x: 5
            y: 530
        }
        TextArea{
            id: noteTextArea
            x: 100
            y: noteTitle.y
            width: 300
            height: 100
        }
    }

    property string startHour: startHourTextField.text
    property string startMinute: startMinuteTextField.text
    property string finishHour: finishHourTextField.text
    property string finishMinite: finishMinuteTextField.text

    function daySelectedDebug() {
        console.log("Date selected: <" + dateSelected + "> " + startHour + ":" + startMinute + "-" + finishHour + ":" + finishMinite)
    }

    onDateSelectedChanged: {
        daySelectedDebug()
    }
    onStartHourChanged: {
        daySelectedDebug()
    }
    onStartMinuteChanged: {
        daySelectedDebug()
    }
    onFinishHourChanged:  {
        daySelectedDebug()
    }
    onFinishMiniteChanged: {
        daySelectedDebug()
    }

    Row {
        id: buttonRowLayout
        x: 80
        y: 730
        spacing: 50
        Rectangle {
            id: okButton
            width: 100
            height: 50
            color: "green"
            radius: 5
            Text {
                anchors.centerIn: parent
                text: "OK"
                font.pointSize: 20
                color: "white"
            }
            MouseArea {
                id: okButtonMouseArea
                anchors.fill: parent
                onPressed: {
                    parent.width = 110
                    parent.height = 55
                }
                onReleased: {
                    parent.width = 100
                    parent.height = 50
                    wishJobDataGate.setSchedule(jobID, dateSelected, startHour, startMinute, finishHour, finishMinite, noteTextArea.text)
                    datePickerOverlay.visible = false
                }
            }
        }
        Rectangle {
            id: backButton
            width: 100
            height: 50
            color: "red"
            radius: 5
            Text {
                anchors.centerIn: parent
                text: "Back"
                font.pointSize: 20
                color: "white"
            }
            MouseArea {
                id: backButtonMouseArea
                anchors.fill: parent
                onClicked: {
                    datePickerOverlay.visible = false
                }
            }
        }
    }

}
