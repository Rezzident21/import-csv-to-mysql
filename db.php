<?php


class DataBase
{

    const USER = "root";
    const PASSWORD = '';
    const HOST = "localhost";
    const DB = "task";

    public static function connectDB()
    {
        $user = self::USER;
        $password = self::PASSWORD;
        $host = self::HOST;
        $DB = self::DB;

        $connect = new PDO("mysql:dbname=$DB;host=$host", $user, $password);
        return $connect;
    }
}
