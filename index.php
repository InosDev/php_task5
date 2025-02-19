<?php

declare(strict_types = 1);

function calcWorkingDays(int $numYear, int $numMonth): void
{

    $sumDaysMonth = cal_days_in_month(CAL_GREGORIAN, $numMonth, $numYear);

    $monthName = date("F", mktime(0, 0, 0, $numMonth, 1, $numYear));

    echo $monthName . PHP_EOL;

    $mondayWork = false;

    for ($i = 1; $i <= $sumDaysMonth; $i++)
    {
        
        $wDaysWeek = date("w", mktime(0, 0, 0, $numMonth, $i, $numYear));
        $dmDaysWeek = date("d M", mktime(0, 0, 0, $numMonth, $i, $numYear));

        $isWorkDay = isWorkDay($i);

        if (($wDaysWeek == 6 && $wDaysWeek == 0) && $isWorkDay)
        {
            $mondayWork = true;
        }else
        {
            $mondayWork = false;   
        }

       if ($wDaysWeek == 1 && $mondayWork)
        {
            echo $dmDaysWeek . "+". PHP_EOL;
           continue;
        }


        if ($isWorkDay && ($wDaysWeek <> 6 && $wDaysWeek <> 0))
        {
            echo $dmDaysWeek . "+". PHP_EOL;     
        }else
        {
            echo $dmDaysWeek . PHP_EOL;    
        }
  
    }   

}

function isWorkDay(int $numDay): bool 
{
    return ($numDay % 4) < 2;
};



$result = calcWorkingDays(2025, 1);  


