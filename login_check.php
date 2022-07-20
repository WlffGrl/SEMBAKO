<?php
session_start();
require_once("include/dbclass.php");
if(isset($_POST['username']) && isset($_POST['password'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        header("location: login.php?error=1");
        die();
    }
    $get = new DBClass();
    $get->select('*');
    $get->from('account');
    $get->where([['username','=',$_POST['username']],['password','=',md5($_POST['password'])]]);
    if($get->get()){
        $result = array($get->get())[0][0];
        $_SESSION['role'] = $result['role'];
        $_SESSION['logged'] = md5($result['username'].$result['password']); 
        header('location: home.php');
    } else {
        header('location: login.php?error=2');
        die();
    }

}