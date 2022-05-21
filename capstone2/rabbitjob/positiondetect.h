#ifndef POSITIONDETECT_H
#define POSITIONDETECT_H

#include <QObject>
#include <QGeoPositionInfoSource>
#include <QDebug>

class PositionDetect : public QObject
{
    Q_OBJECT
    Q_PROPERTY(double longitude READ longitude WRITE setLongitude NOTIFY longitudeChanged)
    Q_PROPERTY(double latitude READ latitude WRITE setLatitude NOTIFY latitudeChanged)
public:
    explicit PositionDetect(QObject *parent = nullptr);

    void setLongitude(float _longitude);
    void setLatitude(float _latitude);

    float longitude() const;
    float latitude() const;

signals:
    void coordinateChanged();
    void longitudeChanged();
    void latitudeChanged();

public slots:
    void positionUpdated(const QGeoPositionInfo &info);

private:
    double m_currentLongitude = 108.2381276;
    double m_currentLatitude = 16.0602563;
};

#endif // POSITIONDETECT_H
