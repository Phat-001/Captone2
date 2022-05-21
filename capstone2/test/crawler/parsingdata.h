#ifndef PARSINGDATA_H
#define PARSINGDATA_H

#include <QObject>
#include <QList>
#include "htmldatastruct.h"
#include "fetchhtml.h"

class ParsingData
{
public:
    ParsingData();

private:
    QList<HTMLDataStruct> m_list;
    //FetchHTML fetcher;
};

#endif // PARSINGDATA_H
