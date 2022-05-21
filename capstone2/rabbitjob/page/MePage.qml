import QtQuick 2.12
import QtQuick.Controls 2.5
import "../unit"

Page {
    id: mePage
    width: 412
    height: 846

    Rectangle {
        id: headerMePage
        width: 412
        height: 100
        color: "gray"
        y: 20
        radius: 10
        Row {
            anchors.fill: parent
            y: 20
            Image {
                width: 100
                height: width
                source: "file:/home/karl/Desktop/capstone2/image/user_icon.png"
            }
            Text {
                text: "Hi! " + loginService.account.name
                font.pointSize: 15
                color: "white"
                y: 30
                leftPadding: 20
            }
        }
    }

    Button {
        id: loggoutButton
        width: 100
        height: 50
        x: 270
        y: 90
        text: "Logout"
        onClicked: {
            loginService.logout();
        }
    }

    Column {
        width: parent.width
        y: 180
        spacing: 10
        OptionCard {
            id: wishCard
            title: "Wish job list"
            logoSource: "file:/home/karl/Desktop/capstone2/image/wish_icon.png"
            enabled: !wishJobDataGate.isEmpty
            opacity_: enabled ? 1 : 0.35
            mouseArea.onClicked: {
                if(wishJobPageLoader.isLoaded === false){
                    console.log("[MePage.qml] : wishJobPage loaded!")
                    wishJobPageLoader.source = "qrc:/page/WishJobPage.qml"
                }
                else {
                    console.log("[MePage.qml] : wishJobPage opened!")
                    wishJobPageLoader.visible = true
                }
            }
        }
        OptionCard {
            id: scheduleCard
            title: "Your schedule"
            logoSource: "file:/home/karl/Desktop/capstone2/image/schedule_icon.png"
            mouseArea.onClicked: {
                scheduleViewPage.visible = true
            }
        }
        OptionCard {
            id: accountInfoCard
            title: "Personal information"
        }
    }

    property alias wishJobPageLoader: wishJobPageLoader
    Loader {
        id: wishJobPageLoader
        property bool isLoaded: false
        onLoaded: {
            isLoaded = true
        }
    }

    LoginPage {
        id: loginPage
        visible: !loginService.isLoggedIn
    }

    ScheduleViewPage {
        id: scheduleViewPage
        visible: false
    }

}
