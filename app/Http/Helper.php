<?php

    function formatDate($date, $format = 'd/m/Y')
    {
        if($date == '' || $date == null)
            return;
    
        return date($format, strtotime($date));
    }

    function formatDateTime($date, $format = 'd/m/Y h:m:s')
    {
        if($date == '' || $date == null)
            return;
    
        return date($format, strtotime($date));
    }

    function formatNumber($number, $format = 0)
    {
        if($number == '' || $number == null)
            return;
    
        return number_format($number, $format);
    }

    function formatMoney($number, $format = 0)
    {
        if($number == '' || $number == null) {
            return $number;
        }
        else {
//            $jpy = "¥" . number_format($number, 0, ".", ",");
                $money = number_format($number, 0).' VND';
        }
    
        return $money;
    }