<?php
function secondsToTime($s,$time){
    $s = $time-$s;

    if ($s >= strtotime('1 year')-$time)
    {
        $d = floor($s / (strtotime('1 year')-$time));
        return  $d . ' Year'.(($d > 1)?'s':'').' Ago';
    }
    elseif ($s >= strtotime('1 month')-$time && $s < strtotime('1 year')-$time){
        $d = floor($s / (strtotime('1 month')-$time));
        return  $d . ' Month'.(($d > 1)?'s':'').' Ago';
    }
    elseif ($s >= strtotime('1 day')-$time && $s < strtotime('1 month')-$time)
    {
        $d = floor($s / (strtotime('1 day')-$time));
        return  $d . ' Day'.(($d > 1)?'s':'').' Ago';
    }
    elseif ($s >= strtotime('1 hour')-$time && $s < strtotime('1 day')-$time)
    {
        $d = floor($s / (strtotime('1 hour')-$time));
        return  $d . ' Hour'.(($d > 1)?'s':'').' Ago';
    }
    elseif ($s >= strtotime('1 minute')-$time && $s < strtotime('1 hour')-$time)
    {
        $d = floor($s / (strtotime('1 minute')-$time));
        return  $d . ' Minute'.(($d > 1)?'s':'').' Ago';
    }elseif ($s >= strtotime('1 second')-$time && $s < strtotime('1 minute')-$time)
    {
        $d = floor($s / (strtotime('1 second')-$time));
        return  $d . ' Second'.(($d > 1)?'s':'').' Ago';
    }
    else{
        return 'Just Now';
    }
}