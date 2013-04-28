<?php
include('lib/forecast.io.php');

$api_key = '<your_api_key>';

$latitude = '52.4308';
$longitude = '13.2588';


$forecast = new ForecastIO($api_key);


/*
 * GET CURRENT CONDITIONS
 */
$condition = $forecast->getCurrentConditions($latitude, $longitude);

echo $condition->getTemperature();


/*
 * GET HOURLY CONDITIONS FOR TODAY
 */
$conditions_today = $forecast->getForecastToday($latitude, $longitude);

foreach($conditions_today as $cond) {
  
  echo $cond->getTime('H:i:s') . ': ' . $cond->getTemperature();
  
}

/*
 * GET DAILY CONDITIONS FOR NEXT 7 DAYS
 */
$conditions_week = $forecast->getForecastWeek($latitude, $longitude);

foreach($conditions_week as $conditions) {
  
  echo $conditions->getTime('Y.m.d') . ': ' . $conditions->getMaxTemperature();
  
}

/*
 * GET HISTORICAL CONDITIONS
 */
$condition = $forecast->getHistoricalConditions($latitude, $longitude, strtotime('2010-10-10T14:00:00-0700'));
// strtotime('2010-10-10T14:00:00-0700') gives timestamp for Pacfic Time... DST shouldn't matter since should be same day

echo $condition->getMaxTemperature();

?>
