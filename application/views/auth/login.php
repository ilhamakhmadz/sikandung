<?php
$error_message = messages();
?>
<div class="w-full max-w-6xl rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">

    <!-- LEFT -->
    <div class="relative hidden md:block">
        <img src="<?php echo base_url('assets/images/sikandung-hero.png'); ?>"
             class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-br from-primary/80 to-primary2/70"></div>

        <div class="relative z-10 flex flex-col justify-center h-full p-10 text-white">
            <h1 class="text-4xl font-bold mb-3">SIKANDUNG</h1>
            <p class="opacity-90">
                Sistem Informasi Pendataan Perikanan Kabupaten Bandung
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="bg-white dark:bg-slate-900 p-8 md:p-12 flex flex-col justify-center">

        <!-- DARK MODE BUTTON -->
        <div class="flex justify-end mb-4">
            <button type="button" onclick="toggleDark()" class="text-sm text-gray-500 dark:text-gray-300 flex items-center gap-1">
                <i class="fa fa-moon-o"></i> Mode
            </button>
        </div>

        <div class="max-w-md mx-auto w-full">

            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                Login Akun
            </h2>

            <p class="text-gray-500 mb-8 text-sm">
                Masuk untuk mengakses sistem
            </p>

            <?php if (!empty($error_message)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo $error_message; ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="space-y-5">

                <!-- Username -->
                <div>
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Username</label>
                    <div class="flex items-center border rounded-xl px-3 py-2 mt-1 focus-within:ring-2 ring-primary">
                        <input type="text" name="email" id="username"
                            class="w-full outline-none text-sm bg-transparent dark:text-white"
                            placeholder="Masukkan username" required>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Password</label>
                    <div class="flex items-center border rounded-xl px-3 py-2 mt-1 focus-within:ring-2 ring-primary">
                        <input type="password" name="password" id="password"
                            class="w-full outline-none text-sm bg-transparent dark:text-white"
                            placeholder="Masukkan password" required>
                        <button type="button" onclick="togglePassword()" class="text-gray-500 dark:text-gray-300"><i class="fa fa-eye" id="eyeIcon"></i></button>
                    </div>
                </div>

                <!-- Remember + Forgot -->
                <div class="flex justify-between items-center text-sm">
                    <label class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                        <input type="checkbox" name="remember" value="1"> Remember me
                    </label>
                </div>

                <!-- Button -->
                <button type="submit" id="loginBtn"
                    class="w-full bg-gradient-to-r from-primary to-primary2 text-white py-3 rounded-xl font-semibold shadow-lg transition flex items-center justify-center gap-2">
                    <span id="btnText">Login</span>
                </button>

            </form>

            <p class="text-xs text-center text-gray-400 mt-8">
                &copy; <?php echo date('Y'); ?> Diskominfo Kabupaten Bandung
            </p>

        </div>

    </div>

</div>
