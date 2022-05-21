import QtQuick 2.12
import QtQuick.Controls 2.12
import QtQuick.Layouts 1.12
import QtQuick.Window 2.12
import GeneralMagic 2.0

Rectangle {
    id: navigationView
    visible: true
    width: 412
    height: 400
    y: 420
    color: "white"
    property real focusLatitude: positionDetect.latitude
    property real focusLongitude: positionDetect.longitude
    property real startLatitude: focusLatitude
    property real startLongitude: focusLongitude
    property real finishLatitude: jobDetailDrawer.latitude
    property real finishLongitude: jobDetailDrawer.longitude
    property bool isFullScreen: false

    Component.onCompleted: {
        ServicesManager.settings.token = mockproject; // Load phai dung ten token
        mapView.centerOnCoordinates(initialCenter); // Hien thi ban do dung vi tri

        ServicesManager.logLevel = ServicesManager.Error;
        ServicesManager.settings.allowInternetConnection = true; // Cho phep su dung cac service maps

        var updater = ServicesManager.contentUpdater(ContentItem.Type.RoadMap);
        updater.autoApplyWhenReady = true;
        updater.update();
        routingService.update()
    }// Ket noi voi service maps

    RoutingService {
        id: routingService
        type: Route.Type.Fastest
        transportMode: Route.TransportMode.Car

        waypoints: LandmarkList {
            Landmark {
                name: "start"
                coordinates: Coordinates {
                    latitude: 16.078361188215975
                    longitude: 108.20888957817967
                }
            }// Diem bat dau
            Landmark {
                name: "stop"
                coordinates: Coordinates {
                    latitude: 16.0581961
                    longitude: 108.2350027
                }
            }// Diem ket thuc
        }
        onFinished: {
            mapView.routeCollection.set(routeList);
            mapView.centerOnRouteList(routeList);
        }// Sau khi xac dinh duoc 2 diem thi ve duong route
    }// Xay dung 2 diem va duong route

    function distance(meters)
    {
        return meters >= 1000 ? (meters / 1000.).toFixed(3) + " Km" :  meters.toFixed(0) + " m";
    }// Tinh chieu dai duong route

    NavigationService {
        id: navigation
        route: mapView.routeCollection.mainRoute
        simulation: true
        onActiveChanged: {
            if (active) {
                mapView.startFollowingPosition();
                mapView.routeCollection.clear(true /*keepMainRoute*/);
            }
        }// Neu ok thi thuc hien route
        onWaypointReached: console.log("WaypointReached :" + waypoint.name);
        onDestinationReached: mapView.routeCollection.clear();
        onNavigationError: {
            console.log("NavigationError :" + error);
            mapView.routeCollection.clear();
        }// Neu loi thi kg chi duong
        onNavigationRouteUpdated: {
            console.log("RouteUpdated :" + route.summary);
            mapView.routeCollection.add(route, true);
            mapView.routeCollection.clear(true);
        }// Update route
    }// Thuc hien route

    MapView {
        id: mapView
        anchors.fill: parent
        viewAngle: 25
        cursorVisibility: false

        Coordinates
        { // 16.0602563,108.2381276
            id: initialCenter
            latitude: focusLatitude//16.0602563
            longitude: focusLongitude//108.2381276
        }// Load ban do dung vi tri

        onRouteSelected: {
            routeCollection.mainRoute = route;
            centerOnRoute(route);
        }// Chon 1 diem bat ki tren ban do

        Rectangle {
            color: Qt.rgba(1, 1, 1, 0.75)
            visible: navigation.active
            anchors.top: parent.top
            anchors.left: parent.left
            anchors.right: parent.right
            height: 64
            RowLayout {
                anchors.fill: parent
                anchors.margins: 10
                DynamicIconView {
                    Layout.fillHeight: true
                    Layout.maximumWidth: height
                    width: height
                    arrowInner: "darkblue"
                    arrowOuter: "gold"
                    slotInner: "grey"
                    slotOuter: arrowOuter

                    iconSource: navigation.currentInstruction.nextTurnDynamicIcon
                }
                Label {
                    Layout.fillWidth: true
                    font.pixelSize: 16

                    text: navigation.currentInstruction.nextStreetName + " (" + distance(navigation.currentInstruction.distanceToNextTurn) + ")";
                }
                DynamicIconView {
                    Layout.fillHeight: true
                    Layout.maximumWidth: height
                    width: height
                    arrowInner: "darkgrey"
                    arrowOuter: "black"
                    slotInner: "grey"
                    slotOuter: "darkgreen"

                    iconSource: navigation.currentInstruction.nextNextTurnDynamicIcon
                }
                Label {
                    font.pixelSize: 14
                    text: distance(navigation.currentInstruction.distanceToNextNextTurn)
                }
            }
        }
        Button {
            id: fullScreenButton
            text: isFullScreen ? "v" : "^"
            width: 50
            height: 50
            onClicked: {
                if(isFullScreen){
                    navigationView.height = 400
                    navigationView.y = 420
                    isFullScreen = false
                }
                else { /* false */
                    navigationView.height = 780
                    navigationView.y = 40
                    isFullScreen = true
                }
            }
        }
        Button {
            anchors.left: parent.left
            anchors.right: parent.right
            anchors.bottom: parent.bottom
            enabled: mapView.routeCollection.mainRoute.valid
            text: navigation.active ? "Stop simulation" : "Start simulation"
            onClicked: navigation.active = !navigation.active
        }// Nut chi duong
    }
}
