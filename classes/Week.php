<?php

class Week extends Database
{

    public static function readBySemaine($semaine)
    {
        $staffEmail = self::query("SELECT * FROM week WHERE week_semaine LIKE '%$semaine%'");
        return $staffEmail->fetchAll();
    }
}
