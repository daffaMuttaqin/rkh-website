<body class="w-full h-full" id="up">
    <div class="pt-24">
        <div class="relative w-full px-10 lg:px-20 lg:mt-20 mt-10 justify-items-center">
            <h1 class="font-montserrat my-5 lg:mt-20 text-xl lg:text-4xl text-center font-bold">Produk</h1>

            <!-- KATEGORI -->
            <div class="lg:w-6/12 w-full lg:m-auto grid lg:grid-cols-2 grid-cols-1 text-center">
                <div class="lg:px-2">
                    <a href="#brownies">
                        <button class="lg:w-full w-full mx-1 text-montserrat lg:text-xl text-base lg:p-4 p-2 my-1 m-auto bg-amber-800 rounded-xl text-white font-semibold hover:scale-105 duration-300">
                            Brownies
                        </button>
                    </a>
                </div>
                <div class="lg:px-2">
                    <a href="#cookies">
                        <button class="lg:w-full w-full mx-1 text-montserrat lg:text-xl text-base lg:p-4 p-2 my-1 m-auto bg-amber-800 rounded-xl text-white font-semibold hover:scale-105 duration-300">
                            Cookies
                        </button>
                    </a>
                </div>
                <div class="lg:col-span-2 lg:px-2">
                    <a href="#pie">
                        <button class="lg:w-full w-full mx-1 text-montserrat lg:text-xl text-base lg:p-4 p-2 my-1 m-auto bg-amber-800 rounded-xl text-white font-semibold hover:scale-105 duration-300">
                            Pie
                        </button>
                    </a>
                </div>
            </div>


            <!-- BROWNIES -->
            <div id="brownies"></div>
            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-xl text-lg font-montserrat font-bold mt-16 mb-5 text-amber-800">
                    Brownies
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7 text-center">

                    <?php
                    $sql = "SELECT * FROM `tb_produk` WHERE `category` = ? ";
                    $produk  = $this->db->query($sql, array('Brownies'))->result();
                    ?>

                    <?php foreach ($produk as $pdk) : ?>
                        <!-- Produk 1 -->
                        <div class="max-w-sm bg-white rounded-lg shadow-md">
                            <a href="#">
                                <div class="w-full h-96 m-auto">
                                    <img class="rounded-lg w-full h-full m-auto" src=" <?= base_url('assets/img/produk/') . $pdk->product_image ?> " />
                                </div>
                            </a>
                            <div class="px-5 py-5">
                                <a href="#">
                                    <h5 class="mb-3 text-xl font-semibold font-montserrat tracking-tight text-gray-900"><?= $pdk->product_name ?></h5>
                                </a>

                                <div class="flex justify-between items-center mt-4 mb-5">
                                    <span class="text-2xl font-bold text-gray-900">Rp. <?= number_format($pdk->price, 0, ',', '.')  ?></span>
                                    <?= anchor('user/detail_produk/' . $pdk->id, '<button class="text-white bg-amber-800 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300">Lihat Detail</button>') ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>

            <!-- Cookies -->
            <div id="cookies"></div>
            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-xl text-lg font-montserrat font-bold mt-16 mb-5 text-amber-800">
                    Cookies
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7 text-center">

                    <?php
                    $sql = "SELECT * FROM `tb_produk` WHERE `category` = ? ";
                    $produk  = $this->db->query($sql, array('Cookies'))->result();
                    ?>

                    <?php foreach ($produk as $pdk) : ?>
                        <!-- Produk 1 -->
                        <div class="max-w-sm bg-white rounded-lg shadow-md">
                            <a href="#">
                                <div class="w-full h-96 m-auto">
                                    <img class="rounded-lg w-full h-full m-auto" src=" <?= base_url('assets/img/produk/') . $pdk->product_image ?> " />
                                </div>
                            </a>
                            <div class="px-5 py-5">
                                <a href="#">
                                    <h5 class="mb-3 text-xl font-semibold font-montserrat tracking-tight text-gray-900"><?= $pdk->product_name ?></h5>
                                </a>

                                <div class="flex justify-between items-center mt-4 mb-5">
                                    <span class="text-2xl font-bold text-gray-900">Rp. <?= number_format($pdk->price, 0, ',', '.')  ?></span>
                                    <?= anchor('user/detail_produk/' . $pdk->id, '<button class="text-white bg-amber-800 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300">Lihat Detail</button>') ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>

            <!-- Pie -->
            <div id="pie"></div>
            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-xl text-lg font-montserrat font-bold mt-16 mb-5 text-amber-800">
                    Pie
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7 text-center">

                    <?php
                    $sql = "SELECT * FROM `tb_produk` WHERE `category` = ? ";
                    $produk  = $this->db->query($sql, array('Pie'))->result();
                    ?>

                    <?php foreach ($produk as $pdk) : ?>
                        <!-- Produk 1 -->
                        <div class="max-w-sm bg-white rounded-lg shadow-md">
                            <a href="#">
                                <div class="w-full h-96 m-auto">
                                    <img class="rounded-lg w-full h-full m-auto" src=" <?= base_url('assets/img/produk/') . $pdk->product_image ?> " />
                                </div>
                            </a>
                            <div class="px-5 py-5">
                                <a href="#">
                                    <h5 class="mb-3 text-xl font-semibold font-montserrat tracking-tight text-gray-900"><?= $pdk->product_name ?></h5>
                                </a>

                                <div class="flex justify-between items-center mt-4 mb-5">
                                    <span class="text-2xl font-bold text-gray-900">Rp. <?= number_format($pdk->price, 0, ',', '.')  ?></span>
                                    <?= anchor('user/detail_produk/' . $pdk->id, '<button class="text-white bg-amber-800 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300">Lihat Detail</button>') ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>