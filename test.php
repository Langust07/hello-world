<?php
    $str = 'Давайте устроим встречу 20.05.2022 и потом ещё одну 12.06.2022';

    preg_match_all('/[0-3][0-9].[0-1][0-9].20[0-9][0-9]/i', $str, $dates);//Вычленяем даты из строки
    $week = ['(вс)', '(пн)', '(вт)', '(ср)','(чт)', '(пт)', '(сб)'];//Массив дней недели
    foreach ($dates[0] as $key => $date){//Перебираем наши даты
        $date_part = explode(".",$date);//Разбиваем дату на части
        $day = $week[date('w', mktime(0, 0, 0, $date_part[1], $date_part[0], $date_part[2]))]; //Узнаем день недели
        $days[] = $dates[0][$key].' '.$day; // Прибавляем день недели к дате
    }
    $str = str_replace($dates[0],$days,$str); //Обновляем строку с новыми данными
    echo $str;