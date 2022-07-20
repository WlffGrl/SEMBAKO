<?php

function rupiah($angka){
    return "Rp " . number_format($angka,2,',','.');
}

function view_owner($page){
    global $path;
    if($page == 'laporan' ){
        $data_barang_all = LaporanTransaksi::getAll();
        include($path.'/view/owner/owner.php');
    }else{
        include($path.'/view/home.php');
    }
}

function view($page){
    global $path;
    if($page == 'penjualan'){
        $data_barang_all = DataPenjualan::getAll();
        include($path.'/view/penjualan/penjualan.php');
    } elseif($page == 'pemasukan'){
        $data_barang_all = DataPemasukan::getAll();
        include($path.'/view/pemasukan/pemasukan.php');
    } elseif($page == 'gudang'){
        $data_barang_all = DataGudang::getAll();
        include($path.'/view/gudang/gudang.php');
    } elseif($page == 'barang'){
        $data_barang_all = DataBarang::getAll();
        include($path.'/view/barang/barang.php');
    } elseif($page == 'laporan') {
        $data_barang_all = LaporanTransaksi::getAll();
        include($path.'/view/laporan/laporan.php');
    } elseif($page == 'owner') {
        $data_barang_all = LaporanTransaksi::getAll();
        include($path.'/view/owner/owner.php');
    } else {
        include($path.'/view/home.php');
    }
}

function view_edit($page, $id) {
    global $path;
    if($page == 'penjualan'){
        $data_barang_edit = DataPenjualan::findId($id);
        include($path.'/view/penjualan/edit.penjualan.php');
    } elseif($page == 'pemasukan'){
        $data_barang_edit = DataPemasukan::findId($id);
        include($path.'/view/pemasukan/edit.pemasukan.php');
    } elseif($page == 'gudang'){
        $data_barang_edit = DataGudang::findId($id);
        include($path.'/view/gudang/edit.gudang.php');
    } elseif($page == 'barang'){
        $data_barang_edit = DataBarang::findId($id);
        include($path.'/view/barang/edit.barang.php');
    } elseif($page == 'laporan'){
        $data_barang_edit = LaporanTransaksi::findId($id);
        include($path.'/view/laporan/edit.laporan.php');
    } else {
        include($path.'/view/home.php');
    }
}

function view_create($page){
    global $path;
    if($page == 'penjualan'){
        include($path.'/view/penjualan/create.penjualan.php');
    } elseif($page == 'pemasukan'){
        include($path.'/view/pemasukan/create.pemasukan.php');
    } elseif($page == 'gudang'){
        include($path.'/view/gudang/create.gudang.php');
    } elseif($page == 'barang'){
        include($path.'/view/barang/create.barang.php');
    } elseif($page == 'laporan'){
        include($path.'/view/laporan/create.laporan.php');
    } else {
        include($path.'/view/home.php');
    }
}

function clear($input){
    $input = preg_replace("/'.*|\".*/",'',$input);
    $input = str_replace('/','',$input);
    $input = str_replace("'",'',$input);
    $input = str_replace('"','',$input);
    $input = str_replace('*','',$input);
    $input = str_replace('\0','',$input);
    $input = str_replace('-','',$input);
    $input = str_replace('+','',$input);
    return $input;
}