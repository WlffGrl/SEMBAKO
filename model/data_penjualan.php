<?php
$path = getcwd();
require_once($path."/include/dbclass.php");

class DataPenjualan{

    protected static $table = 'data_penjualan';

    public static function getAndSum(){
        $total_barang = new DBClass();
        $total_barang->select("sum(total_harga) as total, sum(jumlah_barang) as jumlah_barang");
        $total_barang->from(self::$table);
        if($total_barang->get()){
            return $total_barang->get();
        } else {
            return [[
                'total' => 0,
                'jumlah_barang' => 0
            ]];
        }
    }

    public static function getAll(){
        $total_barang = new DBClass();
        $total_barang->select("*");
        $total_barang->from(self::$table);
        if($total_barang->get()){
            return $total_barang->get();
        } else {
            return [[
                'id' => 0,
                'nama_barang' => null,
                'harga' => 0,
                'jumlah_barang' => 0,
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
                'nama_barang' => null,
                'harga' => 0,
                'jumlah_barang' => 0,
                'total_harga' => 0
            ]];
        }
    }

    public static function store($nama, $harga, $jumlah_barang){
        $total_harga = $harga * $jumlah_barang;
        $data = ['nama_barang' => $nama,
                 'harga' => $harga,
                 'jumlah_barang' => $jumlah_barang,
                 'total_harga' => $total_harga];
        $db = new DBClass();
        if($db->insert(self::$table, $data)){
            return true;
        } else {
            return false;
        }
        
    }

    public static function update($nama, $harga, $jumlah_barang, $id){
        $total_harga = $harga * $jumlah_barang;
        $data = ['nama_barang' => $nama,
                 'harga' => $harga,
                 'jumlah_barang' => $jumlah_barang,
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
