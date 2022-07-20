<?php
require_once("include/function.php");
$path = getcwd();

if($_SESSION['role'] == 'admin'){
        if(isset($_GET['view'])){
        $page = strtolower($_GET['view']);
        @view($page);
    } elseif(isset($_GET['edit'])) {
        $pages = strtolower($_GET['edit']);
        if(!isset($_GET['id'])){
            include($path.'/view/home.php');
        }
        $id = $_GET['id'];
        @view_edit($pages, $id);
    } elseif(isset($_GET['create'])) {
        $pages = strtolower($_GET['create']);
        @view_create($pages);
    } elseif(isset($_GET['logout'])){
        include($path.'logout.php');
    } else {
        include($path.'/view/home.php');
    }
}elseif($_SESSION['role'] == 'owner'){
    if(isset($_GET['view'])){
        $page = strtolower($_GET['view']);
        @view_owner($page);
    }elseif(isset($_GET['logout'])){
        include($path.'logout.php');
    } else {
        include($path.'/view/home.php');
    }
}

