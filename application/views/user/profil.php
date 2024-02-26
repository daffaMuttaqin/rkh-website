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
    <div class="pt-24">
        <div class="relative lg:w-1/2 w-full m-auto px-10 lg:px-20 mt-20 justify-items-center">
            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Profil Saya</h1>

            <div class="w-full m-auto text-center">
                <?= $this->session->flashdata('message'); ?>
            </div>

            <div class=" w-full m-auto bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow ">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href=" <?= base_url('user/edit') ?> " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                            </li>
                            <li>
                                <a href=" <?= base_url('user/ubah_password') ?> " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Ubah Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center pb-10">
                    <div class="flex flex-col ml-5">
                        <div class="p-3 rounded bg-gray-100">
                            <img class="w-36 h-36 rounded-lg" src=" <?= base_url('assets/img/profil/') . $user['image'] ?>" alt="Bonnie image" />
                        </div>

                        <div class="text-center mt-3">
                            <h1 class="font-montserrat font-bold text-gray-600 text-lg">Poin</h1>
                            <span class="font-montserrat text-amber-300 font-bold text-3xl"> <?= $user['point'] ?> </span>
                        </div>
                    </div>

                    <div class="flex flex-col p-5 space-y-3">
                        <div>
                            <h1 class="font-montserrat font-bold text-gray-600 text-lg">Kode Akun</h1>
                            <button data-popover-target="popover-kode-akun" type="button" class="font-montserrat italic cursor-default"> <?= $user['code_account'] ?> </button>

                            <!-- Pop Over -->
                            <div data-popover id="popover-kode-akun" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Menambah Poin</h3>
                                </div>
                                <div class="px-3 py-2">
                                    <p>Jika pengguna baru memasukkan <span class="font-bold">kode akun</span> anda saat melakukan pendaftaran maka anda akan mendapatkan <span class="font-bold">1 point</span></p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>

                        </div>
                        <div>
                            <h1 class="font-montserrat font-bold text-gray-600 text-lg">Nama</h1>
                            <span class="font-montserrat"> <?= $user['name'] ?> </span>
                        </div>
                        <div>
                            <h1 class="font-montserrat font-bold text-gray-600 text-lg">Email</h1>
                            <span class="font-montserrat"> <?= $user['email'] ?> </span>
                        </div>
                        <div>
                            <h1 class="font-montserrat font-bold text-gray-600 text-lg">Member</h1>
                            <span class="font-montserrat"> Member mulai dari <?= date('d F Y', $user['date_created']) ?> </span>
                        </div>

                    </div>

                </div>


            </div>
            <h1 class="text-xl font-montserrat mt-4 font-semibold text-amber-800">Testimoni</h1>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-2 gap-y-7 bg-gray-50">

                <?php
                $delay = 0;
                $sql = "SELECT * FROM `tb_review` WHERE `name` = ? ";
                $review  = $this->db->query($sql, array($user['name']))->result();
                ?>

                <?php foreach ($review as $rv) : ?>

                    <div class="w-full p-3 flex flex-col justify-between shadow-lg rounded-xl text-center">
                        <div class="pb-2 m-auto">
                            <img class="w-56 h-56 rounded" src="<?= base_url('assets/img/testimoni/') . $rv->image_review ?>" alt="Large avatar">
                        </div>
                        <p class="mb-2 font-montserrat">
                            <?= $rv->review ?>
                        </p>

                        <div class="pb-2">
                            <p class="text-xs">Diposting pada <?= date('d F Y', $rv->posting_time) ?></p>
                        </div>

                        <div>
                            <?= anchor('user/hapus_testimoni/' . $rv->id, '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>') ?>
                        </div>
                    </div>
                    <?php $delay += 100; ?>
                <?php endforeach ?>

            </div>


        </div>
    </div>