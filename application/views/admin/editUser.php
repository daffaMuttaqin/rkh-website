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
    <div class="pt-24">
        <div class="relative w-1/2 m-auto px-10 lg:px-20 mt-20 justify-items-center">
            <h1 class="font-montserrat my-5 lg:my-10 text-base lg:text-2xl font-bold text-center">Edit User</h1>

            <!-- PERULANGAN -->
            <?php foreach ($semua_user as $usr) : ?>
                <!-- FORM -->
                <form class="space-y-6" action="<?= base_url('admin/update_user'); ?>" method="post">
                    <div>
                        <input type="hidden" name="id" id="id" value="<?= $usr->id ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                        <input type="text" name="name" id="name" value="<?= $usr->name ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="text" name="email" id="email" value="<?= $usr->email ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div>
                        <label for="date_created" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Pembuatan</label>
                        <input type="text" name="date_created" id="date_created" value="<?= $usr->date_created ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div>
                        <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                        <select id="text" name="role_id" value="<?= $usr->role_id ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>2</option>
                            <option>1</option>
                        </select>
                    </div>

                    <div>
                        <label for="is_active" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" value="1" id="is_active" name="is_active" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</span>
                        </label>
                    </div>

                    <div class="flex w-full">
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>

            <?php endforeach ?>
            <!-- END PERULANGAN -->
        </div>
    </div>