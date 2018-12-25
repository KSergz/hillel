<?php

class ConnectDb
{
    public static function get()
    {
        $dsn = 'mysql:host=localhost;dbname=my_test';
        $username = 'mysql';
        $password = 'mysql';
        $options = [];

        return new PDO($dsn, $username, $password, $options);
    }
}
