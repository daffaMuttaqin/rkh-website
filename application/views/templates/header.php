<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Rumah Kue Haviyya</title>
</head>


<body x-data="{navbarOpen: false, scrolledFromTop: false}" @scroll.window="window.pageYOffset > 60 ? scrolledFromTop = true : scrolledFromTop = false" x-init="window.pageYOffset > 60 ? scrolledFromTop = true : scrolledFromTop = false">
    <!-- menu -->
    <header class="bg-amber-800 fixed w-full flex justify-between items-center px-4 md:px-12 h-24 transition-all duration-300" :class="{'h-24': !scrolledFromTop, 'h-12': scrolledFromTop}">
        <a href="#">
            <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Rumah Kue Haviyya Logo" class="h-14 transition-all duration-300" :class="{'h-14': !scrolledFromTop, 'h-9': scrolledFromTop}">
        </a>

        <nav>
            <button class="md:hidden" @click="navbarOpen = !navbarOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <ul class="fixed left-0 right-0 mt-2 min-h-screen bg-amber-800 space-y-4 p-4 transform translate-x-full transition duration-300 md:relative md:flex md:min-h-0 md:space-y-0 md:space-x-6 md:p-0 md:translate-x-0" :class="{'translate-x-full': !navbarOpen, 'translate-x-0': navbarOpen}">
                <li>
                    <a class="text-white" href="#">Home</a>
                </li>
                <li>
                    <a class="text-white" href="#">Products</a>
                </li>
                <li>
                    <a class="text-white" href="#">About</a>
                </li>
                <li>
                    <a class="text-white" href="#">Contact</a>
                </li>
            </ul>
        </nav>

    </header>
    <div>
        <img src="<?php echo base_url('/assets/img/kue1.jpg') ?>" alt="">
        <img src="<?php echo base_url('/assets/img/kue2.jpg') ?>" alt="">
    </div>
</body>


</html>