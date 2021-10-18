<?php

class Planning extends Database
{

    public static function all()
    {
        $staffs = self::query("SELECT * FROM week");
        return $staffs->fetchAll();
    }
}
