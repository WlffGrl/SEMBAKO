<?php
error_reporting(-1);
session_start();
require_once("model/data_barang.php");
require_once("model/data_gudang.php");
require_once("model/data_pemasukan.php");
require_once("model/data_penjualan.php");
require_once("model/laporan_transaksi.php");
require_once("include/function.php");

if(!isset($_SESSION['logged'])){
    header('location: login.php');
    die();
}

?>

<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
    <div class="flex bg-gray-100 rounded-xl m-3 shadow-xl">
  <aside class="flex px-16 space-y-16 overflow-hidden m-3 pb-4 flex-col items-center justify-center rounded-tl-xl rounded-bl-xl bg-blue-500 shadow-lg">
    <!-- <div class="flex items-center justify-center p-4 shadow-lg">
      <h1 class="text-white font-bold mr-2 cursor-pointer">Home</h1>
    </div> -->
    <ul>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php">Dashboard</a>
      </li>
      <?php if ($_SESSION['role'] == 'admin'):?>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php?view=penjualan">Penjualan</a>
      </li>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php?view=pemasukan">Pemasukan</a>
      </li>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php?view=gudang">Gudang</a>
      </li>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php?view=barang">Barang</a>
      </li>
      <?php endif; ?>
      <li class="flex space-x-2 mt-4 px-6 py-4 text-white hover:bg-white hover:text-blue-500 font-bold hover:rounded-br-3xl transition duration-100 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
          <a href="home.php?view=laporan">Laporan Transaksi</a>
      </li>
    </ul>
  </aside>
  <main class=" flex-col bg-blue-50 w-full ml-4 pr-6">
    <div class="flex justify-between p-4 bg-blue-500 mt-3 rounded-xl shadow-lg">
      <h1 class="text-xl font-bold text-white">Welcome to Dashboard</h1>
      <div class="flex justify-between w-0/5">
        <div class="flex items-center space-x-6 pr-8">
          <a href="logout.php">
          <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />  <path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
          </a>
        </div>
      </div>
    </div>
    <?php include('page.php');?>
  </main>
</div>
    </body>
    <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-dark" href="/">Kelompok 3</a>
  </div>
  <!-- Copyright -->
</footer>
</html>