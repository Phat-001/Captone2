import QtQuick 2.12
import QtQuick.Controls 2.5
import "../unit"

Page {
    width: 412
    height: 846
    //color: "#696969"

    onVisibleChanged: {
        loginInfoIncorrectNotify.visible = false
    }

    Connections {
        target: loginService
        function onLoginInfoIncorrect(){
            loginInfoIncorrectNotify.visible = true
        }
    }

    TextField {
        id: userNameField
        width: 300
        height: 70
        x: 50
        y: 300
        font.pointSize: 20
        placeholderText: "User name"
        text: "phuthienst"
    }

    TextField {
        id: passWordField
        width: 300
        height: 70
        x: 50
        y: 400
        font.pointSize: 20
        passwordCharacter: "*"
        echoMode: TextInput.Password
        placeholderText: "Password"
        text: "phuthien123"
    }

    Text {
        id: loginInfoIncorrectNotify
        font.pointSize: 14
        text: "Username or password incorrect"
        visible: false
        x: 50
        y: 470
        color: "red"
    }

    Rectangle {
        width: 200
        height: 70
        x: 100
        y: 530
        color: "red"
        Text {
            anchors.centerIn: parent
            text: "Login"
            font.pointSize: 20
            color: "white"
        }
        MouseArea {
            anchors.fill: parent
            onPressed: {
                parent.width = 220
                parent.height = 75
            }
            onReleased: {
                parent.width = 200
                parent.height = 70
                loginService.login(userNameField.text, passWordField.text)
            }
        }
    }

}
