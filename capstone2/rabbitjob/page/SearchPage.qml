import QtQuick 2.12
import QtQuick.Controls 2.5
import QtQuick.Layouts 1.12
import "../unit"

Page {
    width: 412
    height: 846

    background: Image {
        source: "file:/home/karl/Desktop/capstone2/image/search_theme.jpg"
    }

    function refreshJobSearchResultListView(){
        jobSearchResultListView.model = null
        jobSearchResultListView.model = jobInfoModelSearchPage
    }

    Connections {
        target: jobDataGateSearchPage
        function onDataChanged() {
            refreshJobSearchResultListView()
        }
    }

    Connections {
        target: listNavigatorSearchPage
        function onCurrentListIndexChanged(){
            listNavigatorView.model = null
            listNavigatorView.model = listNavigatorSearchPage
            console.log("[SearchPage.qml] : Total list is " + listNavigatorSearchPage.totalList)
        }
    }

    Connections {
        target: wishJobDataGate
        function onModelChanged(){
            refreshJobSearchResultListView()
        }
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
                searchPageLoader.visible = false
            }
        }
    }

    SearchFieldArea {
        id: searchFieldArea
        x: 85
        y: 20
    }

    RecommenderFake {
        x: 20
        y: 130
    }

    ListView {
        id: jobSearchResultListView
        width: 400
        height: 100*listNavigatorSearchPage.limitRowsPerList
        clip: true
        model: jobInfoModelSearchPage
        x: 5
        y: 280
        spacing: 10

        Component.onCompleted: {
            console.log("[SearchPage.qml][listNavigatorSearchPage.limitRowsPerList] := " + listNavigatorSearchPage.limitRowsPerList)
        }
        delegate: JobCard {
            jobTitle: model.jobTitle
            salary: model.salary
            address: model.address
            type: model.jobType
            level: model.level
            Component.onCompleted: { //                  true    &&  true
                if(!loginService.isLoggedIn) {
                    wishButton_.visible = false
                }
                else {
                    wishButton_.visible = !(wishJobDataGate.isInWishList(model.id))
                }
            }
            WishButton {
                id: wishButton_
                x: 355
                //visible: loginService.isLoggedIn // (*)
                wishButtonMouseArea.onReleased: {
                    width = basicSize
                    wishJobDataGate.addWishJob(model.id)
                }
            }
            WishButton {
                id: favoriteButton_ // Click to cancel favorite job
                x: 355
                source: "file:/home/karl/Desktop/capstone2/image/favorite_icon.jpg"
                visible: !loginService.isLoggedIn ? false : !wishButton_.visible
                wishButtonMouseArea.onReleased: {
                    width = basicSize
                    wishJobDataGate.deleteWishJob(model.id)
                }
            }
            MouseArea {
                //anchors.fill: parent
                width: 350
                height: parent.height
                onClicked: {
                    console.log("[SearchPage.qml][JobCard clicked] := " + parent.jobTitle)
                    jobDetailDrawer.letOpen(model.jobTitle, model.salary.toString(), model.address, model.level, model.jobType, model.description)
                }
            }
        }
    }

    ListView {
        id: listNavigatorView
        width: model === null ? 0 : model.listNavigatorLength*height
        height: 50
        clip: true
        x: 100
        y: 750
        orientation: ListView.Horizontal
        model: listNavigatorSearchPage

        delegate: Rectangle {
            width: parent.height
            height: width
            border.width: model.index === listNavigatorSearchPage.currentListIndex ? 5 : 1
            border.color: model.index === listNavigatorSearchPage.currentListIndex ? "blue" : "gray"
            color: "transparent"
            Text {
                anchors.centerIn: parent
                text: model.index
                color: "white"
            }
            MouseArea {
                anchors.fill: parent
                onClicked: {
                    console.log("[SearchPage.qml] : listNavigatorView Selected index " + model.index)
                    listNavigatorSearchPage.currentListIndex = model.index
                }
            }
        }
    } // listNavigatorView

    property alias filterDrawer: filterDrawer
    Drawer {
        id: filterDrawer
        width: 375
        height: parent.height
        edge: Qt.RightEdge

        Text {
            id: header
            x: 100
            y: 10
            text: "Filter"
            font.pointSize: 20
            color: "white"
        }

        Image {
            id: closeFilterDrawerButton
            source: "file:/home/karl/Desktop/capstone2/image/back_right_black.png"
            width: 30
            height: 70
            x: -32.5 //25
            y: 388
            MouseArea {
                id: closeFilterDrawerButtonMouseArea
                anchors.fill: parent
                hoverEnabled: true
                onPressed: {
                    closeFilterDrawerButton.width = 35
                    closeFilterDrawerButton.height = 75
                }
                onReleased: {
                    if(closeFilterDrawerButtonMouseArea.containsMouse){
                        filterDrawer.close()
                    }
                    closeFilterDrawerButton.width = 30
                    closeFilterDrawerButton.height = 70
                }
            }
        } // closeFilterDrawerButton

        Text {
            x: 25
            y: 50
            text: "Desired salary(USD)"
            color: "white"
            font.pointSize: 15
        }
        TextField {
            id: salaryTextField
            width: 260
            height: 50
            x: 25
            y: 70
            placeholderText: qsTr("Enter your desired salary")
            onTextChanged: {
                jobDataGateSearchPage.salary = text
            }
        }
        Text {
            x: 25
            y: 140
            text: "City"
            color: "white"
            font.pointSize: 15
        }
        TextField {
            id: cityTextField
            width: 260
            height: 50
            x: 25
            y: 160
            placeholderText: qsTr("Enter your city")
            onTextChanged: {
                jobDataGateSearchPage.cityName = text
            }
        }
        Text {
            x: 25
            y: 230
            text: "Distance(Kilometer)"
            color: "white"
            font.pointSize: 15
        }
        TextField {
            id: distanceTextField
            width: 260
            height: 50
            x: 25
            y: 250
            placeholderText: qsTr("Enter job distance")
            onTextChanged: { // kilometers
                jobDataGateSearchPage.distance = text
            }
        }
        Text {
            x: 25
            y: 320
            text: "Job level"
            color: "white"
            font.pointSize: 15
        }
        TextField{
            id: levelTextField
            width: 260
            height: 50
            x: 25
            y: 340
            placeholderText: qsTr("Enter job level")
            onTextChanged: {
                jobDataGateSearchPage.jobLevel = text
            }
        }
        Text {
            x: 25
            y: 410
            text: "Job type"
            color: "white"
            font.pointSize: 15
        }
        ComboBox {
            id: jobTypeComboBox
            width: 260
            height: 50
            x: 25
            y: 435
            currentIndex: 0
            model: ["Unselected", "Fulltime", "Parttime"]
            onCurrentIndexChanged: {
                jobDataGateSearchPage.isQueryByJobType = currentIndex
            }
        }

        Text {
            id: salaryInvalidNotify
            x: 50
            y: 115
            visible: false
            text: "Invalid value, please enter number \n      or '-' to find salary in a range"
            color: "red"
            font.pointSize: 10
        }
        Text {
            id: distanceInvalidNotify
            x: 50
            y: 300
            visible: false
            text: "Invalid value, please enter valid distance number"
            color: "red"
            font.pointSize: 10
        }
        Image {
            id: clearFilterButton
            x: 140
            y: 500
            width: 50
            height: 50
            source: "file:/home/karl/Desktop/capstone2/image/clear.png"
            MouseArea {
                id: clearFilterButtonMouseArea
                anchors.fill: parent
                hoverEnabled: true
                onPressed: {
                    clearFilterButton.width = 55
                    clearFilterButton.height = 55
                }
                onReleased: {
                    if(clearFilterButtonMouseArea.containsMouse){
                        /* Clear tất cả giá trị filter ở đây bằng cách set giá trị các thông số
                         bên phía C++ */
                    }
                    clearFilterButton.width = 50
                    clearFilterButton.height = 50
                    salaryTextField.text = ""
                    cityTextField.text = ""
                    distanceTextField.text = ""
                    levelTextField.text = ""
                    jobTypeComboBox.currentIndex = 0
                }
            }
        } // clearFilterButton

        Connections {
            target: jobDataGateSearchPage
            function onDistanceInvalid(){
                distanceInvalidNotify.visible = true
            }
            function onDistanceValid(){
                distanceInvalidNotify.visible = false
            }
            function onSalaryInvalid(){
                salaryInvalidNotify.visible = true
            }
            function onSalaryValid(){
                salaryInvalidNotify.visible = false
            }
        }
    } // filterDrawer
}
