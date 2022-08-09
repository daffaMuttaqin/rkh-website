<body class="w-full h-full">
    <img src="<?php echo base_url('assets/img/bg_auth.jpg') ?>" class="fixed hidden lg:block inset-0 h-full w-full" style="z-index: -1;">
    <div class="pt-24">
        <!-- GRID -->
        <div class="w-full h-full">
            <div class="w-full h-full m-auto items-center text-center">
                <div class="mt-36 text-center">
                    <div class="w-4/12 m-auto">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                    <div class="w-4/12 py-10 rounded-xl m-auto bg-slate-50 bg-opacity-70">

                        <h1 class="text-5xl font-bold font-montserrat text-gray-800">Selamat Datang</h1>

                        <!-- FORM -->
                        <form method="post" action="<?= base_url('auth') ?>" class="flex flex-col justify-center items-center mt-10">

                            <div>

                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-7 h-7 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="email" id="email" value="<?= set_value('email'); ?>" class="bg-white border border-white shadow-xl text-gray-900 text-base rounded-full focus:ring-amber-500 focus:border-amber-500 block w-80 h-14 pl-14 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500" placeholder="Email">
                                </div>
                                <small class="text-red-600 font-semibold font-montserrat text-left duration-300">
                                    <?= form_error('email') ?>
                                </small>

                                <!-- Password -->
                                <div class="relative mt-6">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" class="bg-white border border-white shadow-xl text-gray-900 text-base rounded-full focus:ring-amber-500 focus:border-amber-500 block w-80 h-14 pl-14 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500" placeholder="Kata Sandi">
                                </div>
                                <small class="text-red-600 font-semibold font-montserrat text-left duration-300">
                                    <?= form_error('password') ?>
                                </small>

                                <div class="flex flex-row w-full mt-4 justify-center">
                                    <div class="text-gray-600 text-sm font-montserrat font-semibold">Tidak punya akun? <a href="<?= base_url('auth/registration') ?>" class=" text-gray-600 font-bold"> Buat Akun</a> </div>
                                </div>

                                <button type="submit" class="flex items-center justify-center w-80 h-14 shadow-xl bg-amber-800 rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Masuk
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>