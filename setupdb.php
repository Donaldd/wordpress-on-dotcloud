#!/usr/bin/env php
<?PHP

if(file_exists("/home/dotcloud/environment.json")) {
    $env =  json_decode(file_get_contents("/home/dotcloud/environment.json"));
    $user = $env->DOTCLOUD_DB_MYSQL_LOGIN;
    $password = $env->DOTCLOUD_DB_MYSQL_PASSWORD; 
    $host = $env->DOTCLOUD_DB_MYSQL_HOST;
    $port = $env->DOTCLOUD_DB_MYSQL_PORT;
    $dbname = 'wordpress';
    
    $dsn = "mysql:host=$host;port=$port";
}
else {
    /* your local configuration */
    $dsn = 'mysql:dbname=test;host=127.0.0.1;';
    $user = 'root';
    $password = 'root';
    $dbname = 'wordpress';
}

echo "Connection to the database..";
$tries = 0;
connection:
try {
    echo ".";
    flush();
    $dbh = new PDO("mysql:host=$host;port=$port", $user, $password);
    echo "\n";
    echo "Create DB '$dbname' if needed\n";
    $dbh->exec("CREATE DATABASE IF NOT EXISTS `$dbname` COLLATE=utf8_general_ci") or die(print_r($dbh->errorInfo(), true));
} catch (Exception $e) {
    sleep(1);
    if(++$tries <= 60)
        goto connection;
    else{
        echo "\n";
        die ("Could not connect to the database server\n");
    }        
}