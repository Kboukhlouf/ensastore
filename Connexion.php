<?php

/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 24/03/2016
 * Time: 20:02
 */

class Connexion extends PDO
{
    public function __construct($file = 'param.ini'){
        if(!$settings = parse_ini_file($file,TRUE))
            throw new Exception('Impossible d\'ouvrir ' . $file . '.');
        $dns = $settings['database']['driver'].':host='.
                $settings['database']['host']. ';port=' . $settings['database']['port'].
                ';dbname='. $settings['database']['schema'];
        //$dns = 'mysql:host=localhost;port=3306;dbname=gestionnotes;'
        parent::__construct($dns,$settings['database']['username'],$settings['database']['password']);
    }
}