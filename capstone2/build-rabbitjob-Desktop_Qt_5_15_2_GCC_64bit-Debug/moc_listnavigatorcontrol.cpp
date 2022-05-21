/****************************************************************************
** Meta object code from reading C++ file 'listnavigatorcontrol.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.15.2)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include <memory>
#include "../rabbitjob/controller/listnavigatorcontrol.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'listnavigatorcontrol.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.15.2. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
QT_WARNING_PUSH
QT_WARNING_DISABLE_DEPRECATED
struct qt_meta_stringdata_ListNavigatorControl_t {
    QByteArrayData data[20];
    char stringdata0[341];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_ListNavigatorControl_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_ListNavigatorControl_t qt_meta_stringdata_ListNavigatorControl = {
    {
QT_MOC_LITERAL(0, 0, 20), // "ListNavigatorControl"
QT_MOC_LITERAL(1, 21, 16), // "totalRowsChanged"
QT_MOC_LITERAL(2, 38, 0), // ""
QT_MOC_LITERAL(3, 39, 16), // "totalListChanged"
QT_MOC_LITERAL(4, 56, 23), // "currentListIndexChanged"
QT_MOC_LITERAL(5, 80, 11), // "dataChanged"
QT_MOC_LITERAL(6, 92, 26), // "listNavigatorLengthChanged"
QT_MOC_LITERAL(7, 119, 25), // "onCurrentListIndexChanged"
QT_MOC_LITERAL(8, 145, 18), // "onTotalRowsChanged"
QT_MOC_LITERAL(9, 164, 10), // "_totalRows"
QT_MOC_LITERAL(10, 175, 17), // "onSkillFieldEmpty"
QT_MOC_LITERAL(11, 193, 14), // "onSkillChanged"
QT_MOC_LITERAL(12, 208, 14), // "moveToNextList"
QT_MOC_LITERAL(13, 223, 18), // "movoToPreviousList"
QT_MOC_LITERAL(14, 242, 9), // "totalRows"
QT_MOC_LITERAL(15, 252, 9), // "totalList"
QT_MOC_LITERAL(16, 262, 16), // "currentListIndex"
QT_MOC_LITERAL(17, 279, 16), // "limitRowsPerList"
QT_MOC_LITERAL(18, 296, 24), // "limitIndexesPerNavigator"
QT_MOC_LITERAL(19, 321, 19) // "listNavigatorLength"

    },
    "ListNavigatorControl\0totalRowsChanged\0"
    "\0totalListChanged\0currentListIndexChanged\0"
    "dataChanged\0listNavigatorLengthChanged\0"
    "onCurrentListIndexChanged\0onTotalRowsChanged\0"
    "_totalRows\0onSkillFieldEmpty\0"
    "onSkillChanged\0moveToNextList\0"
    "movoToPreviousList\0totalRows\0totalList\0"
    "currentListIndex\0limitRowsPerList\0"
    "limitIndexesPerNavigator\0listNavigatorLength"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_ListNavigatorControl[] = {

 // content:
       8,       // revision
       0,       // classname
       0,    0, // classinfo
      11,   14, // methods
       6,   82, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       5,       // signalCount

 // signals: name, argc, parameters, tag, flags
       1,    0,   69,    2, 0x06 /* Public */,
       3,    0,   70,    2, 0x06 /* Public */,
       4,    0,   71,    2, 0x06 /* Public */,
       5,    0,   72,    2, 0x06 /* Public */,
       6,    0,   73,    2, 0x06 /* Public */,

 // slots: name, argc, parameters, tag, flags
       7,    0,   74,    2, 0x0a /* Public */,
       8,    1,   75,    2, 0x0a /* Public */,
      10,    0,   78,    2, 0x0a /* Public */,
      11,    0,   79,    2, 0x0a /* Public */,

 // methods: name, argc, parameters, tag, flags
      12,    0,   80,    2, 0x02 /* Public */,
      13,    0,   81,    2, 0x02 /* Public */,

 // signals: parameters
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,

 // slots: parameters
    QMetaType::Void,
    QMetaType::Void, QMetaType::Int,    9,
    QMetaType::Void,
    QMetaType::Void,

 // methods: parameters
    QMetaType::Void,
    QMetaType::Void,

 // properties: name, type, flags
      14, QMetaType::Int, 0x00495103,
      15, QMetaType::Int, 0x00495103,
      16, QMetaType::Int, 0x00495103,
      17, QMetaType::Int, 0x00095401,
      18, QMetaType::Int, 0x00095401,
      19, QMetaType::Int, 0x00495001,

 // properties: notify_signal_id
       0,
       1,
       2,
       0,
       0,
       4,

       0        // eod
};

void ListNavigatorControl::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        auto *_t = static_cast<ListNavigatorControl *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->totalRowsChanged(); break;
        case 1: _t->totalListChanged(); break;
        case 2: _t->currentListIndexChanged(); break;
        case 3: _t->dataChanged(); break;
        case 4: _t->listNavigatorLengthChanged(); break;
        case 5: _t->onCurrentListIndexChanged(); break;
        case 6: _t->onTotalRowsChanged((*reinterpret_cast< int(*)>(_a[1]))); break;
        case 7: _t->onSkillFieldEmpty(); break;
        case 8: _t->onSkillChanged(); break;
        case 9: _t->moveToNextList(); break;
        case 10: _t->movoToPreviousList(); break;
        default: ;
        }
    } else if (_c == QMetaObject::IndexOfMethod) {
        int *result = reinterpret_cast<int *>(_a[0]);
        {
            using _t = void (ListNavigatorControl::*)();
            if (*reinterpret_cast<_t *>(_a[1]) == static_cast<_t>(&ListNavigatorControl::totalRowsChanged)) {
                *result = 0;
                return;
            }
        }
        {
            using _t = void (ListNavigatorControl::*)();
            if (*reinterpret_cast<_t *>(_a[1]) == static_cast<_t>(&ListNavigatorControl::totalListChanged)) {
                *result = 1;
                return;
            }
        }
        {
            using _t = void (ListNavigatorControl::*)();
            if (*reinterpret_cast<_t *>(_a[1]) == static_cast<_t>(&ListNavigatorControl::currentListIndexChanged)) {
                *result = 2;
                return;
            }
        }
        {
            using _t = void (ListNavigatorControl::*)();
            if (*reinterpret_cast<_t *>(_a[1]) == static_cast<_t>(&ListNavigatorControl::dataChanged)) {
                *result = 3;
                return;
            }
        }
        {
            using _t = void (ListNavigatorControl::*)();
            if (*reinterpret_cast<_t *>(_a[1]) == static_cast<_t>(&ListNavigatorControl::listNavigatorLengthChanged)) {
                *result = 4;
                return;
            }
        }
    }
#ifndef QT_NO_PROPERTIES
    else if (_c == QMetaObject::ReadProperty) {
        auto *_t = static_cast<ListNavigatorControl *>(_o);
        Q_UNUSED(_t)
        void *_v = _a[0];
        switch (_id) {
        case 0: *reinterpret_cast< int*>(_v) = _t->totalRows(); break;
        case 1: *reinterpret_cast< int*>(_v) = _t->totalList(); break;
        case 2: *reinterpret_cast< int*>(_v) = _t->currentListIndex(); break;
        case 3: *reinterpret_cast< int*>(_v) = _t->limitRowsPerList(); break;
        case 4: *reinterpret_cast< int*>(_v) = _t->limitIndexesPerNavigator(); break;
        case 5: *reinterpret_cast< int*>(_v) = _t->listNavigatorLength(); break;
        default: break;
        }
    } else if (_c == QMetaObject::WriteProperty) {
        auto *_t = static_cast<ListNavigatorControl *>(_o);
        Q_UNUSED(_t)
        void *_v = _a[0];
        switch (_id) {
        case 0: _t->setTotalRows(*reinterpret_cast< int*>(_v)); break;
        case 1: _t->setTotalList(*reinterpret_cast< int*>(_v)); break;
        case 2: _t->setCurrentListIndex(*reinterpret_cast< int*>(_v)); break;
        default: break;
        }
    } else if (_c == QMetaObject::ResetProperty) {
    }
#endif // QT_NO_PROPERTIES
}

QT_INIT_METAOBJECT const QMetaObject ListNavigatorControl::staticMetaObject = { {
    QMetaObject::SuperData::link<QAbstractListModel::staticMetaObject>(),
    qt_meta_stringdata_ListNavigatorControl.data,
    qt_meta_data_ListNavigatorControl,
    qt_static_metacall,
    nullptr,
    nullptr
} };


const QMetaObject *ListNavigatorControl::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *ListNavigatorControl::qt_metacast(const char *_clname)
{
    if (!_clname) return nullptr;
    if (!strcmp(_clname, qt_meta_stringdata_ListNavigatorControl.stringdata0))
        return static_cast<void*>(this);
    return QAbstractListModel::qt_metacast(_clname);
}

int ListNavigatorControl::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QAbstractListModel::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 11)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 11;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 11)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 11;
    }
#ifndef QT_NO_PROPERTIES
    else if (_c == QMetaObject::ReadProperty || _c == QMetaObject::WriteProperty
            || _c == QMetaObject::ResetProperty || _c == QMetaObject::RegisterPropertyMetaType) {
        qt_static_metacall(this, _c, _id, _a);
        _id -= 6;
    } else if (_c == QMetaObject::QueryPropertyDesignable) {
        _id -= 6;
    } else if (_c == QMetaObject::QueryPropertyScriptable) {
        _id -= 6;
    } else if (_c == QMetaObject::QueryPropertyStored) {
        _id -= 6;
    } else if (_c == QMetaObject::QueryPropertyEditable) {
        _id -= 6;
    } else if (_c == QMetaObject::QueryPropertyUser) {
        _id -= 6;
    }
#endif // QT_NO_PROPERTIES
    return _id;
}

// SIGNAL 0
void ListNavigatorControl::totalRowsChanged()
{
    QMetaObject::activate(this, &staticMetaObject, 0, nullptr);
}

// SIGNAL 1
void ListNavigatorControl::totalListChanged()
{
    QMetaObject::activate(this, &staticMetaObject, 1, nullptr);
}

// SIGNAL 2
void ListNavigatorControl::currentListIndexChanged()
{
    QMetaObject::activate(this, &staticMetaObject, 2, nullptr);
}

// SIGNAL 3
void ListNavigatorControl::dataChanged()
{
    QMetaObject::activate(this, &staticMetaObject, 3, nullptr);
}

// SIGNAL 4
void ListNavigatorControl::listNavigatorLengthChanged()
{
    QMetaObject::activate(this, &staticMetaObject, 4, nullptr);
}
QT_WARNING_POP
QT_END_MOC_NAMESPACE
