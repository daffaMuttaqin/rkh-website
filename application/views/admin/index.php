<!-- MENGECEK APAKAH SUDAH LOGIN -->
<?php if (!$this->session->userdata('email')) : ?>
    <?php
    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">Harus masuk terlebih dahulu!</span>
        </div>
    </div>');
    redirect('auth')
    ?>
<?php endif ?>

<body class="w-full h-full" id="up">
    <!-- TETIMONI FLOATING ICON -->
    <a href="<?= base_url('admin/tambah_pesanan') ?>" class="fixed flex items-center z-50 lg:bottom-24 bottom-40 right-0 lg:mr-8 lg:mb-8 mr-4 mb-4 duration-300" data-aos="fade-down">
        <img src=" <?= base_url('/assets/img/checklist.png') ?> " alt="" class="w-16 md:w-16 lg:w-20 hover:scale-110 duration-300">
    </a>
    <div class="pt-24">
        <div class="relative w-full px-10 lg:px-20 mt-20 justify-items-center">

            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Admin</h1>

            <?= $this->session->flashdata('message') ?>

            <!-- Acc Review User -->
            <div class="my-10 lg:mt-10">
                <h1 class="lg:mb-5 font-montserrat text-base lg:text-2xl font-bold">Review Belum Disetujui Admin</h1>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Kue
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Review
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Gambar Review
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Waktu
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $sql = "SELECT * FROM `tb_review_detail` WHERE `agree` = 0 ";
                            // $review_detail_acc  = $this->db->query($sql)->result();
                            ?>
                            <!-- FOREACH -->
                            <?php
                            $no = 1;
                            foreach ($review_detail_acc as $rvdd) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        <?= $no++ ?>
                                    </td>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rvdd->name ?>
                                    </th>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rvdd->product_name ?>
                                    </th>
                                    <td class="py-4 px-6">
                                        <?= $rvdd->review ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <img class="w-20 h-20 rounded" src="<?= base_url('assets/img/testimoni/') . $rvdd->image_review ?>" alt="Large avatar">
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= date('d F Y', $rvdd->posting_time) ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/terima_testimoni/') . $rvdd->id_review ?>">
                                            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Terima</button>
                                        </a>

                                        <a href="<?= base_url('admin/tolak_testimoni/') . $rvdd->id_review ?>">
                                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END FOREACH -->

                        </tbody>
                    </table>
                </div>
            </div>




            <!-- 
                    TABEL
                    USER
             -->
            <div class="my-10 lg:mt-20">
                <h1 class="font-montserrat lg:mb-5 text-base lg:text-2xl font-bold">Pengguna</h1>

                <div class="flex justify-between">
                    <!-- TOMBOL TAMBAH POINT -->
                    <div>
                        <button data-modal-target="modal-tambah-point" data-modal-toggle="modal-tambah-point" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Tambah Poin</button>

                        <!-- TOMBOL DAPAT POINT -->
                        <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Dapatkan Diskon</button>
                    </div>

                    <!-- SEARCH JIKA ADA -->
                    <div></div>
                </div>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kode Akun
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Poin
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Role
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aktif
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Waktu
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- FOREACH -->
                            <?php
                            $no = 1;
                            foreach ($semua_user as $usr) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        <?= $no++ ?>
                                    </td>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $usr->code_account ?>
                                    </th>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $usr->name ?>
                                    </th>
                                    <td class="py-4 px-6">
                                        <?= $usr->email ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        <?= $usr->point ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= $usr->role_id ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= $usr->is_active ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= date('d F Y', $usr->date_created) ?>
                                    </td>
                                    <td class="py-4 px-6 text-center flex items-center justify-center">
                                        <a href="<?= base_url('admin/edit_user/') . $usr->id ?>">
                                            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Edit</button>
                                        </a>
                                        <!-- <a href="?= base_url('admin/hapus_user/') . $usr->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?');">
                                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                        </a> -->
                                        <button data-modal-target="delete-user-modal<?= $usr->id ?>" data-modal-toggle="delete-user-modal<?= $usr->id ?>" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                    </td>
                                </tr>

                                <!-- MODAL HAPUS USER -->
                                <div id="delete-user-modal<?= $usr->id ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-user-modal<?= $usr->id ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin menghapus Pengguna ini?</h3>
                                                <a href="<?= base_url('admin/hapus_user/') . $usr->id ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Ya, saya yakin
                                                </a>
                                                <button data-modal-hide="delete-user-modal<?= $usr->id ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, batalkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- END FOREACH -->

                        </tbody>
                    </table>
                </div>
            </div>



            <!-- TESTIMONI -->
            <div class="my-10 lg:mt-20">
                <h1 class="lg:mb-5 font-montserrat text-base lg:text-2xl font-bold">Testimoni</h1>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Testimoni
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Waktu
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Favorite
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- FOREACH -->
                            <?php
                            $no = 1;
                            foreach ($review as $rv) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        <?= $no++ ?>
                                    </td>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rv->name ?>
                                    </th>
                                    <td class="py-4 px-6">
                                        <?= $rv->review ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= date('d F Y', $rv->posting_time) ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= $rv->favorite ?>
                                    </td>
                                    <td class="py-4 px-6 justify-center items-center flex">
                                        <div>
                                            <?= anchor('admin/edit_testimoni/' . $rv->id, '<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Edit</button>') ?>
                                        </div>
                                        <div>
                                            <?= anchor('admin/hapus_testimoni/' . $rv->id, '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>') ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END FOREACH -->

                        </tbody>
                    </table>
                </div>
            </div>

            <!--    TESTIMONI
                    DETAIL
            -->
            <div class="my-10 lg:mt-20">
                <h1 class="lg:mb-5 font-montserrat text-base lg:text-2xl font-bold">Testimoni Produk</h1>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Produk
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Testimoni
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Waktu
                                </th>
                                <!-- <th scope="col" class="py-3 px-6 text-center">
                                    Favorite
                                </th> -->
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- FOREACH -->
                            <?php
                            $no = 1;
                            foreach ($review_detail as $rvd) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        <?= $no++ ?>
                                    </td>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rvd->name ?>
                                    </th>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rvd->product_name ?>
                                    </th>
                                    <td class="py-4 px-6">
                                        <?= $rvd->review ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        <?= date('d F Y', $rvd->posting_time) ?>
                                    </td>
                                    <!-- <td class="py-4 px-6 text-center">
                                        $rvd->favorite
                                    </td> -->
                                    <td class="py-4 px-6 justify-center items-center flex">
                                        <div>
                                            <?= anchor('admin/hapus_testimoni_detail/' . $rvd->id_review, '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>') ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END FOREACH -->

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 
                    SEMUA
                    PRODUK
            -->
            <div class="my-10 lg:mt-20">
                <h1 class="lg:mb-5 font-montserrat text-base lg:text-2xl font-bold">Semua Produk</h1>

                <button type="button" data-modal-target="modal_semua_produk" data-modal-toggle="modal_semua_produk" class="focus:outline-none text-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Tambah</button>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Produk
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Keterangan
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kategori
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Harga
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Favorite
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- FOREACH -->
                            <?php
                            $no = 1;
                            foreach ($semua_produk as $spdk) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        <?= $no++ ?>
                                    </td>
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $spdk->product_name ?>
                                    </th>
                                    <td class="py-4 px-6">
                                        <?= $spdk->description ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        <?= $spdk->category ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        Rp.<?= number_format($spdk->price, 0, ',', '.')  ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?= $spdk->favorite ?>
                                    </td>
                                    <td class="py-4 px-6 text-center items-center flex">
                                        <div>
                                            <?= anchor('user/detail_produk/' . $spdk->id, '<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"> Detail</button>') ?>
                                        </div>
                                        <div>
                                            <?= anchor('admin/edit_semua_produk/' . $spdk->id, '<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Edit</button>') ?>
                                        </div>
                                        <div>
                                            <?= anchor('admin/hapus_produk/' . $spdk->id, '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>') ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END FOREACH -->

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- MODAL -->

    <!-- MODAL TAMBAH POINT -->
    <div id="modal-tambah-point" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Poin
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-tambah-point">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="<?= base_url('admin/tambah_poin'); ?>" method="post">
                        <!-- KODE AKUN -->
                        <div>
                            <label for="code_account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Akun</label>
                            <input type="text" name="code_account" id="code_account" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Kode Akun Pengguna" required />
                        </div>

                        <!-- JUMLAH POIN -->
                        <div>
                            <label for="point" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Poin:</label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="point" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="point" name="point" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                                <button type="button" id="increment-button" data-input-counter-increment="point" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL TAMBAH POINT -->


    <!-- MODAL TAMBAH SEMUA PRODUK -->
    <div id="modal_semua_produk" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">

            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal_semua_produk">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Produk</h3>
                    <!-- FORM -->
                    <form class="space-y-6" action="<?= base_url('admin/tambah_aksi_semua_produk'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Produk</label>
                            <input type="text" name="product_name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                        <div>

                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Deskripsi</label>
                            <textarea placeholder="Deskripsi" id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                        </div>

                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategori</label>
                            <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Brownies</option>
                                <option>Cookies</option>
                                <option>Pie</option>
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
                            <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                        <div>
                            <label for="favorite" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="1" id="favorite" name="favorite" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Favorite</span>
                            </label>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="product_image">Foto Produk</label>
                            <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="product_image" id="product_image" type="file">
                        </div>

                        <div class="flex w-full">
                            <button type="button" data-modal-toggle="modal_semua_produk" class="w-1/2 right-1/2 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Keluar</button>
                            <button type="submit" class="w-1/2 right-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- END MODAL TAMBAH SEMUA PRODUK -->

    </div>