#include "currentlocation.h"

CurrentLocation::CurrentLocation(QObject *parent) : QObject(parent)
{
    m_gps = QGeoPositionInfoSource::createDefaultSource(this);
    connect(m_gps, SIGNAL(positionUpdated(QGeoPositionInfo)), this, SLOT(positionUpdated(QGeoPositionInfo)));
    if (m_gps) {
        m_gps->startUpdates();
    }
}

void CurrentLocation::show() const
{
    qDebug() << "[currentlocation.cpp<12>] [void show()] [Longitude: " << m_longitude << ", Latitude: " << m_latitude << "]";
}

double CurrentLocation::latitude()
{
    return m_latitude;
}

void CurrentLocation::setLatitude(double latitude)
{
    m_latitude = latitude;
    emit latitudeChanged();
}

double CurrentLocation::longitude()
{
    return m_longitude;
}

void CurrentLocation::setLongitude(double longitude)
{
    m_longitude = longitude;
    emit longitudeChanged();
}

void CurrentLocation::positionUpdated(const QGeoPositionInfo &info)
{
    m_latitude = info.coordinate().latitude();
    m_longitude = info.coordinate().longitude();
    show();
    m_gps->requestUpdate();
}
