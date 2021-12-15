<?php
namespace index;
use Controller;
session_start();

require_once'Autoload/Autoloader.php';
\Autoload\Autoloader::register();

if(isset($_GET['p']))
{
    $content= controller\UserList::testPost(); //TEST BDD USER
    $content2=controller\UserList::testComment();
    $content3=controller\UserList::WatchUserList();
    //$content= $content.$content2.$content3;
    //require('indexView.php');
    var_dump($content);
}
else
{
    require('indexView.php');
    require('view/home.php');
    require('view/contact.php');
}
