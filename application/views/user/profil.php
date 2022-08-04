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
        <div class="relative w-full px-10 lg:px-20 mt-20 justify-items-center">
            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Profil Saya</h1>

            <div class="w-1/2 m-auto text-center">
                <?= $this->session->flashdata('message'); ?>
            </div>

            <div class="max-w-sm m-auto bg-white rounded-lg border border-gray-200 shadow-md">
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
                <div class="flex flex-col items-center pb-10">

                    <img class="mb-3 w-56 h-56 rounded-full shadow-lg" src=" <?= base_url('assets/img/profil/') . $user['image'] ?>" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900"> <?= $user['name'] ?> </h5>
                    <span class="text-sm text-gray-900"> <?= $user['email'] ?> </span>
                    <span class="text-sm text-gray-800 mt-1"> Member mulai dari <?= date('d F Y', $user['date_created']) ?> </span>

                </div>
            </div>

        </div>
    </div>