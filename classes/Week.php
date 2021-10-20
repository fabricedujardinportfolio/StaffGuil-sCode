<?php

class Week extends Database
{

    public static function readBySemaine($semaine)
    {
        $staffEmail = self::query("SELECT * FROM week WHERE week_semaine LIKE '%$semaine%'");
        return $staffEmail->fetchAll();
    }
    public static function add($week_semaine, $week_monday_morning, $week_tuesday_morning, $week_wednesday_morning, $week_thursday_morning, $week_friday_morning, $week_saturday_morning, $week_sunday_morning, $week_monday_afternoon, $week_tuesday_afternoon, $week_wednesday_afternoon, $week_thursday_afternoon, $week_friday_afternoon, $week_saturday_afternoon, $week_sunday_afternoon, $staff_id)
    {
        return self::query("INSERT INTO week (week_semaine, week_monday_morning, week_tuesday_morning, week_wednesday_morning, week_thursday_morning, week_friday_morning, week_saturday_morning, week_sunday_morning, week_monday_afternoon, week_tuesday_afternoon, week_wednesday_afternoon, week_thursday_afternoon, week_friday_afternoon, week_saturday_afternoon, week_sunday_afternoon, staff_id)
         VALUES ('$week_semaine','$week_monday_morning','$week_tuesday_morning','$week_wednesday_morning','$week_thursday_morning','$week_friday_morning','$week_saturday_morning','$week_sunday_morning','$week_monday_afternoon','$week_tuesday_afternoon','$week_wednesday_afternoon','$week_thursday_afternoon','$week_friday_afternoon','$week_saturday_afternoon','$week_sunday_afternoon','$staff_id')");
    }
}
