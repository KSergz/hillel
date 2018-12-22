<?php

class ConnectDb
{
    public static function get()
    {
        $dsn = 'mysql:host=localhost;dbname=my_test';
        $username = 'root';
        $password = '';
        $options = [];


        return new PDO($dsn, $username, $password, $options);
    }
}
