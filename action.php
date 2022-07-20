<?php
$path = getcwd();
require_once($path."/model/data_barang.php");
require_once($path."/model/data_gudang.php");
require_once($path."/model/data_pemasukan.php");
require_once($path."/model/data_penjualan.php");
require_once($path."/model/laporan_transaksi.php");
require_once($path.'/include/function.php');
if(isset($_GET['create'])){
    $pages = strtolower($_GET['create']);
    if($pages == 'barang'){
        if(DataBarang::store(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']))){
                header('location:home.php?view=barang');
        } else {
                header('location:home.php?create=barang');
        }
    } elseif($pages == 'pemasukan'){
        if(DataPemasukan::store(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']))){
                header('location:home.php?view=pemasukan');
        } else {
                header('location:home.php?create=pemasukan');
        }
    } elseif($pages == 'penjualan'){
        if(DataPenjualan::store(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']))){
                header('location:home.php?view=penjualan');
        } else {
                header('location:home.php?create=penjualan');
        }
    } elseif($pages == 'gudang'){
        if(DataGudang::store(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']))){
                header('location:home.php?view=gudang');
        } else {
                header('location:home.php?create=gudang');
        }
    } elseif($pages == 'laporan'){
        if(LaporanTransaksi::store(
                          clear($_POST['judul']),
                          $_POST['tanggal'],
                          clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_harga']))){
                header('location:home.php?view=laporan');
        } else {
                header('location:home.php?create=laporan');
        }
    }
}

if(isset($_GET['delete'])){
    $pages = strtolower($_GET['delete']);
    if($pages == 'barang'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=barang');
        }
        if(DataBarang::delete($_GET['id'])){
            header('location:home.php?view=barang');
        } else {
            header('location:home.php?view=barang');
        }
    } elseif($pages == 'pemasukan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=pemasukan');
        }
        if(DataPemasukan::delete($_GET['id'])){
            header('location:home.php?view=pemasukan');
        } else {
            header('location:home.php?view=pemasukan');
        }
    } elseif($pages == 'penjualan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=penjualan');
        }
        if(DataPenjualan::delete($_GET['id'])){
            header('location:home.php?view=penjualan');
        } else {
            header('location:home.php?view=penjualan');
        }
    } elseif($pages == 'gudang'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=gudang');
        }
        if(DataGudang::delete($_GET['id'])){
            header('location:home.php?view=gudang');
        } else {
            header('location:home.php?view=gudang');
        }
    } elseif($pages == 'laporan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=laporan');
        }
        if(LaporanTransaksi::delete($_GET['id'])){
            header('location:home.php?view=laporan');
        } else {
            header('location:home.php?view=laporan');
        }
    }
}

if(isset($_GET['update'])){
    $pages = strtolower($_GET['update']);
    if($pages == 'barang'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=barang');
        }
        $id = $_GET['id'];
        if(DataBarang::update(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']),$id)){
                header('location:home.php?edit=barang&id='.$id);
        } else {
                header('location:home.php?edit=barang&id='.$id);
        }
    } elseif($pages == 'pemasukan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=pemasukan');
        }
        $id = $_GET['id'];
        if(DataPemasukan::update(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']),$id)){
                header('location:home.php?edit=pemasukan&id='.$id);
        } else {
                header('location:home.php?edit=pemasukan&id='.$id);
        }
    } elseif($pages == 'penjualan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=penjualan');
        }
        $id = $_GET['id'];
        if(DataPenjualan::update(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']),$id)){
                header('location:home.php?edit=penjualan&id='.$id);
        } else {
                header('location:home.php?edit=penjualan&id='.$id);
        }
    } elseif($pages == 'gudang'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=gudang');
        }
        $id = $_GET['id'];
        if(DataGudang::update(clear($_POST['nama']), 
                          clear($_POST['harga']),
                          clear($_POST['total_barang']),$id)){
                header('location:home.php?edit=gudang&id='.$id);
        } else {
                header('location:home.php?edit=gudang&id='.$id);
        }
    } elseif($pages == 'laporan'){
        if(!isset($_GET['id'])){
            header('location:home.php?view=laporan');
        }
        $id = $_GET['id'];
        if(LaporanTransaksi::update(
            clear($_POST['judul']),
            $_POST['tanggal'],
            clear($_POST['nama']), 
            clear($_POST['harga']),
            clear($_POST['total_harga']),$id)){
            header('location:home.php?view=laporan');
        } else {
            header('location:home.php?create=laporan');
        }
    }

}