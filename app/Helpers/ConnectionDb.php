<?php

namespace App\Helpers;

use PDO;
use Exception;
use PDOException;

final class DbConnector
{
    private static ?DbConnector $instance = null;

    public static function getInstance(): DbConnector
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct(
        string $driver,
        string $host,
        string $dbname,
        string $user,
        string $password,
        string $charcode,
    )
    {
        try {

            self::$instance = new PDO("{$driver}:host={$host}; dbname={$dbname}; charset={$charcode}", $user, $password);
        
        } catch (PDOException $e) {
           
            echo $e->getMessage();
       
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

} 