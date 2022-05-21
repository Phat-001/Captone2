#ifndef CURRENTLOCATION_H
#define CURRENTLOCATION_H

#include <QObject>
#include <QGeoPositionInfoSource>
#include <QGeoPositionInfo>
#include <QDebug>
#include <QTimer>

class CurrentLocation : public QObject
{
    Q_OBJECT
    Q_PROPERTY(double latitude READ latitude WRITE setLatitude NOTIFY latitudeChanged)
    Q_PROPERTY(double longitude READ longitude WRITE setLongitude NOTIFY longitudeChanged)
public:
    explicit CurrentLocation(QObject *parent = nullptr);
    void show() const;

    double latitude();
    void setLatitude(double);
    double longitude();
    void setLongitude(double);

signals:
    void latitudeChanged();
    void longitudeChanged();

public slots:
    void positionUpdated(const QGeoPositionInfo&);

private:
    QGeoPositionInfoSource *m_gps;
    QTimer m_updateTimer;
    double m_latitude;
    double m_longitude;
}; /* API này hoạt động không chính xác trên laptop và máy tính để bàn do các thiết bị này
    thường không có gps, chỉ có thể nhận diện vị trí hiện tại dựa trên wifi, nếu run on smartphone
    thì không cần wifi cũng có thể xác định vị trí hiện tại của thiết bị
    */
#endif // CURRENTLOCATION_H

// https://forum.qt.io/topic/66754/how-can-i-get-my-address-location-with-qt/9
