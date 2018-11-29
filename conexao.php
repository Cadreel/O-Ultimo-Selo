<?php

$CONNECTION_STRING = getenv("MYSQLCONNSTR_MINHACONEXAO");

if(!$CONNECTION_STRING){
    $CONNECTION_STRING = "Data Source=localhost;Database=forms;User Id=root;Password=";
}

function get_parameter($parameter_name, $connection_string){
    preg_match_all("/$parameter_name=(.*?)(;|$)/s", $connection_string, $matches);
    return $matches[1][0];
}

$DB_USER = get_parameter("User Id", $CONNECTION_STRING);
$DB_HOST = get_parameter("Data Source", $CONNECTION_STRING);
$DB_PASSWORD = get_parameter("Password", $CONNECTION_STRING);
$DB_DATABASE = get_parameter("Database", $CONNECTION_STRING);
?>