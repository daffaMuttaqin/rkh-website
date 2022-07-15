<img src="<?php echo base_url('assets/img/wave.png') ?>" class="fixed hidden lg:block inset-0 h-full" style="z-index: -1;">

<div class="w-screen h-screen flex flex-col justify-center items-center">
    <img src="<?php echo base_url('assets/img/unlock.svg') ?>" class="hidden">

    <form method="post" action="<?= base_url('auth/registration') ?>" class="flex flex-col justify-center items-center">
        <img src="<?php echo base_url('assets/img/avatar.svg') ?>" class="w-32">

        <h2 class="my-8 font-montserrat font-bold text-3xl text-gray-700 text-center">Daftar</h2>

        <!-- Input Full Name -->
        <div class="relative">
            <i class="fa fa-user absolute text-primaryColor text-xl"></i>
            <input type="text" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Nama lengkap" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-500 font-montserrat duration-300">
                <?= form_error('name') ?>
            </small>
        </div>
        <!-- Input Email -->
        <div class="relative mt-5">
            <i class="fa fa-envelope absolute text-primaryColor text-xl"></i>
            <input type="text" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-500 font-montserrat duration-300">
                <?= form_error('email') ?>
            </small>
        </div>
        <!-- Input Password 1 -->
        <div class="relative mt-5">
            <i class="fa fa-lock absolute text-primaryColor text-xl"></i>
            <input type="password" id="password1" name="password1" placeholder="Kata Sandi" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-500 font-montserrat duration-300">
                <?= form_error('password1') ?>
            </small>
        </div>
        <!-- Input Password 2 -->
        <div class="relative mt-5">
            <i class="fa fa-lock absolute text-primaryColor text-xl"></i>
            <input type="password" id="password2" name="password2" placeholder="Ulangi Kata Sandi" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-500 font-montserrat duration-300">
                <?= form_error('password2') ?>
            </small>
        </div>
        <button type="submit" class="py-3 px-20 bg-primaryColor rounded-full text-white font-bold uppercase text-lg mt-5 transform hover:translate-y-1 transition-all duration-300">Daftar</button>
    </form>
    <a href="<?= base_url('auth') ?>" class="mt-5 self-center text-gray-600 font-bold">Sudah Punya Akun</a>

</div>
</body>

</html>