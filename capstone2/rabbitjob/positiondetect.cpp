#include "positiondetect.h"

PositionDetect::PositionDetect(QObject *parent)
    : QObject{parent}
{
    QGeoPositionInfoSource *source = QGeoPositionInfoSource::createDefaultSource(this);
    if (source) {
        connect(source, SIGNAL(positionUpdated(QGeoPositionInfo)),
                this, SLOT(positionUpdated(QGeoPositionInfo)));
        source->startUpdates();
    }
}

void PositionDetect::setLongitude(float _longitude)
{
    m_currentLongitude = _longitude;
    emit longitudeChanged();
}

void PositionDetect::setLatitude(float _latitude)
{
    m_currentLatitude = _latitude;
    emit latitudeChanged();
}

float PositionDetect::longitude() const
{
    return m_currentLongitude;
}

float PositionDetect::latitude() const
{
    return m_currentLatitude;
}

void PositionDetect::positionUpdated(const QGeoPositionInfo &info)
{
    m_currentLongitude = info.coordinate().longitude();
    m_currentLatitude = info.coordinate().latitude();
    qDebug() << "[PositionDetect::positionUpdated(const QGeoPositionInfo &info)][m_currentLongitude = " << m_currentLongitude <<
                "][m_currentLatitude = " << m_currentLatitude << "]";
    emit coordinateChanged();
}
