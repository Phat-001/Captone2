import QtQuick 2.12
import QtQuick.Controls 2.15
import "../unit"

Page {
    id: scheduleViewPage
    width: 412
    height: 846

    function refreshWeekView(){
        weekView.model = null
        weekView.model = weekControl
    }

    Connections {
        target: wishJobDataGate
        function onModelChanged(){
            refreshWeekView()
        }
    }

    BackButton {
        MouseArea {
            anchors.fill: parent
            onClicked: {
                scheduleViewPage.visible = false
            }
        }
    }

    Row{
        x: 65
        y: 5
        spacing: 30
        Button {
            id: previousWeekButton
            width: 150
            height: 40
            text: "<< previous week"
            onClicked: {
                weekControl.moveToPreviousWeek()
                refreshWeekView()
            }
        }
        Button {
            id: nextWeekButton
            width: 150
            height: 40
            text: "Next week >>"
            onClicked:{
                weekControl.moveToNextWeek()
                refreshWeekView()
            }
        }
    }

    HourDivide {
        y: 93
    }

    ListView {
        id: weekView
        x : 40
        y: 50
        width: 372
        height: 750
        clip: true
        orientation: ListView.Horizontal
        model: weekControl

        delegate: DayScheduleCard {
            id: scheduleDelegate
            Component.onCompleted: {
                isCurrentDate = model.date === weekControl.getCurrentDay()
                var scheduleArr = wishJobDataGate.findSchedule(model.date).split("-&-")

                for(var i = 0; i < scheduleArr.length - 1; i++){
                    var schedule = scheduleArr[i].split("-@-")
                    /**/
                    var title = schedule[0]
                    var deltaTime = parseFloat(schedule[1])*(timeHeight/timePartitionCount)
                    //         (8.5-7)*(700/14)
                    var startTime = 50 + (parseFloat(schedule[2]) - startLimitTime)*(timeHeight/timePartitionCount)
                    var time = schedule[3]
                    var note = schedule[4]
                    /* (7 to 21)h */
                    var salary = schedule[5]
                    var address = schedule[6]
                    var level = schedule[7]
                    var type = schedule[8]
                    var logo = schedule[9]
                    var longitude = schedule[10] // string format
                    var latitude = schedule[11] // string format
                    var description = schedule[12]

                    var scheduleObj = Qt.createQmlObject('import "../unit"; Schedule {' +
                                                         'y: ' + startTime.toString() + ';' +
                                                         'height: ' + deltaTime.toString() + ';' +
                                                         'title: "' + title + '";' +
                                                         'time: "' + time + '";' +
                                                         'note: "' + note + '";' +
                                                         'salary: "' + salary + '";' +
                                                         'address: "' + address + '";' +
                                                         'level: "' + level + '";' +
                                                         'type: "' + type + '";' +
                                                         'logo: "' + logo + '";' +
                                                         'longitude: ' + longitude + ';' +
                                                         'latitude: ' + latitude + ';' +
                                                         'description: "' + description + '";' +
                                                         '}',
                                                         scheduleDelegate);
                    scheduleArray.push(scheduleObj)
                } // for
            }
            thu: model.dayOfWeek
            textDate: model.date
        }
    }

}
