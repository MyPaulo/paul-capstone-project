<?php 

session_start();
include("includes/conn.php");
include("functions/functions.php");

switch($_REQUEST['sAction']){

    default :

    getProducts();

    break;

    case'getPaginator';

    getPaginator();

    break;

}

?> 