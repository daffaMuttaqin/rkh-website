<img src="<?php echo base_url('assets/img/wave.png') ?>" class="fixed hidden lg:block inset-0 h-full" style="z-index: -1;">

<div class="w-screen h-screen flex flex-col justify-center items-center">
    <img src="<?php echo base_url('assets/img/unlock.svg') ?>" class="hidden">

    <form method="post" action="<?= base_url('auth') ?>" class="flex flex-col justify-center items-center">
        <img src="<?php echo base_url('assets/img/avatar.svg') ?>" class="w-32">

        <h2 class="my-8 font-montserrat font-bold text-3xl text-gray-700 text-center">Selamat Datang</h2>

        <?= $this->session->flashdata('message') ?>

        <!-- Input Email -->
        <div class="relative outline-none">
            <i class="fa fa-envelope absolute text-primaryColor text-xl outline-none"></i>
            <input type="text" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-600 font-montserrat duration-300 ">
                <?= form_error('email') ?>
            </small>
        </div>
        <!-- Input Password -->
        <div class="relative mt-8">
            <i class="fa fa-lock absolute text-primaryColor text-xl"></i>
            <input type="password" id="password" name="password" placeholder="Kata Sandi" class="pl-8 border-b-2 font-montserrat outline-none focus:outline-none focus:border-primaryColor transition-all duration-500 text-lg">
            <!-- Text Error -->
            <small class="text-red-600 font-montserrat duration-300">
                <?= form_error('password') ?>
            </small>
        </div>
        <div class="flex flex-row w-full mt-4 justify-center">
            <div class="text-gray-600 font-semibold">Tidak punya akun? <a href="<?= base_url('auth/registration') ?>" class=" text-gray-600 font-bold"> Buat Akun</a> </div>
        </div>
        <button type="submit" class="py-3 px-20 bg-primaryColor rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all duration-300">Masuk</button>
    </form>

</div>
</body>

</html>