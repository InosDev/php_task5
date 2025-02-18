<?php

declare(strict_types = 1);

function calcWorkingDays(int $numYear, int $numMonth): void
{

    //$sumDaysMonth = date('t');
    $sumDaysMonth = cal_days_in_month(CAL_GREGORIAN, $numMonth, $numYear);

    $nDays = 1;

    for ($i = 1; $i <= $sumDaysMonth; $i++)
    {
        
        if ($nDays != 6 && $nDays != 7)
        {

            echo $i . " +" . PHP_EOL;    

        } else
        {
            echo $i  . PHP_EOL;     
        }

        if ($nDays == 7)
        {
            $nDays = 1;

        }else
        {
            $nDays++;    
        }
  
    }   

}

$result = calcWorkingDays(2025, 1);  


