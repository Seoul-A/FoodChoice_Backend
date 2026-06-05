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
            translateY(-6px);

            box-shadow:
            0 16px 35px rgba(
                0,0,0,.10
            );
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
            href="/daftar-makanan"
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
            href="/preferences"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-sliders"></i>
            Filter
        </a>

        <a
            href="/search"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-magnifying-glass"></i>
            Cari
        </a>

        <a
            href="/history-like"
            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-heart"></i>
            Riwayat Like
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
                makanan terbaik sesuai selera.
            </p>

            <!-- BUTTON -->
            <div
                class="flex justify-center mt-10"
            >

                <button
                    onclick="openSearchPopup()"
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

                </button>

            </div>

        </div>

    </div>

</section>

<!-- SEARCH POPUP -->
<div
    id="searchPopup"
    class="
    fixed inset-0
    bg-black/50
    hidden
    justify-center
    items-center
    z-[999]
    px-5
    "
>

    <div
        class="
        bg-[#F4F4F4]
        rounded-[50px]
        w-full
        max-w-[650px]
        py-14
        px-8
        relative
        "
    >

        <!-- CLOSE -->
        <button
            onclick="closeSearchPopup()"
            class="
            absolute
            top-5
            right-8
            text-4xl
            text-gray-400
            hover:text-black
            "
        >
            ×
        </button>

        <!-- TITLE -->
        <h2
            class="
            text-center
            text-3xl
            md:text-5xl
            font-bold
            mb-12
            "
        >
            cari berdasarkan ?
        </h2>

        <!-- OPTION -->
        <div
            class="
            flex
            flex-col
            md:flex-row
            justify-center
            gap-8
            "
        >

            <!-- SEARCH -->
            <a
                href="/search"
                class="
                border
                border-[#7A1D16]
                rounded-[35px]
                w-[180px]
                h-[180px]
                flex
                flex-col
                items-center
                justify-center
                hover:bg-white
                transition
                mx-auto
                "
            >

                <i
                    class="
                    fa-solid
                    fa-magnifying-glass
                    text-[60px]
                    text-[#65160F]
                    "
                ></i>

                <p
                    class="
                    mt-5
                    text-center
                    text-gray-700
                    "
                >
                    cari dengan kata kunci
                </p>

            </a>

            <!-- FILTER -->
            <a
                href="/preferences"
                class="
                border
                border-[#7A1D16]
                rounded-[35px]
                w-[180px]
                h-[180px]
                flex
                flex-col
                items-center
                justify-center
                hover:bg-white
                transition
                mx-auto
                "
            >

                <i
                    class="
                    fa-solid
                    fa-filter
                    text-[60px]
                    text-[#65160F]
                    "
                ></i>

                <p
                    class="
                    mt-5
                    text-center
                    text-gray-700
                    "
                >
                    cari dengan filter
                </p>

            </a>

        </div>

    </div>

</div>

<!-- CONTENT -->
<section
    class="max-w-7xl mx-auto px-5 lg:px-8 py-14"
>

    <div class="text-center mb-10">

        <h2
            class="text-3xl font-bold text-[#9A3E35]"
        >
            MENU TERATAS
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
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10"
    >

        <div
            class="col-span-full text-center text-gray-500"
        >
            Memuat makanan...
        </div>

    </div>

    <!-- PAGINATION -->
    <div
        id="pagination"
        class="flex justify-center gap-3 mt-14 flex-wrap"
    ></div>

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
            href="/daftar-makanan"
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
            lihat daftar makanan
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

let currentPage = 1;

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

async function fetchFoods(
    page = 1
){

    try{

        const response =
            await fetch(
            `/api/foods?sort=popular&page=${page}`,
        {
            headers:{
                'Authorization':
                    `Bearer ${token}`,
                'Accept':
                    'application/json'
            }
        });

        const data =
            await response.json();

        console.log(data);

        renderFoods(
            data.data.slice(0,10)
        );

    }catch(error){

        console.error(error);

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

function renderFoods(
    foods
){

    const container =
        document.getElementById(
            'foodList'
        );

    container.innerHTML = '';

    foods.forEach(
    (food,index)=>{

        const rank =
            ((currentPage-1)
            *12)+index+1;

        const tags =
            (food.tags || [])
            .map(tag => `
                <span class="
                    bg-[#EFEFEF]
                    text-gray-600
                    text-xs
                    px-3
                    py-1
                    rounded-full
                ">
                    ${tag.name}
                </span>
            `)
            .join('');


        container.innerHTML += `
            <div class="food-card bg-white rounded-[28px] overflow-hidden custom-shadow">

                <div class="relative">

                    <img
                        src="${food.image_url ?? 'https://via.placeholder.com/400'}"
                        class="w-full h-[240px] object-cover"
                    >

                    <div
                        class="absolute top-4 left-4 bg-[#9A3E35] text-white px-4 py-2 rounded-full font-semibold"
                    >
                        #${rank}
                    </div>

                </div>

                <div class="p-5">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                ${food.name}
                            </h3>

                            <div class="flex flex-wrap gap-2 mt-3">
                                ${tags}
                            </div>

                        </div>

                        <div class="text-center">

                            <i class="fa-regular fa-heart text-[#9A3E35] text-xl"></i>

                            <p class="text-sm text-gray-500 mt-1">
                                ${food.likes_count ?? 0}
                            </p>

                        </div>

                    </div>

                </div>

            </div>
        `;
    });
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

function openSearchPopup(){

    document
    .getElementById(
        'searchPopup'
    )
    .classList.remove(
        'hidden'
    );

    document
    .getElementById(
        'searchPopup'
    )
    .classList.add(
        'flex'
    );
}

function closeSearchPopup(){

    document
    .getElementById(
        'searchPopup'
    )
    .classList.remove(
        'flex'
    );

    document
    .getElementById(
        'searchPopup'
    )
    .classList.add(
        'hidden'
    );
}


</script>

</body>
</html>
