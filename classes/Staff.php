<?php

class Staff extends Database
{

    public static function all()
    {
        $staffs = self::query("SELECT * FROM staff");
        return $staffs->fetchAll();
    }
    public static function read($id)
    {
        $staff = self::query("SELECT * FROM staff WHERE staff_id=$id");
        return $staff->fetch();
    }
    public static function readByEmail($email)
    {
        $staffEmail = self::query("SELECT * FROM staff WHERE staff.staff_email='$email'");
        return $staffEmail->fetch();
    } 
    //add
    public static function add($staff_name, $staff_firstName, $staff_email, $staff_password, $staff_phone)
    {
        return self::query("INSERT INTO staff (staff_name,staff_firstName,staff_email,staff_password,staff_phone) VALUES ('$staff_name','$staff_firstName','$staff_email','$staff_password','$staff_phone')");
    }
}
