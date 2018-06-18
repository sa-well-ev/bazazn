<?php
/**
 * Тестовый вид для понятия работы с датой временем
 * User: Дмитрий
 * Date: 13.06.2018
 * Time: 14:25
 */

// TODO: Удалить этот вид впоследствии

use yii\helpers\Html;

setlocale(LC_ALL, 'ru_RU.UTF-8');
echo strftime("%B %Y года был %A");
echo '</br>';
echo date('N');
echo '</br>';
$date_o = new DateTime();
echo showV($date_o->getTimezone());
echo '</br>';
echo $date_o->format('d-F-Y H:i:s O');
echo '</br>';

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Europe/Moscow"));
echo '</br>';
echo showV($date->getTimezone());
echo $date->format('d-F-Y H:i:s O');
echo '</br>';
echo showV($date->getTimezone()->getLocation());
echo '</br>';
echo showV($date->getTimezone()->getName());
echo '</br>';
//echo showV($date->getTimezone()->getTransitions());
echo '</br>';

$date->setTimezone(new DateTimeZone("+0700"));
echo '</br>';
echo showV($date->getTimezone());
echo $date->format('d-F-Y H:i:s O');
echo '</br>';
echo showV($date->getTimezone()->getName());
echo '</br>';
echo showV($date->getTimezone()->getLocation());

$date->setTimezone(new DateTimeZone("Asia/Novosibirsk"));
echo '</br>';
echo showV($date->getTimezone());
echo $date->format('d-F-Y H:i:s O');
echo '</br>';
echo showV($date->getTimezone()->getName());
echo '</br>';
echo showV($date->getTimezone()->getLocation());

echo "Разница с Гринвичем - ";

echo $date->getOffset()/60/60 . "  часов";