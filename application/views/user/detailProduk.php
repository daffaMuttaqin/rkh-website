<body class="w-full h-full" id="up">
    <!-- ADD TESTIMONI FLOATING ICON -->
    <?php foreach ($produk as $pdk) : ?>
        <a href="<?= base_url('user/tambah_testimoni_detail/') . $pdk->id ?>">
            <button class="fixed flex items-center z-50 lg:bottom-24 bottom-40 right-0 lg:mr-8 lg:mb-8 mr-4 mb-4 hover:scale-110 animate-bounce duration-300" :class="{'bottom-20': !scrolledFromTop, 'bottom-40': scrolledFromTop}" data-aos="fade-down">
                <div class="mr-5 px-5 py-4 hidden lg:block rounded-xl items-center font-montserrat font-semibold text-white bg-amber-700">
                    Tulis Ulasan mu!
                </div>
                <img src=" <?= base_url('/assets/img/writing.png') ?> " alt="" class="w-16 md:w-16 lg:w-20">
            </button>
        </a>
    <?php endforeach ?>

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
                        <p class="lg:w-9/12 w-full font-montserrat text-justify"><?= $pdk->description ?></p>
                    </div>
                </div>

                <div class="lg:w-1/2 w-full mt-12 lg:ml-20 bg-gray-50 p-5 rounded-xl shadow-sm">

                    <h1 class="font-montserrat font-semibold text-xl">Cemana menurut kelen?</h1>
                    <br>

                    <?php foreach ($produk as $pdk) : ?>

                        <?php
                        $delay = 0;
                        $sql = "SELECT * FROM `tb_review_detail` WHERE `id_product` = ? AND `agree` = 1 ";
                        $review_detail  = $this->db->query($sql, array($pdk->id))->result();
                        ?>

                        <?php foreach ($review_detail as $rvd) : ?>

                            <div class="w-full">
                                <div class="pb-2 pt-5">
                                    <p class="text-xs">Diposting pada <?= date('d F Y', $rvd->posting_time) ?></p>
                                </div>
                                <div class="flex items-center pb-2">
                                    <a href="#" class="avatar">
                                        <img class="w-10 h-10 rounded-full" src="<?= base_url('assets/img/profil/') . $rvd->image_profile ?>" alt="Rounded avatar">
                                    </a>
                                    <span class="text-gray-700 mb-0 font-bold ml-2"><?= $rvd->name ?></span>
                                </div>
                                <p class="mb-2 font-montserrat">
                                    <?= $rvd->review ?>
                                </p>
                                <!-- Btn Modal -->
                                <button data-modal-toggle="defaultModal<?= $rvd->id_review; ?>" class="pb-5">
                                    <img class="w-20 h-20 rounded" src="<?= base_url('assets/img/testimoni/') . $rvd->image_review ?>" alt="Large avatar">
                                </button>
                                <hr>
                            </div>
                            <?php $delay += 100; ?>

                            <!-- MODAL -->
                            <!-- Main modal -->
                            <div id="defaultModal<?= $rvd->id_review; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative px-5 bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Ulasan
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal<?= $rvd->id_review; ?>">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="w-96 h-96 m-auto mt-2">
                                            <img class="rounded " src="<?= base_url('assets/img/testimoni/') . $rvd->image_review ?>" alt="Large avatar">
                                        </div>
                                        <div class="w-full pb-4">
                                            <div class="pb-2 pt-5">
                                                <p class="text-xs">Diposting pada <?= date('d F Y', $rvd->posting_time) ?></p>
                                            </div>
                                            <div class="flex items-center pb-2">
                                                <a href="#" class="avatar">
                                                    <img class="w-10 h-10 rounded-full" src="<?= base_url('assets/img/profil/') . $rvd->image_profile ?>" alt="Rounded avatar">
                                                </a>
                                                <span class="text-gray-700 text-base mb-0 font-bold ml-2"><?= $rvd->name ?></span>
                                            </div>
                                            <p class="mb-2 text-sm font-montserrat">
                                                <?= $rvd->review ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL -->

                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endforeach ?>
                <!-- END PERULANGAN -->

                </div>


        </div>
    </div>