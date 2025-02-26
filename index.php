<?php

declare(strict_types = 1);

function calcWorkingDays(int $numYear, int $numMonth): void
{

    $sumDaysMonth = cal_days_in_month(CAL_GREGORIAN, $numMonth, $numYear);
    $monthName = date("F", mktime(0, 0, 0, $numMonth, 1, $numYear));

    echo $monthName . PHP_EOL;

    $mondayWork = false;
    $nonWorkingDays = 2;

    for ($i = 1; $i <= $sumDaysMonth; $i++)
    {
        
        $wDaysWeek = date("w", mktime(0, 0, 0, $numMonth, $i, $numYear));
        $dmDaysWeek = date("d M", mktime(0, 0, 0, $numMonth, $i, $numYear));

        if (($wDaysWeek == 6 || $wDaysWeek == 0) && $nonWorkingDays == 2)
        {
            $mondayWork = true;
        }

       if ($wDaysWeek == 1 && $mondayWork)
        {
            echo $dmDaysWeek . "+". PHP_EOL;
            $mondayWork = false;
            $nonWorkingDays = 0;
           continue;
        }


        if (($wDaysWeek <> 6 && $wDaysWeek <> 0) && $nonWorkingDays == 2)
        {
            echo $dmDaysWeek . "+". PHP_EOL;
            $nonWorkingDays = 0;
        }else
        {
            echo $dmDaysWeek . PHP_EOL;
            $nonWorkingDays++;
        }
  
    }   

}


$result = calcWorkingDays(2025, 1);  