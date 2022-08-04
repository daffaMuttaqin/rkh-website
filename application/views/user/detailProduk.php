<body class="w-full h-full" id="up">
    <div class="pt-24">
        <div class="relative w-full px-10 lg:px-60 mt-20 justify-items-center">
            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Detail Produk</h1>

            <!-- PERULANGAN -->
            <?php foreach ($produk as $pdk) : ?>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                    <div class="m-auto">
                        <img src="<?= base_url('assets/img/produk/') . $pdk->product_image ?>" class="lg:w-3/4 m-auto rounded-xl">
                    </div>
                    <div class="m-auto h-full w-full">
                        <h1 class="lg:text-3xl text-xl pb-1 mt-2 font-montserrat font-bold text-left top-0"><?= $pdk->product_name ?></h1>
                        <h1 class="lg:text-3xl text-xl pb-1 font-montserrat font-bold text-left top-0">Rp. <?= number_format($pdk->price, 0, ',', '.')  ?></h1>
                        <br>
                        <h1 class="text-lg font-montserrat pb-1">Deskripsi</h1>
                        <p class="lg:w-9/12 w-full text-justify"><?= $pdk->description ?></p>
                    </div>
                </div>

                <div class="mt-12 lg:ml-28 font-montserrat font-semibold text-xl">
                    <h1>Ulasan</h1>
                    <br>
                    <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 lg:text-lg text-base font-bold tracking-tight text-gray-900 dark:text-white"><?= $user['name'] ?></h5>
                        <p class="font-normal lg:text-lg text-base text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 lg:text-lg text-base font-bold tracking-tight text-gray-900 dark:text-white"><?= $user['name'] ?></h5>
                        <p class="font-normal lg:text-lg text-base text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                    <br>
                    <hr>
                    <br>
                </div>

                <div class="w-full mt-12 lg:ml-28 font-montserrat font-semibold text-xl">

                    <form action="">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ulasan Kamu</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis ulasan..."></textarea>
                        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
                    </form>
                </div>

            <?php endforeach ?>
            <!-- END PERULANGAN -->
        </div>
    </div>