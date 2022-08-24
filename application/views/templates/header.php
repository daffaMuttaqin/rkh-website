<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href=" <?= base_url('assets/img/logo.png') ?> ">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Animate On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- FLOWBITE -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" /> -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />

    <!-- TAILWIND MATERIAL -->
    <link href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" rel="stylesheet" />

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primaryColor: '#F9A826',
                    },
                    fontFamily: {
                        'montserrat': 'Montserrat',
                        'nunito': 'Nunito',
                        'dancing': 'Dancing Script'
                    },
                },
            }
        }
    </script>

    <!-- Style -->
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Nunito:wght@300;400;700&display=swap');
        /* @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&'); */
    </style>
    <title> <?= $title; ?> </title>
</head>


<body x-data="{navbarOpen: false, scrolledFromTop: false}" @scroll.window="window.pageYOffset > 60 ? scrolledFromTop = true : scrolledFromTop = false" x-init="window.pageYOffset > 60 ? scrolledFromTop = true : scrolledFromTop = false" class="absolute">
    <!-- menu -->
    <header class="bg-amber-800 fixed z-50 w-full flex justify-between items-center px-4 md:px-12 h-24 shadow-lg transition-all duration-300" :class="{'h-24': !scrolledFromTop, 'h-12': scrolledFromTop}">
        <!-- LOGO RUMAH KUE HAVIYYA -->
        <a href="#">
            <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Rumah Kue Haviyya Logo" class="h-16 lg:ml-20 transition-all duration-200" :class="{'h-16': !scrolledFromTop, 'h-9': scrolledFromTop}">
        </a>

        <!-- TEXT UNFORGETTABLE TASTE -->
        <!-- <div>
            <img src="<?php // echo base_url('assets/img/font_white.png') 
                        ?>" class="hidden lg:block h-44 mt-3 transition-all duration-200" :class="{'h-44': !scrolledFromTop, 'h-32': scrolledFromTop}">
        </div> -->

        <!-- MENU -->
        <nav>
            <button class="md:hidden" @click="navbarOpen = !navbarOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <ul class="font-montserrat bg-amber-800 fixed left-0 right-0 items-center mt-3 min-h-screen space-y-4 p-4 transform translate-x-full transition duration-300 md:relative md:flex md:min-h-0 md:space-y-0 md:space-x-6 md:p-0 md:translate-x-0" :class="{'translate-x-full': !navbarOpen, 'translate-x-0': navbarOpen, 'mt-3': !scrolledFromTop, 'mt-0': scrolledFromTop}">

                <?php if (!$this->session->userdata('email')) : ?>
                    <!-- MENU JIKA TIDAK LOGIN -->
                    <?php
                    $queryMenu = "  SELECT  `user_menu`.`id`, `menu`
                                    FROM    `user_menu` JOIN `user_access_menu`
                                    ON      `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE   `user_access_menu`.`role_id` = 2
                                ORDER BY    `user_access_menu`.`menu_id` DESC
                                ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>

                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>

                        <!-- QUERY SUB MENU -->
                        <?php
                        $menuId = $m['id'];
                        $querySubMenu = "   SELECT * FROM `user_sub_menu`
                                            WHERE `menu_id` = $menuId
                                            AND `is_active` = 1
                                        ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) : ?>
                            <!-- KONDISI UNTUK JUDUL AKTIF -->
                            <?php if ($title == $sm['title']) : ?>
                                <li class="font-bold" :class="{'pb-2': !scrolledFromTop, 'pb-0': scrolledFromTop}">
                                <?php else : ?>
                                    <!-- KONDISI UNTUK JUDUL TIDAK AKTIF -->
                                <li class="lg:border-b-2 border-none pb-1 hover:scale-110 duration-300">

                                <?php endif; ?>
                                <!-- END IF -->

                                <a class="text-white" href=" <?= base_url($sm['url']) ?> ">
                                    <?= $sm['title'] ?>
                                </a>
                                </li>
                            <?php endforeach ?>

                        <?php endforeach; ?>


                    <?php else : ?>

                        <!-- QUERY MENU -->
                        <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "  SELECT  `user_menu`.`id`, `menu`
                                    FROM    `user_menu` JOIN `user_access_menu`
                                    ON      `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE   `user_access_menu`.`role_id` = $role_id
                                ORDER BY    `user_access_menu`.`menu_id` DESC
                                ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>

                        <!-- LOOPING MENU -->
                        <?php foreach ($menu as $m) : ?>

                            <!-- QUERY SUB MENU -->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "   SELECT * FROM `user_sub_menu`
                                        WHERE `menu_id` = $menuId
                                        AND `is_active` = 1
                        ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>

                            <?php foreach ($subMenu as $sm) : ?>
                                <!-- KONDISI UNTUK JUDUL AKTIF -->
                                <?php if ($title == $sm['title']) : ?>
                                    <li class="font-bold" :class="{'pb-2': !scrolledFromTop, 'pb-0': scrolledFromTop}">
                                    <?php else : ?>
                                        <!-- KONDISI UNTUK JUDUL TIDAK AKTIF -->
                                    <li class="lg:border-b-2 border-none pb-1 hover:scale-110 duration-300">

                                    <?php endif; ?>
                                    <!-- END IF -->

                                    <a class="text-white" href=" <?= base_url($sm['url']) ?> ">
                                        <?= $sm['title'] ?>
                                    </a>
                                    </li>
                                <?php endforeach ?>

                            <?php endforeach; ?>

                        <?php endif; ?>

                        <?php if (!$this->session->userdata('email')) : ?>
                            <!-- MENU JIKA TIDAK LOGIN -->
                            <li class="text-white hidden lg:block">
                                |
                            </li>

                            <li class="mt-1">
                                <a href="<?= base_url('auth') ?>">
                                    <button type="button" class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-amber-600 dark:hover:bg-amber-700 focus:outline-none dark:focus:ring-amber-800 duration-300">Masuk</button>
                                </a>
                            </li>

                        <?php else : ?>
                            <!-- MENU JIKA LOGIN -->
                            <li class="text-white hidden lg:block">
                                |
                            </li>

                            <li>
                                <button class="flex items-center space-x-3" id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start">
                                    <img class="w-h-12 h-12 rounded-full cursor-pointer" src="<?= base_url('assets/img/profil/') . $user['image'] ?>" alt="User dropdown" :class="{'w-12': !scrolledFromTop, 'w-9': scrolledFromTop, 'h-12': !scrolledFromTop, 'h-9': scrolledFromTop}">
                                    <div class="text-white">
                                        <?= $user['name'] ?>
                                    </div>
                                </button>

                                <!-- DROPDOWN MENU -->
                                <div id="userDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                    <div class="py-3 px-4 text-sm text-gray-900">
                                        <div> <?= $user['name'] ?></div>
                                        <div class="font-medium truncate"><?= $user['email'] ?></div>
                                    </div>
                                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="avatarButton">
                                        <li>
                                            <a href=" <?= base_url('user/profil') ?>" class="block py-2 px-4 hover:bg-gray-100 ">Profil Saya</a>
                                        </li>
                                        <li>
                                            <a href=" <?= base_url('user/edit') ?>" class="block py-2 px-4 hover:bg-gray-100 ">Edit Profil</a>
                                        </li>
                                        <li>
                                            <a href=" <?= base_url('user/ubah_password') ?>" class="block py-2 px-4 hover:bg-gray-100 ">Ubah Password</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href=" <?= base_url('auth/logout') ?> " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Keluar</a>
                                    </div>
                                </div>
                            </li>

                        <?php endif; ?>
            </ul>

            <!-- FLOATING ICON WHATSAPP AND UP -->
            <div class="h-full w-full">
                <!-- WHATSAPP -->
                <a href="https://api.whatsapp.com/send?phone=6287888103954" class="fixed z-50 bottom-0 right-0 lg:mr-8 lg:mb-8 mr-4 mb-4 hover:scale-110 duration-300">
                    <img src=" <?= base_url('/assets/img/whatsapp.png') ?> " alt="" class="w-16 md:w-16 lg:w-20">
                </a>

                <!-- UP -->
                <a href="#up" class="fixed hidden z-50 lg:bottom-0 bottom-20 lg:right-24 right-0 lg:mr-8 lg:mb-8 mr-4 mb-4 hover:scale-110 transition-all duration-300" :class="{'hidden': !scrolledFromTop, 'block': scrolledFromTop}" data-aos="fade-up" data-aos-once="false">
                    <div class="flex w-16 lg:w-20 h-16 lg:h-20 bg-gray-800 rounded-full items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                        </svg>
                    </div>
                </a>
            </div>
        </nav>



    </header>
</body>