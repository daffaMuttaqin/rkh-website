<div class="lg:mt-44 md:mt-10 mt-16 bg-amber-800">
    <div class="w-full px-5">
        <div class="text-white grid lg:grid-cols-4 md:grid-cols-4 grid-cols-1 grid-flow-row gap-1 gap-y-3 pb-8 w-full">
            <div class="mt-14">
                <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Adaro Agro" class="h-20 m-auto pb-2">
                <div class="flex m-autu justify-center mt-4">
                    <a href="https://www.instagram.com/rumahkuehaviyya/">
                        <img src="<?= base_url('assets/img/icon/instagram.png') ?>" alt="Instagram" class="h-8 mx-5 hover:scale-110 duration-200">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=6285156277582">
                        <img src="<?= base_url('assets/img/icon/whatsapp.png') ?>" alt="Whatsapp" class="h-8 scale-125  mt-1 mx-5 hover:scale-150 duration-200">
                    </a>
                </div>
            </div>
            <div class="flex flex-col mt-14 font-montserrat font-normal text-sm text-left">
                <div class="font-montserrat text-base font-extrabold pb-2">Rumah Kue Haviyya</div>
                <a href="<?= base_url('user/tentang') ?>" class="pb-2 w-fit text-sm hover:scale-110 duration-300">Tentang</a>
                <a href="<?= base_url('user/testimoni') ?>" class="w-fit text-sm hover:scale-110 duration-300">Testimoni</a>
            </div>
            <div class="flex flex-col mt-14 font-montserrat font-normal text-sm text-left">
                <div class="font-montserrat text-base font-extrabold pb-2">Produk</div>
                <a href="<?= base_url('user/produk#brownies') ?>" class="pb-2 w-fit text-sm hover:scale-110 duration-300">Brownies</a>
                <a href="<?= base_url('user/produk#cookies') ?>" class="pb-2 w-fit text-sm hover:scale-110 duration-300">Cookies</a>
                <a href="<?= base_url('user/produk#pie') ?>" class="pb-2 w-fit text-sm hover:scale-110 duration-300">Pie</a>
            </div>
            <div class="mt-14  w-fit">
                <div class="grid grid-cols-5 grid-flow-row gap-1">
                    <div class="justify-self-start">
                        <img src="<?= base_url('assets/img/icon/location.png') ?>" alt="Location" class="w-6 m-auto">
                    </div>
                    <div class="font-montserrat font-normal text-sm text-left col-span-4">
                        Jl. Ampera I No.28a, Sei Sikambing C. II, Kec. Medan Helvetia, Kota Medan, Sumatera Utara 20123
                    </div>
                    <div class="justify-self-start">
                        <img src="<?= base_url('assets/img/icon/whatsapp.png') ?>" alt="Whatsapp" class="w-10 -ml-1 scale-110 m-auto">
                    </div>
                    <div class="font-montserrat font-normal text-sm text-left col-span-4">
                        +62 851 5627 7582
                    </div>
                    <div class="justify-self-start">
                        <img src="<?= base_url('assets/img/icon/instagram.png') ?>" alt="Instagram" class="w-6 m-auto">
                    </div>
                    <div class="font-montserrat font-normal text-sm text-left col-span-4">
                        rumahkuehaviyya
                    </div>
                    <div></div>
                    <div class="text-white font-montserrat font-normal text-sm text-left col-span-4 hover:scale-110 duration-300">
                        <a href="https://maps.app.goo.gl/DpXtbbfFnw8djSw99">
                            <div>MAP & DIRECTION</div>
                            <div class="bg-white w-full inset-0 h-1 rounded-lg"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="inset-0 lg:h-0.5 h-0.5 rounded w-full bg-gray-200 px-8 bg-opacity-80 my-3"></div>
        </div>
        <div class="text-white font-montserrat font-normal text-center text-xs text-opacity-80">
            <div class="mb-2">
                © 2022 <span class="font-bold">Rumah Kue Haviyya</span>
            </div>
            <div class="pb-14">
                Copyright© 2022 All Right Reserved
            </div>
        </div>
    </div>
</div>

<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 600,
    });
</script>

<!-- FLOWBITE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script> -->
<!-- <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script> -->

<!-- TAILWIND MATERIAL -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>

</body>


</html>