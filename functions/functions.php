<?php
/**
 * Набор функций для удобства использования в отладке кода и не только
 * По идее можно сделать класс с пространстовом имён и задать эти методы как статические
 * но используя директиву require в главном файле можно их использовать везде без
 * подключения как класса по use
 */

function getRusDateStr($date)
{
    $rusMonths = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
    return date_format($date,'j ' . $rusMonths[date_format($date, 'n')] . ' Y года');
}

/**
 * Функция для распечатки переменных
 * @param object $arr Входящий объёкт для распечатки
 * @return string отформатированную распечатку переменной
 */

function showVar($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function shwV($obj)
{
    echo '<pre>' . htmlspecialchars(getVarString($obj)) . '</pre>';
}

function getVarString(&$obj, $leftSp = "")
{
    if (is_array($obj)){
        $type = "Array[" . count($obj)."]";
    } elseif (is_object($obj)) {
        $type = "Object";
    } elseif (gettype($obj) == 'boolean'){
        return $obj ? 'true' : 'false';
    } else {
        return '\"$obj\"';
    }
    $buf = $type;
    $leftSp .= '  ';
    foreach ($obj as $k => $v){
        if ($k === "GLOBALS") continue;
        $buf .= "\n$leftSp$k => " . getVarString($v, $leftSp);
    }
    return $buf;
}