import QtQuick 2.12
import QtQuick.Window 2.12
import GeneralMagic 2.0

Window
{
  visible: true
  width: 640
  height: 480
  title: qsTr("Map")
  Component.onCompleted:
  {
    //! [Set API Key token safely]
    ServicesManager.settings.token = __my_secret_token;
    //! [Set API Key token safely]

    ServicesManager.logLevel = ServicesManager.Error;
    ServicesManager.settings.allowInternetConnection = true;

    var updater = ServicesManager.contentUpdater(ContentItem.Type.RoadMap);
    updater.autoApplyWhenReady = true;
    updater.update();
  }
  MapView
  {
    anchors.fill: parent
    viewAngle: 25
    zoomLevel: 69
    //preferences.viewPerspective: MapViewPreferences.ViewPerspective.View3D
    //preferences.show3DBuildings: true
  }
}
