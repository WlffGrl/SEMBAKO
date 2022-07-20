<?php
$path = getcwd();
require_once($path.'/include/dbclass.php');

class LaporanTransaksi{
    
    public static $table = 'laporan_transaksi';

    public static function getAll(){
        $total_barang = new DBClass();
        $total_barang->select("*");
        $total_barang->from(self::$table);
        if($total_barang->get()){
            return $total_barang->get();
        } else {
            return [[
                'id' => 0,
                'judul' => null,
                'tanggal' => date('d-m-Y'),
                'nama_barang' => null,
                'harga' => 0,
                'total_harga' => 0
            ]];
        }
    }

    public static function findId($id){
        $total_barang = new DBClass();
        $total_barang->select("*");
        $total_barang->from(self::$table);
        $total_barang->where(['id','=',$id]);
        if($total_barang->get()){
            return $total_barang->get();
        } else {
            return [[
                'id' => 0,
                'judul' => null,
                'tanggal' => date('d-m-Y'),
                'nama_barang' => null,
                'harga' => 0,
                'total_harga' => 0
            ]];
        }
    }

    public static function store($judul,$tanggal,$nama, $harga, $total_harga){
        $data = ['judul' => $judul,
                 'tanggal' => $tanggal,
                 'nama_barang' => $nama,
                 'harga' => $harga,
                 'total_harga' => $total_harga];
        $db = new DBClass();
        if($db->insert(self::$table, $data)){
            return true;
        } else {
            return false;
        }
        
    }

    public static function update($judul,$tanggal,$nama, $harga, $total_harga, $id){
        $data = ['judul' => $judul,
                 'tanggal' => $tanggal,
                 'nama_barang' => $nama,
                 'harga' => $harga,
                 'total_harga' => $total_harga];
        $db = new DBClass();
        $db->update(self::$table);
        $db->set($data);
        $db->where(['id','=',$id]);
        if($db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public static function delete($id){
        $db = new DBClass();
        $db->delete();
        $db->from(self::$table);
        $db->where(['id','=',$id]);
        if($db->execute()){
            return true;
        } else {
            return false;
        }
    }
}