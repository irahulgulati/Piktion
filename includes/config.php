<?php
defined("SERVER")? NULL:define("SERVER","localhost");
defined("USER")?NULL: define("USER","root");
defined("PASSWORD")?NULL: define("PASSWORD","root");
defined("DATABASE")?NULL: define("DATABASE","piktion1");
session_start();

$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);


?>