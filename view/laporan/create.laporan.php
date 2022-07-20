<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Data Transaksi</h3>
        <p class="mt-1 text-sm text-gray-600">
          Tambahkan Data Transaksi baru.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="action.php?create=laporan" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="border-2 p-2 bg-blue-100 rounded-xl col-span-6 sm:col-span-4">
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" placeholder="Judul" class="ml-2 outline-none w-full bg-blue-100">
              </div>

              <div class="border-2 p-2 bg-blue-100 rounded-xl col-span-6 sm:col-span-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" placeholder="01-01-2021" class="ml-2 outline-none w-full bg-blue-100">
              </div>

              <div class="border-2 p-2 bg-blue-100 rounded-xl col-span-6 sm:col-span-4">
                <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama" placeholder="nama barang" class="ml-2 outline-none w-full bg-blue-100">
              </div>

              <div class="border-2 p-2 bg-blue-100 rounded-xl col-span-6 sm:col-span-4">
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" name="harga" placeholder="10000" class="ml-2 outline-none w-full bg-blue-100">
              </div>

              <div class="border-2 p-2 bg-blue-100 rounded-xl col-span-6 sm:col-span-4">
                <label class="block text-sm font-medium text-gray-700">Total Harga</label>
                <input type="text" name="total_harga" placeholder="100000000" class="ml-2 outline-none w-full bg-blue-100">
              </div>

            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>
