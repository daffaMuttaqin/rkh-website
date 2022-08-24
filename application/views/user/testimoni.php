<body class="w-full h-full" id="up">
    <!-- ADD TESTIMONI FLOATING ICON -->
    <a href="<?= base_url('user/tambah_testimoni') ?>" type="button" class="fixed flex items-center z-50 lg:bottom-24 bottom-40 right-0 lg:mr-8 lg:mb-8 mr-4 mb-4 hover:scale-110 animate-bounce duration-300" :class="{'bottom-20': !scrolledFromTop, 'bottom-40': scrolledFromTop}" data-aos="fade-down">
        <div class="mr-5 px-5 py-4 hidden lg:block rounded-xl items-center font-montserrat font-semibold text-white bg-amber-700">
            Tulis Ulasan mu!
        </div>
        <img src=" <?= base_url('/assets/img/writing.png') ?> " alt="" class="w-16 md:w-16 lg:w-20">
    </a>
    <div class="pt-24">
        <div class="relative w-full px-10 lg:px-20 lg:mt-20 mt-10 justify-items-center">
            <!-- <h1 class="font-montserrat my-5 lg:mt-20 text-xl lg:text-4xl text-center font-bold">Testimoni</h1> -->

            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-xl text-lg font-montserrat font-bold mt-16 mb-5 text-amber-800">
                    Testimoni
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7">

                    <?php
                    $delay = 0;
                    ?>

                    <?php foreach ($review as $rv) : ?>

                        <div class="card" data-aos-delay="<?= $delay; ?>" data-aos="fade-right">
                            <div class="card-header mx-4 mt-4">
                                <a href="#" blur-shadow-image="true">
                                    <img class="w-auto rounded-lg h-72 m-auto" src="<?= base_url('assets/img/testimoni/') . $rv->image_review ?>" alt="card image" />
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="mb-3">
                                    <?= $rv->review ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex">
                                    <a href="#" class="avatar">
                                        <img src="<?= base_url('assets/img/profil/') . $rv->image_profile ?>" alt="avatar" />
                                    </a>
                                    <div class="ml-3">
                                        <span class="text-blue-gray-700 mb-0 font-bold"><?= $rv->name ?></span>
                                        <p class="mb-0 text-xs">Diposting pada <?= date('d F Y', $rv->posting_time) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $delay += 100; ?>
                    <?php endforeach ?>

                </div>
            </div>










            <!-- MODAL TAMBAH TESTIMONI -->
            <div id="modal_tambah_testimoni" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal_tambah_testimoni">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Testimoni</h3>

                            <!-- FORM -->
                            <form class="space-y-6" action="<?= base_url('user/tambah_aksi_testimoni'); ?>" method="post" enctype="multipart/form-data">
                                <div class="hidden">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                                    <input type="text" name="name" id="name" value="<?= $user['name'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                </div>

                                <div class="hidden">
                                    <label for="image_profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Image Profile</label>
                                    <input type="text" name="image_profile" id="image_profile" value="<?= $user['image'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                </div>

                                <div>
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Testimoni</label>
                                    <textarea placeholder="Testimoni..." id="review" name="review" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image_review">Foto</label>
                                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image_review" id="image_review" type="file">
                                </div>

                                <div class="flex w-full">
                                    <button type="button" data-modal-toggle="modal_tambah_testimoni" class="w-1/2 right-1/2 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Keluar</button>
                                    <button type="submit" class="w-1/2 right-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Testimoni</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>