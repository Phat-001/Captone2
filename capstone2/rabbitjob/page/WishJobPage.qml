import QtQuick 2.12
import QtQuick.Controls 2.5
import "../unit"

Page {
    id: wishJobPage
    width: 412
    height: 846

    Text {
        text: "Your wish job"
        color: "green"
        font.pointSize: 25
        font.italic: true
        font.bold: true
        x: 90
        y: 25
    }

    function refreshWishJobListView(){
        wishJobListView.model = null
        wishJobListView.model = wishJobDataGate
    }

    Connections {
        target: wishJobDataGate
        function onModelChanged(){
            if(loginService.isLoggedIn === true){
                refreshWishJobListView()
            }
        }
    }

    background: Image {
        source: "file:/home/karl/Desktop/capstone2/image/wish_theme.jpg"
    }

    BackButton {
        x: 10
        y: 20
        MouseArea {
            anchors.fill: parent
            onPressed: {
                parent.width = 55
                parent.height = 55
            }
            onReleased: {
                parent.width = 50
                parent.height = 50
                wishJobPageLoader.visible = false
            }
        }
    }

    ListView {
        id: wishJobListView
        width: 400
        height: 600
        clip: true
        model: wishJobDataGate
        x: 5
        y: 100
        spacing: 10

        delegate: JobCard {
            jobTitle: model.jobTitle
            salary: model.salary
            address: model.address
            type: model.jobType
            level: model.level
            ScheduleButton {
                x: 360
                isScheduleSetted: model.isScheduleSetted
                scheduleButtonMouseArea.onReleased: {
                    width = basicSize
                    if(isScheduleSetted){
                        // Neu da len lich cho job
                        editDatePicker.setProperty(model.jobID, model.startHour, model.startMinute, model.finishHour, model.finishMinute, model.note)
                        editDatePicker.visible = true
                    } else {
                        datePicker.jobID = model.jobID
                        datePicker.visible = true
                    }
                }
            }

            MouseArea {
                width: 300
                height: parent.height
                onClicked: {
                    console.log("[WishJobPage.qml][JobCard clicked] := " + parent.jobTitle)
                    jobDetailDrawer.letOpen(model.jobTitle, model.salary.toString(),
                                            model.address, model.level, model.jobType,
                                            model.description, model.logo, model.longitude,
                                            model.latitude, model.date + ', ' + model.time, model.note)
                }
            }
        }
    }

    DatePickerWindow {
        id: datePicker
    }

    EditDatePickerWindow {
        id: editDatePicker
    }

}
