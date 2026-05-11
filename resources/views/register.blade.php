<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Food Choice - Register</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    <style>

        *{
            font-family: 'Inter', sans-serif;
        }

    </style>

</head>

<body class="bg-[#f7f7f7] min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-6xl bg-white rounded-[32px] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.06)] grid lg:grid-cols-2">

        <!-- LEFT -->
        <div
            class="hidden lg:flex flex-col justify-between p-12 text-white relative"
            style="
                background:
                linear-gradient(
                    rgba(177, 92, 74, 0.82),
                    rgba(177, 92, 74, 0.88)
                ),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1974&auto=format&fit=crop');

                background-size: cover;
                background-position: center;
            "
        >

            <div>

                <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center backdrop-blur-sm">

                    <i class="fa-solid fa-utensils text-xl"></i>

                </div>

            </div>

            <div>

                <h1 class="text-5xl font-bold leading-tight">
                    Join Food
                    Choice
                </h1>

                <p class="mt-6 text-white/85 text-base leading-8 max-w-sm">
                    Buat akun dan mulai eksplorasi berbagai rekomendasi
                    makanan terbaik sesuai selera Anda.
                </p>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="p-8 lg:p-14 flex items-center">

            <div class="w-full max-w-md mx-auto">

                <!-- MOBILE LOGO -->
                <div class="lg:hidden flex justify-center mb-10">

                    <div class="w-16 h-16 rounded-2xl bg-[#b15c4a] flex items-center justify-center text-white shadow-lg">

                        <i class="fa-solid fa-utensils text-xl"></i>

                    </div>

                </div>

                <!-- TITLE -->
                <div class="mb-10">

                    <p class="text-[#b15c4a] text-sm font-semibold tracking-[2px] uppercase mb-3">
                        Buat Akun
                    </p>

                    <h2 class="text-4xl font-bold text-gray-800">
                        Daftar Akun
                    </h2>

                    <p class="text-gray-500 mt-3 leading-7">
                        Daftarkan akun baru untuk mulai menggunakan Food Choice.
                    </p>

                </div>

                <!-- FORM -->
                <form id="registerForm" class="space-y-5">

                    <!-- NAME -->
                    <div>

                        <label class="text-sm font-medium text-gray-700 block mb-2">
                            Nama Lengkap
                        </label>

                        <div class="relative">

                            <i class="fa-regular fa-user absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="text"
                                id="name"
                                placeholder="Masukkan nama lengkap"
                                class="w-full h-14 border border-gray-200 rounded-2xl pl-12 pr-4 bg-[#fafafa] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                            >

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="text-sm font-medium text-gray-700 block mb-2">
                            Email
                        </label>

                        <div class="relative">

                            <i class="fa-regular fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="email"
                                id="email"
                                placeholder="Masukkan email"
                                class="w-full h-14 border border-gray-200 rounded-2xl pl-12 pr-4 bg-[#fafafa] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="text-sm font-medium text-gray-700 block mb-2">
                            Kata Sandi
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="password"
                                id="password"
                                placeholder="Masukkan password"
                                class="w-full h-14 border border-gray-200 rounded-2xl pl-12 pr-12 bg-[#fafafa] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password', 'eyeIcon1')"
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400"
                            >

                                <i class="fa-regular fa-eye-slash" id="eyeIcon1"></i>

                            </button>

                        </div>

                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div>

                        <label class="text-sm font-medium text-gray-700 block mb-2">
                            Konfirmasi Kata Sandi
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="password"
                                id="confirmPassword"
                                placeholder="Konfirmasi password"
                                class="w-full h-14 border border-gray-200 rounded-2xl pl-12 pr-12 bg-[#fafafa] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('confirmPassword', 'eyeIcon2')"
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400"
                            >

                                <i class="fa-regular fa-eye-slash" id="eyeIcon2"></i>

                            </button>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full h-14 rounded-2xl bg-[#b15c4a] hover:bg-[#9f4f3e] text-white font-semibold transition duration-300"
                    >
                        Buat Akun
                    </button>

                </form>

                <!-- MESSAGE -->
                <div
                    id="message"
                    class="mt-5 text-center text-sm"
                ></div>

                <!-- LOGIN -->
                <p class="text-center text-gray-500 text-sm mt-8">

                    Sudah punya akun?

                    <a
                        href="/login"
                        class="text-[#b15c4a] font-semibold hover:underline"
                    >
                        Masuk
                    </a>

                </p>

            </div>

        </div>

    </div>

    <script>

        function togglePassword(inputId, iconId){

            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if(input.type === 'password'){

                input.type = 'text';

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');

            }else{

                input.type = 'password';

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        const form = document.getElementById('registerForm');
        const message = document.getElementById('message');

        form.addEventListener('submit', async function(e){

            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if(password !== confirmPassword){

                message.innerHTML =
                    '<span class="text-red-500">Password tidak sama</span>';

                return;
            }

            message.innerHTML = 'Loading...';

            try{

                // GANTI API REGISTER
                const response = await fetch('/api/register', {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },

                    body: JSON.stringify({
                        name,
                        email,
                        password,
                        password_confirmation: confirmPassword
                    })

                });

                const data = await response.json();

                if(response.ok){

                    message.innerHTML =
                        '<span class="text-green-500">Register berhasil</span>';

                    setTimeout(() => {

                        window.location.href = '/login';

                    }, 1000);

                }else{

                    message.innerHTML =
                        '<span class="text-red-500">' +
                        (data.message || 'Register gagal') +
                        '</span>';
                }

            }catch(error){

                console.log(error);

                message.innerHTML =
                    '<span class="text-red-500">Server Error</span>';
            }

        });

    </script>

</body>
</html>