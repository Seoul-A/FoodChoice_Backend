<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Choice</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    <style>

        *{
            font-family: 'Inter', sans-serif;
        }

        body{
            background:
            linear-gradient(
                to bottom right,
                #f8f8f8,
                #f3f3f3
            );
        }

    </style>

</head>

<body class="min-h-screen flex items-center justify-center px-4 py-6">

    <!-- CONTAINER -->
    <div
        class="w-full max-w-4xl bg-white rounded-[28px] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.06)] grid lg:grid-cols-2"
    >

        <!-- LEFT SIDE -->
        <div
            class="hidden lg:flex flex-col justify-center text-center text-white relative"
            style="
                background:
                linear-gradient(
                    rgba(177, 92, 74, 0.80),
                    rgba(177, 92, 74, 0.88)
                ),
                url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1974&auto=format&fit=crop');

                background-size: cover;
                background-position: center;
            "
        >

            <!-- CONTENT -->
            <div>

                <h1
                    class="text-4xl font-semibold leading-tight tracking-tight"
                >
                    Food Choice
                </h1>

                <p
                    class="mt-1 text-white/80 text-center text-[15px] leading-1 max-auto"
                >
                    Temukan rekomendasi makanan terbaik
                    berdasarkan preferensi dan selera Anda.
                </p>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div
            class="p-7 lg:p-10 flex items-center bg-white"
        >

            <div class="w-full max-w-sm mx-auto">
                <!-- TITLE -->
                <div class="mb-8">

                    <p
                        class="text-[#b15c4a] text-xs font-semibold tracking-[2px] uppercase mb-3"
                    >
                        Selamat Datang
                    </p>

                    <h2
                        class="text-[32px] font-semibold text-gray-800 tracking-tight"
                    >
                        Masuk Akun
                    </h2>

                    <p
                        class="text-gray-500 mt-2 text-[15px] leading-6"
                    >
                        Masuk untuk melanjutkan ke dashboard Food Choice.
                    </p>

                </div>

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-500">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- FORM -->
                <form
                    id="loginForm"
                    class="space-y-5"
                >

                    @csrf

                    <!-- EMAIL -->
                    <div>

                        <label
                            class="text-sm font-medium text-gray-700 block mb-2"
                        >
                            Email
                        </label>

                        <div class="relative">

                            <i
                                class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"
                            ></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan email"
                                class="w-full h-12 border border-gray-200 rounded-xl pl-11 pr-4 bg-[#fafafa] text-[15px] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                                required
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label
                            class="text-sm font-medium text-gray-700 block mb-2"
                        >
                            Kata Sandi
                        </label>

                        <div class="relative">

                            <i
                                class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"
                            ></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="w-full h-12 border border-gray-200 rounded-xl pl-11 pr-11 bg-[#fafafa] text-[15px] focus:outline-none focus:ring-4 focus:ring-[#b15c4a]/10 focus:border-[#b15c4a] transition"
                                required
                            >

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"
                            >

                                <i
                                    class="fa-regular fa-eye-slash text-sm"
                                    id="eyeIcon"
                                ></i>

                            </button>

                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div
                        class="flex items-center justify-between text-sm"
                    >

                        <label
                            class="flex items-center gap-2 text-gray-500"
                        >

                            <input
                                type="checkbox"
                                class="accent-[#b15c4a]"
                            >

                            Ingat saya

                        </label>

                        <a
                            href="#"
                            class="text-[#b15c4a] font-medium hover:underline"
                        >
                            Lupa kata sandi?
                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full h-12 rounded-xl bg-[#b15c4a] hover:bg-[#9f4f3e] text-white font-medium transition duration-300 shadow-lg shadow-[#b15c4a]/10"
                    >
                        Login
                    </button>

                </form>

                <!-- REGISTER -->
                <p
                    class="text-center text-gray-500 text-sm mt-7"
                >

                    Belum punya akun?

                    <a
                        href="/register"
                        class="text-[#b15c4a] font-semibold hover:underline"
                    >
                        Daftar
                    </a>

                </p>

            </div>

        </div>

    </div>

<script>

function togglePassword(){

    const password =
        document.getElementById(
            'password'
        );

    const eyeIcon =
        document.getElementById(
            'eyeIcon'
        );

    if(password.type === 'password'){

        password.type = 'text';

        eyeIcon.classList.remove(
            'fa-eye-slash'
        );

        eyeIcon.classList.add(
            'fa-eye'
        );

    }else{

        password.type = 'password';

        eyeIcon.classList.remove(
            'fa-eye'
        );

        eyeIcon.classList.add(
            'fa-eye-slash'
        );
    }
}


// LOGIN
document
.getElementById('loginForm')
.addEventListener(
'submit',
async function(e){

    e.preventDefault();

    const email =
        document.getElementById(
            'email'
        ).value;

    const password =
        document.getElementById(
            'password'
        ).value;

    try{

        const response =
            await fetch(
            '/api/login',
            {
                method:'POST',

                headers:{
                    'Content-Type':
                        'application/json',

                    'Accept':
                        'application/json'
                },

                body: JSON.stringify({
                    email,
                    password
                })
            });

        const data =
            await response.json();

        console.log(data);

        if(response.ok){

            // simpan token
            localStorage.setItem(
                'token',
                data.token
            );

            // simpan user
            localStorage.setItem(
                'user',
                JSON.stringify(
                    data.user
                )
            );

            // redirect dashboard
            window.location.href =
                '/dashboard';

        }else{

            // error validasi laravel
            if(data.errors){

                const error =
                    Object.values(
                        data.errors
                    )[0][0];

                alert(error);

                return;
            }

            alert(
                data.message ??
                'Login gagal'
            );
        }

    }catch(error){

        console.error(error);

        alert(
            'Terjadi kesalahan server'
        );
    }
});
</script>
</body>
</html>