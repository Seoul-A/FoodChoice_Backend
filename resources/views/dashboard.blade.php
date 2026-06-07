<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Food Choice</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    <style>

        *{
            font-family:'Inter', sans-serif;
        }

        body{
            background:#f4f4f4;
            margin:0;
        }

        .food-card{
            transition:
            transform .25s ease,
            box-shadow .25s ease;
        }

        .food-card:hover{
            transform:
            translateY(-5px);

            box-shadow:
            0 12px 25px rgba(
                0,0,0,.15
            );
        }
        .food-card-pref:hover

        .food-hover-img{
            transform:
            scale(1.08);
        }

        .food-grid{
            display:grid;
            grid-template-columns:
            repeat(3,1fr);
            gap:40px;
        }

        /* desktop */
        .food-grid
        > div:last-child:nth-child(10){

            grid-column:
            2 / 3;
        }

        /* tablet */
        @media(
        max-width:1100px
        ){

            .food-grid{
                grid-template-columns:
                repeat(2,1fr);
            }

            /* reset supaya normal */
            .food-grid
            > div:last-child:nth-child(10){

                grid-column:auto;
                justify-self:stretch;
                width:100%;
            }
        }

        /* mobile */
        @media(
        max-width:700px
        ){

            .food-grid{
                grid-template-columns:
                1fr;
            }
        }

        .sidebar{
            transition:.3s ease;
        }

    </style>

</head>

<body>

<!-- OVERLAY -->
<div
    id="overlay"
    onclick="closeSidebar()"
    class="fixed inset-0 bg-black/40 z-40 hidden"
></div>

<!-- SIDEBAR -->
<div
    id="sidebar"
    class="sidebar fixed top-0 left-[-300px] h-full w-[280px] bg-white shadow-2xl z-50"
>

    <div
        class="flex justify-between items-center p-6 border-b"
    >

        <h2
            class="font-bold text-xl text-[#9A3E35]"
        >
            FOOD CHOICE
        </h2>

        <button
            onclick="closeSidebar()"
        >
            <i
                class="fa-solid fa-xmark text-lg"
            ></i>
        </button>

    </div>

    <div class="p-5 space-y-3">

        <a
            href="/dashboard"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100 text-[#9A3E35] font-medium"
        >
            <i class="fa-solid fa-house"></i>
            Home
        </a>

        <a
            href="/preferences"
            class="
            flex items-center
            gap-4
            p-4
            rounded-2xl
            hover:bg-gray-100
            "
        >
            <i class="fa-solid fa-utensils"></i>
            Daftar Makanan
        </a>

        <a
            href="/history-like"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-heart"></i>
            Riwayat Suka
        </a>

        <a
            href="/spinner"
            class="
            flex items-center
            gap-4
            p-4
            rounded-2xl
            hover:bg-gray-100
            "
        >
            <i class="fa-solid fa-dice"></i>
            Spinner
        </a>

        <a
            href="/profile"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-user"></i>
            Profile
        </a>

    </div>

</div>

<!-- HEADER -->
<header
    class="bg-white h-[90px] border-b sticky top-0 z-30"
>

    <div
        class="relative max-w-7xl mx-auto h-full flex items-center px-5"
    >

        <!-- HAMBURGER -->
        <button
            onclick="openSidebar()"
            class="z-20"
        >

            <span
                style="
                    font-size:32px;
                    color:#8B0000;
                    font-weight:300;
                    line-height:1;
                    font-family:Arial,sans-serif;
                    margin-top:-4px;
                    display:block;
                "
            >
                ☰
            </span>

        </button>

        <!-- LOGO CENTER -->
        <div
            class="absolute left-1/2 -translate-x-1/2"
        >

            <a href="/dashboard">
            <img
                src="{{ asset('image/logo.svg') }}"
                class="
                h-[55px]
                mt-[4px]
                object-contain
                cursor-pointer
                "
            >
        </a>

        </div>

    </div>

</header>


<!-- HERO -->
<section
    class="
    relative
    w-full
    h-[500px]
    lg:h-[620px]
    overflow-hidden
    "
>

    <!-- BACKGROUND -->
    <img
        src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
        class="
        absolute inset-0
        w-full h-full
        object-cover
        "
    >

    <!-- DARK OVERLAY -->
    <div
        class="
        absolute inset-0
        bg-black/55
        "
    ></div>

    <!-- CONTENT -->
    <div
        class="
        relative z-10
        h-full
        flex flex-col
        items-center
        justify-center
        text-center
        px-6
        "
    >

        <div
            class="max-w-[850px]"
        >

            <!-- TITLE -->
            <h1
                class="
                text-[38px]
                md:text-[50px]
                font-extrabold
                text-white
                leading-[1.1]
                tracking-tight
                "
            >
                Temukan Makanan <br>
                Sesuai Selera Kamu
            </h1>

            <!-- DESC -->
            <p
                class="
                mt-6
                text-[17px]
                md:text-[16px]
                text-white/85
                leading-relaxed
                max-w-[760px]
                mx-auto
                "
            >
                Pilih preferensi seperti rasa,
                bahan, dan jenis makanan
                untuk mendapatkan <br>rekomendasi
                makanan terbaik sesuai selera kamu.
            </p>

            <!-- BUTTON -->
            <div
                class="flex justify-center mt-10"
            >

                <a
                href="/preferences"
                class="
                bg-[#B3271A]
                hover:bg-[#962116]
                transition
                rounded-full
                px-8 py-4
                flex items-center
                gap-3
                shadow-xl
                text-white
                text-[17px]
                font-medium
                hover:scale-105
                w-fit
                no-underline
                "
            >

                <img
                    src="{{ asset('image/logo2.png') }}"
                    class="
                    w-7 h-7
                    object-contain
                    "
                >

                klik untuk mulai mencari

</a>

            </div>

        </div>

    </div>

</section>


<!-- CONTENT -->
<section
    class="max-w-7xl mx-auto px-5 lg:px-8 py-14"
>

    <div class="text-center mb-10">

        <h2
            class="text-3xl font-bold text-[#9A3E35]"
        >
            10 MENU TERATAS
        </h2>

        <p
            class="text-gray-500 mt-2"
        >
            Berdasarkan jumlah like
        </p>

    </div>

    <!-- GRID -->
    <div
        id="foodList"
        class="food-grid"
    >

        <div
            class="col-span-full text-center text-gray-500"
        >
            Memuat makanan...
        </div>

    </div>

    

</section>

<!-- CTA SECTION -->
<section
    class="
    relative
    mt-20
    w-full
    overflow-hidden
    "
>

    <div
        class="
        relative
        bg-[#AF5D50]
        rounded-t-[300px]
        overflow-hidden
        w-full

        flex
        flex-col
        items-center

        pt-20
        h-[500px]
        md:pb-[420px]
        lg:h-[500px]
        "
    >

        <!-- BUTTON -->
        <a
            href="/spinner"
            class="
            relative
            z-30
            -mt-0

            bg-[#EFE247]
            hover:scale-105
            transition
            rounded-full

            px-8
            md:px-12
            py-4

            shadow-lg
            text-black
            text-[16px]
            md:text-[18px]
            font-medium
            "
        >
            Putar Spinner
        </a>

    <img
        src="{{ asset('image/latar.png') }}"
        class="
        absolute

        left-1/2
        -translate-x-1/2

        bottom-[-100px]
        sm:bottom-[-130px]
        md:bottom-[-1700px]
        lg:bottom-[-220px]

        w-[150%]
        sm:w-[130%]
        md:w-[110%]
        lg:w-[1200px]

        max-w-none
        object-contain
        pointer-events-none
        z-10
        "
        alt="background makanan"
    />

    </div>

</section>


<!-- FOOTER -->
<footer
    class="
    bg-[#3A3A3A]
    text-white
    text-center
    py-10
    "
>

    <p class="text-sm">
        ⚙ Sistem Rekomendasi Berbasis Preferensi
    </p>

    <p
        class="text-sm text-gray-300 mt-1"
    >
        made by <br>
        kelompok 9
    </p>

</footer>


<script>

const token =
    localStorage.getItem(
        'token'
    );

let foods = [];

function openSidebar(){

    document
    .getElementById(
        'sidebar'
    )
    .style.left = '0';

    document
    .getElementById(
        'overlay'
    )
    .classList.remove(
        'hidden'
    );
}

function closeSidebar(){

    document
    .getElementById(
        'sidebar'
    )
    .style.left = '-300px';

    document
    .getElementById(
        'overlay'
    )
    .classList.add(
        'hidden'
    );
}

async function fetchFoods(){

    try{

        const response =
            await fetch(
            '/api/foods?sort=popular',
        {
            headers:{
                Authorization:
                    `Bearer ${token}`,
                Accept:
                    'application/json'
            }
        });

        const data =
            await response.json();

        console.log(
            data
        );

        foods =
            data.data
            .slice(
                0,
                10
            );

        renderFoods(
            foods
        );

    }catch(error){

        console.error(
            error
        );

        document
        .getElementById(
            'foodList'
        )
        .innerHTML =
        `
        <div class="
            col-span-full
            text-center
            text-red-500
        ">
            Gagal memuat makanan
        </div>
        `;
    }
}

async function toggleLike(id){

    try{

        const response =
            await fetch(
            `/api/foods/${id}/like`,
        {
            method:'POST',

            headers:{
                Authorization:
                    `Bearer ${token}`,
                Accept:
                    'application/json'
            }
        });

        const data =
            await response.json();

        const foodIndex =
            foods.findIndex(
                food =>
                food.id === id
            );

        if(
            foodIndex !== -1
        ){

            foods[
                foodIndex
            ].is_liked =
                data.is_liked;

            foods[
                foodIndex
            ].likes_count =
                data.likes_count;
        }

        renderFoods(
            foods
        );

    }catch(error){

        console.log(
            error
        );
    }
}

function renderFoods(
    foods
){

    const container =
        document.getElementById(
            'foodList'
        );

    let html = '';

    foods.forEach(
    (food,index)=>{

        const rank =
            index + 1;

        html += `
        <div
        class="food-card-pref"
        style="
        background:white;
        border-radius:28px;
        overflow:hidden;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);
        transition:.3s;
        display:flex;
        flex-direction:column;
        min-height:100%;
        "
        onmouseover="
            this.style.transform='translateY(-5px)';
            this.style.boxShadow='0 12px 25px rgba(0,0,0,0.15)';
        "
        onmouseout="
            this.style.transform='translateY(0)';
            this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)';
        "
        >

            <div
            class="food-image"
            style="
            position:relative;
            overflow:hidden;
            "
            >

                <img
                    src="${food.image_url}"
                    alt="${food.name}"
                    class="food-hover-img"
                    style="
                    width:100%;
                    height:240px;
                    object-fit:cover;
                    transition:.4s;
                    "
                >

                <div
                style="
                    position:absolute;
                    top:16px;
                    left:16px;
                    background:#8B0000;
                    color:white;
                    padding:10px 16px;
                    border-radius:999px;
                    font-weight:bold;
                "
                >
                    #${rank}
                </div>

            </div>

            <div
            style="
            padding:18px;
            display:flex;
            flex-direction:column;
            flex-grow:1;
            "
            >

                <div
                style="
                font-size:24px;
                font-weight:bold;
                margin-bottom:18px;
                margin-top:5px;
                color:#222;
                "
                >
                    ${food.name}
                </div>

                <div>

                    ${food.tags.map(
                    tag => `

                    <span
                    style="
                        display:inline-block;
                        padding:9px 12px;
                        border-radius:20px;
                        font-size:14px;
                        margin-right:6px;
                        margin-bottom:8px;
                        font-weight:500;
                        box-shadow:
                        0 3px 8px rgba(
                            0,0,0,0.08
                        );

                        ${
                            tag.type ===
                            'tipe'
                            ? `
                            background:#e5e5e5;
                            color:#444;
                            `
                            : ''
                        }

                        ${
                            tag.type ===
                            'jenis'
                            ? `
                            background:#d8f5d0;
                            color:#3c7a2a;
                            `
                            : ''
                        }

                        ${
                            tag.type ===
                            'rasa'
                            ? `
                            background:#ffd6d6;
                            color:#b30000;
                            `
                            : ''
                        }

                        ${
                            tag.type ===
                            'bahan_utama'
                            ? `
                            background:#ffe8cc;
                            color:#a35b00;
                            `
                            : ''
                        }
                    "
                    >
                        ${tag.name}
                    </span>

                    `
                    ).join('')}

                </div>

                <div
                style="
                    display:flex;
                    justify-content:flex-end;
                    align-items:center;
                    margin-top:auto;
                "
                >

                    <button
                        onclick="
                        toggleLike(
                        ${food.id}
                        )
                        "
                        style="
                            font-size:28px;
                            border:none;
                            background:none;
                            cursor:pointer;
                            color:#8B0000;
                            transition:.2s;
                        "
                    >

                        ${
                            food.is_liked
                            ? '♥'
                            : '♡'
                        }

                    </button>

                    <span
                    style="
                    margin-left:6px;
                    "
                    >
                        ${
                            food.likes_count
                            ?? 0
                        }
                    </span>

                </div>

            </div>

        </div>
        `;
    });

    container.innerHTML =
        html;
}

function renderPagination(
    data
){

    const pagination =
        document.getElementById(
            'pagination'
        );

    pagination.innerHTML='';

    for(let i=1;
        i<=data.last_page;
        i++){

        pagination.innerHTML += `
            <button
                onclick="changePage(${i})"
                class="
                w-11 h-11 rounded-full
                ${
                    i===data.current_page
                    ? 'bg-[#9A3E35] text-white'
                    : 'bg-white'
                }
                custom-shadow
                "
            >
                ${i}
            </button>
        `;
    }
}

function changePage(
    page
){

    currentPage =
        page;

    fetchFoods(page);
}

fetchFoods();

</script>

</body>
</html>
