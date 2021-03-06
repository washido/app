<?php

Class Mongodbclass {

    const dbUser = MONGODB_USER;
    const dbPass = MONGODB_PASS;
    const dbName = MONGODB_DB;
    const dbHost = MONGODB_HOST;
    const dbPort = MONGODB_PORT;

    private static $instance;
    private static $db;
  
    public static function conn($col = 'users')
    {
        // $m   = new MongoClient("mongodb://" . self::dbUser . ":" . self::dbPass . "@" . self::dbHost . ":" . self::dbPort);
        $m   = new MongoClient();
        $db  = $m->selectDB(self::dbName);
        $col = new MongoCollection($db, $col);

        return $col;
    }

}