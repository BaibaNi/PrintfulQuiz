<?php
namespace App;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class Database
{
    private static $connection = null;

    /**
     * @throws Exception
     */
    public static function connection()
    {
        if(self::$connection === null){
            $db = ConfigHelper::params('db');
            $connectionParams = [
                'dbname' => $db['db_name'],
                'user' => $db['db_user'],
                'password' => $db['db_password'],
                'host' => $db['db_host'],
                'driver' => $db['db_driver']
            ];
            self::$connection = DriverManager::getConnection($connectionParams);
        }
        return self::$connection;
    }
}