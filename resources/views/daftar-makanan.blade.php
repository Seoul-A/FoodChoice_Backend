@extends('layouts.app')

@section('content')

<style>

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

    .custom-shadow{
        box-shadow:
        0 8px 25px rgba(
            0,0,0,.08
        );
    }

</style>

<!-- CONTENT -->
<section
    class="
    max-w-7xl
    mx-auto
    px-5
    lg:px-8
    py-14
    "
>

    <!-- TITLE -->
    <div class="text-center mb-10">

        <h1
            class="
            text-3xl
            md:text-5xl
            font-extrabold
            text-[#9A3E35]
            "
        >
            DAFTAR MAKANAN
        </h1>

        <p
            class="
            text-gray-500
            mt-3
            "
        >
            Temukan semua makanan favoritmu
        </p>

    </div>

    <!-- GRID -->
    <div
        id="foodList"
        class="
        grid
        grid-cols-1
        md:grid-cols-2
        xl:grid-cols-3
        gap-10
        "
    >

        <div
            class="
            col-span-full
            text-center
            text-gray-500
            "
        >
            Memuat makanan...
        </div>

    </div>

    <!-- PAGINATION -->
    <div
        id="pagination"
        class="
        flex
        justify-center
        gap-3
        mt-14
        flex-wrap
        "
    ></div>

</section>

<script>

const token =
    localStorage.getItem(
        'token'
    );

let currentPage = 1;

async function fetchFoods(
    page = 1
){

    try{

        const response =
            await fetch(
            `/api/foods?page=${page}`,
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

        renderFoods(
            data.data || []
        );

        renderPagination(
            data
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

function renderFoods(
    foods
){

    const container =
        document.getElementById(
            'foodList'
        );

    container.innerHTML = '';

    if(!foods.length){

        container.innerHTML =
        `
        <div
            class="
            col-span-full
            text-center
            text-gray-500
            "
        >
            Tidak ada makanan
        </div>
        `;

        return;
    }

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

            <div
                class="
                food-card
                bg-white
                rounded-[28px]
                overflow-hidden
                custom-shadow
                "
            >

                <div class="relative">

                    <img
                        src="${
                            food.image_url
                            ?? 'https://via.placeholder.com/400'
                        }"
                        class="
                        w-full
                        h-[240px]
                        object-cover
                        "
                    >

                    <div
                        class="
                        absolute
                        top-4
                        left-4
                        bg-[#9A3E35]
                        text-white
                        px-4
                        py-2
                        rounded-full
                        font-semibold
                        "
                    >
                        #${rank}
                    </div>

                </div>

                <div class="p-5">

                    <div
                        class="
                        flex
                        justify-between
                        "
                    >

                        <div>

                            <h3
                                class="
                                text-xl
                                font-bold
                                text-gray-800
                                "
                            >
                                ${food.name}
                            </h3>

                            <div
                                class="
                                flex
                                flex-wrap
                                gap-2
                                mt-3
                                "
                            >
                                ${tags}
                            </div>

                        </div>

                        <div
                            class="
                            text-center
                            shrink-0
                            "
                        >

                            <i
                                class="
                                fa-regular
                                fa-heart
                                text-[#9A3E35]
                                text-xl
                                "
                            ></i>

                            <p
                                class="
                                text-sm
                                text-gray-500
                                mt-1
                                "
                            >
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

    for(
        let i = 1;
        i <= data.last_page;
        i++
    ){

        pagination.innerHTML += `
            <button
                onclick="
                    changePage(${i})
                "
                class="
                w-11
                h-11
                rounded-full
                transition
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

    fetchFoods(
        page
    );

    window.scrollTo({

        top:0,

        behavior:'smooth'

    });
}

fetchFoods();

</script>

@endsection