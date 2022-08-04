<body>
    <div class="mt-24">
        <div class="w-full p-3">
            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Edit Profil</h1>

            <div class="w-1/2 m-auto">
                <?= form_open_multipart('user/edit') ?>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                    <input type="text" id="email" name="email" value="<?= $user['email'] ?>" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="<?= $user['name'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- Text Error -->
                    <small class="text-red-600 font-montserrat duration-300">
                        <?= form_error('name') ?>
                    </small>
                </div>

                <div class="flex flex-row justify-between items-center">
                    <div class="w-3/12">
                        <img src=" <?= base_url('assets/img/profil/') . $user['image'] ?>" class="w-20 m-auto">
                    </div>
                    <div class="w-9/12">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Unggah File</label>
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar">
                    </div>
                </div>

                <button type="submit" class="w-full py-3 px-20 m-auto bg-primaryColor rounded-full text-white font-bold uppercase text-lg mt-5 transform hover:translate-y-1 transition-all duration-300">Simpan</button>

                </form>
            </div>


        </div>

    </div>
</body>