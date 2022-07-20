<?php
$data_barang = DataBarang::getAndSum();
$data_gudang = DataGudang::getAndSum();
$data_pemasukan = DataPemasukan::getAndSum();
$data_penjualan = DataPenjualan::getAndSum();
?>
    <div class="flex space-x-4">
        <div class="justify-between rounded-xl mt-4 p-4 bg-white shadow-lg">
          <h1 class="text-xl font-bold text-gray-800 mt-4">Data Pemasukan</h1>
          <div class="flex justify-between space-x-4 text-center mt-6">
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Total Harga</span>
              <h3><?= rupiah($data_pemasukan[0]['total']) ?></h3>
            </div>
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Jumlah Barang</span>
              <h3><?= $data_pemasukan[0]['jumlah_barang'] ?></h3>
            </div>
          </div>
        </div>
        <div class="justify-between rounded-xl mt-4 p-4 bg-white shadow-lg">
          <h1 class="text-xl font-bold text-gray-800 mt-4">Data Penjualan</h1>
          <div class="flex justify-between space-x-4 text-center mt-6">
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Total Harga</span>
              <h3><?= rupiah($data_penjualan[0]['total']) ?></h3>
            </div>
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Jumlah Barang</span>
              <h3><?= $data_penjualan[0]['jumlah_barang'] ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="flex space-x-4">
        <div class="justify-between rounded-xl mt-4 p-4 bg-white shadow-lg">
          <h1 class="text-xl font-bold text-gray-800 mt-4">Data Barang</h1>
          <div class="flex justify-between space-x-4 text-center mt-6">
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Total Harga</span>
              <h3><?= rupiah($data_barang[0]['total']) ?></h3>
            </div>
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Jumlah Barang</span>
              <h3><?= $data_barang[0]['jumlah_barang'] ?></h3>
            </div>
          </div>
        </div>
        <div class="justify-between rounded-xl mt-4 p-4 bg-white shadow-lg">
          <h1 class="text-xl font-bold text-gray-800 mt-4">Data Gudang</h1>
          <div class="flex justify-between space-x-4 text-center mt-6">
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Total Harga</span>
              <h3><?= rupiah($data_gudang[0]['total']) ?></h3>
            </div>
            <div class="bg-indigo-50 rounded-xl p-10">
              <span>Jumlah Barang</span>
              <h3><?= $data_gudang[0]['jumlah_barang'] ?></h3>
            </div>
          </div>
        </div>
      </div>
