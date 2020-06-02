<?php


namespace Nexo\Services;


use Carbon\Carbon;

class Assignment
{
    public static function calculateRecurrence($attributes)
    {
        $attributes['recurrence_dates'] = [];

        $recurrenceFrequency = $attributes['recurrence_frequency'];
        $recurrenceInterval = $attributes['recurrence_interval'];
        $recurrenceIntervalAsignator = 'D';
        $recurrenceStart = $attributes['recurrence_start'];
        $recurrenceEnd = $attributes['recurrence_end'];
        $recurrenceDates = collect([]);

        $withWeekdays = false;
        $withWorkDays = false;
        $withMonthday = false;


        switch ($recurrenceFrequency) {
            case 'weekly':
                $recurrenceIntervalAsignator = 'W';
                $withWeekdays = true;

                $daysOfWeek = [
                    0 => 'Sunday',
                    1 => 'Monday',
                    2 => 'Tuesday',
                    3 => 'Wednesday',
                    4 => 'Thursday',
                    5 => 'Friday',
                    6 => 'Saturday',
                ];

                break;

            case 'work_days':
                $workDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $recurrenceInterval = 1;
                $withWorkDays = true;
                break;

            case 'monthly':
                $recurrenceIntervalAsignator = 'M';
                $withMonthday = true;
                break;
        }


        $begin = new \DateTime($recurrenceStart);
        $end = new \DateTime($recurrenceEnd);
        $end->modify('+1 day');

        $interval = new \DateInterval("P{$recurrenceInterval}{$recurrenceIntervalAsignator}");
        $daterange = new \DatePeriod($begin, $interval, $end);

        $currentDay = '';

        foreach ($daterange as $date) {


            $currentDay = $date;

            if($currentDay->format('Y-m-d') <= $recurrenceEnd){
                if ($withWeekdays) {
                    $recurrenceWeekdays = $attributes['recurrence_weekdays'];

                    foreach ($recurrenceWeekdays as $recurrenceWeekday) {
                        $dateCloned = clone $date;
                        $recurrenceDates->push($dateCloned->modify("next {$daysOfWeek[$recurrenceWeekday]}"));
                    }

                } elseif ($withWorkDays) {

                                    // Si el día actual es día laboral lo agregamos
                    if (in_array($date->format('l'), $workDays)) {
                        $recurrenceDates->push($date);
                    }

                } elseif ($withMonthday) {

                    $dateCloned = Carbon::instance($date);

                    $recurrenceMonthday = $attributes['recurrence_monthday'];

                    $dateCloned->day = $recurrenceMonthday;

                    $recurrenceDates->push($dateCloned);

                } else {
                    $recurrenceDates->push($date);
                }
            }

            
        }



        if ($recurrenceDates) {
            $recurrenceDates = $recurrenceDates->map(function ($date) use ($attributes) {
                $dateCloned = clone $date;
                $dateCloned->modify("+{$attributes['duration']} minutes");
                return [
                    'start' => $date->format('Y-m-d H:i:s'),
                    'end' => $dateCloned->format('Y-m-d H:i:s')
                ];
            });
        }
        
        return $recurrenceDates->toArray();
    }
}