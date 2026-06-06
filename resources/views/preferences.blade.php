@extends('layouts.app')

@section('content')

<style>

    html,
    body{
        margin:0;
        padding:0;
        overflow-x:hidden;
    }

    body{
        font-family:Arial, sans-serif;
        background:#f4f4f4;
    }

    .title{
        font-size:28px;
        font-weight:bold;
        margin-top:10px;
        margin-bottom:7px;
    }

    .subtitle{
        color:black;
        margin-bottom:30px;
        font-size:18px;
    }

    .box{
        background:white;
        padding:20px;
        border-radius:18px;
        margin-bottom:20px;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);
        transition:0.3s;
    }

    .box:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 18px rgba(0,0,0,0.12);
    }

    .box-title{
        display:flex;
        align-items:center;
        gap:8px;
        font-weight:bold;
        margin-bottom:15px;
        font-size:22px;
    }

    .btn{
        padding:10px 16px;
        border:none;
        border-radius:20px;
        background:#e5e5e5;
        cursor:pointer;
        margin:5px;
        transition:0.2s;
        font-size:15px;
        font-weight:500;

        box-shadow:
        3px 3px 8px rgba(0,0,0,0.08),
        -2px -2px 5px rgba(255,255,255,0.7);
    }

    .btn:hover{
        transform:scale(1.06) translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.15);
    }

    .btn:active{
        transform:scale(0.92);
    }

    .active{
        background:#a31212;
        color:white;
        box-shadow:0 4px 12px rgba(163,18,18,0.3);
    }

    .search-btn{
        width:100%;
        padding:16px 28px;
        border:none;
        border-radius:35px;
        background:#a31212;
        color:white;
        font-size:17px;
        font-weight:bold;
        cursor:pointer;
        margin:30px auto 0;

        box-shadow:0 6px 15px rgba(163,18,18,0.25);

        display:flex;
        align-items:center;
        justify-content:center;
        gap:12px;

        transition:0.25s;
    }

    .search-btn:hover{
        background:#8d0f0f;
        transform:translateY(-2px);
    }

    .search-btn:active{
        transform:scale(0.96);
    }

    .search-btn-icon{
        width:18px;
        height:18px;
        border:3px solid white;
        border-radius:50%;
        position:relative;
        display:inline-block;
        box-sizing:border-box;
    }

    .search-btn-icon::after{
        content:'';
        position:absolute;
        width:10px;
        height:3px;
        background:white;
        border-radius:10px;
        transform:rotate(45deg);
        right:-7px;
        bottom:-3px;
    }

    .reset-btn{

        padding:16px 26px;

        border:none;
        border-radius:35px;

        background:white;

        font-size:16px;
        font-weight:bold;

        cursor:pointer;

        box-shadow:
        0 6px 15px rgba(
            0,0,0,.08
        );

        transition:
        .25s ease;
    }

    .reset-btn:hover{

        transform:
        translateY(-2px);

        background:#f9f9f9;

        box-shadow:
        0 10px 20px rgba(
            0,0,0,.12
        );
    }

    .reset-btn:active{

        transform:
        scale(.96);
    }

    .result-title{
        font-size:30px;
        font-weight:bold;
        margin-top:70px;
        margin-bottom:30px;
    }

    .grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:25px;
    }

    .card{
        background:white;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);

        transition:0.3s;

        display:flex;
        flex-direction:column;
        height:100%;
    }

    .card:hover{
        transform:translateY(-5px);
        box-shadow:0 12px 25px rgba(0,0,0,0.15);
    }

    .card-image{
        overflow:hidden;
    }

    .card img{
        width:100%;
        height:250px;
        object-fit:cover;
        transition:0.4s;
    }

    .card:hover img{
        transform:scale(1.08);
    }

    .card-body{
        padding:18px;
        display:flex;
        flex-direction:column;
        flex-grow:1;
    }

    .food-name{
        font-size:24px;
        font-weight:bold;
        margin-bottom:18px;
        margin-top:5px;
        color:#222;
    }

    .tag{
        display:inline-block;
        padding:9px 14px;
        border-radius:20px;
        font-size:14px;
        margin-right:6px;
        margin-bottom:8px;
        font-weight:500;
        box-shadow:0 3px 8px rgba(0,0,0,0.08);
    }

    .tag-tipe{
        background:#e5e5e5;
        color:#444;
    }

    .tag-bahan_utama{
        background:#ffe8cc;
        color:#a35b00;
    }

    .tag-jenis{
        background:#d8f5d0;
        color:#3c7a2a;
    }

    .tag-rasa{
        background:#ffd6d6;
        color:#b30000;
    }

    .like-area{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        margin-top:auto;
        padding-top:18px;
        gap:8px;
    }

    .like-btn{
        border:none;
        background:none;
        cursor:pointer;
        transition:0.2s;
    }

    .like-btn:hover{
        transform:scale(1.15);
    }

    .empty-state{
        background:white;
        padding:25px;
        border-radius:18px;
        grid-column:1 / -1;
        text-align:center;
        box-shadow:0 4px 12px rgba(0,0,0,0.08);
    }

    @media(max-width:1100px){

        .grid{
            grid-template-columns:repeat(2,1fr);
        }
    }

    @media(max-width:700px){

        .grid{
            grid-template-columns:1fr;
        }

        .food-name{
            font-size:20px;
        }
    }

</style>

<div class="title">
    Pilih Preferensi Kamu
</div>

<div class="subtitle">
    Cari makanan sesuai selera kamu
</div>

<div
style="
margin-bottom:30px;
"
>

    <input
        type="text"
        id="keyword"
        placeholder="Cari makanan..."
        style="
        width:100%;
        padding:18px 24px;
        border:none;
        border-radius:20px;
        font-size:16px;
        box-sizing:border-box;
        outline:none;
        background:white;
        box-shadow:
        0 4px 15px rgba(
            0,0,0,.08
        );
        "
    >

</div>

<!-- TIPE -->
<div class="box">

    <div class="box-title">
        🥄 Tipe
    </div>

    <button class="btn" onclick="toggle(this,'tipe')">
        Makanan Berat
    </button>

    <button class="btn" onclick="toggle(this,'tipe')">
        Camilan
    </button>

</div>

<!-- JENIS -->
<div class="box">

    <div class="box-title">
        🍜 Jenis
    </div>

    <button class="btn" onclick="toggle(this,'jenis')">
        Kuah
    </button>

    <button class="btn" onclick="toggle(this,'jenis')">
        Kering
    </button>

    <button class="btn" onclick="toggle(this,'jenis')">
        Nyemek
    </button>

    <button class="btn" onclick="toggle(this,'jenis')">
        Bakar
    </button>

</div>

<!-- RASA -->
<div class="box">

    <div class="box-title">
        🌶️ Rasa
    </div>

    <button class="btn" onclick="toggle(this,'rasa')">
        Asin
    </button>

    <button class="btn" onclick="toggle(this,'rasa')">
        Manis
    </button>

    <button class="btn" onclick="toggle(this,'rasa')">
        Pedas
    </button>

</div>

<!-- BAHAN -->
<div class="box">

    <div class="box-title">
        🍗 Bahan Utama
    </div>

    <button class="btn" onclick="toggle(this,'bahan')">Nasi</button>
    <button class="btn" onclick="toggle(this,'bahan')">Mi</button>
    <button class="btn" onclick="toggle(this,'bahan')">Sapi</button>
    <button class="btn" onclick="toggle(this,'bahan')">Ayam</button>
    <button class="btn" onclick="toggle(this,'bahan')">Sayur</button>
    <button class="btn" onclick="toggle(this,'bahan')">Seafood</button>
    <button class="btn" onclick="toggle(this,'bahan')">Kambing</button>
    <button class="btn" onclick="toggle(this,'bahan')">Ikan</button>
    <button class="btn" onclick="toggle(this,'bahan')">Lontong</button>

</div>

<div
style="
display:flex;
gap:14px;
margin-top:30px;
"
>

    <!-- SEARCH -->
    <button
    class="search-btn"
    onclick="searchFood()"
    style="
    margin:0;
    flex:1;
    "
    >

        <span class="search-btn-icon"></span>

        Temukan Rekomendasi

    </button>

    <!-- RESET -->
    <button
    onclick="resetFilter()"
    class="reset-btn"
>
    Reset
</button>

</div>

<!-- RESULT -->
<div class="result-title">
    Hasil Pencarian
</div>

<div id="result" class="grid"></div>

<div
id="pagination"
style="
display:flex;
justify-content:center;
gap:10px;
margin-top:35px;
flex-wrap:wrap;
"
></div>

<script>

const token =
    localStorage.getItem(
        'token'
    );

let foods = [];

let currentPage = 1;

let selections = {
    tipe: [],
    jenis: [],
    rasa: [],
    bahan_utama: []
};

let liked = {};

/*
=========================
TOGGLE BUTTON
=========================
*/
function toggle(
    el,
    category
){

    const value =
        el.innerText.trim();

    el.classList.toggle(
        'active'
    );

    if(
        selections[
            category
        ].includes(value)
    ){

        selections[
            category
        ] =
        selections[
            category
        ].filter(
            v => v !== value
        );

    }else{

        selections[
            category
        ].push(value);
    }
}

/*
=========================
LOAD FOODS
=========================
*/
async function loadFoods(
    page = 1
){

    currentPage =
        page;

    const keyword =
        document
        .getElementById(
            'keyword'
        )
        ?.value || '';

    const params =
        new URLSearchParams();

    params.append(
        'sort',
        'popular'
    );

    params.append(
        'page',
        page
    );

    if(keyword){

        params.append(
            'search',
            keyword
        );
    }

    /*
    =====================
    FILTER
    =====================
    */

    selections.tipe
    .forEach(item =>
        params.append(
            'tipe[]',
            item
        )
    );

    selections.jenis
    .forEach(item =>
        params.append(
            'jenis[]',
            item
        )
    );

    selections.rasa
    .forEach(item =>
        params.append(
            'rasa[]',
            item
        )
    );

    selections
    .bahan_utama
    .forEach(item =>
        params.append(
            'bahan_utama[]',
            item
        )
    );

    try{

        const response =
            await fetch(
            `/api/foods?${params.toString()}`,
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

        foods =
            data.data;

        renderFoods(
            foods
        );

        renderPagination(
            data
        );

    }catch(error){

        console.log(
            error
        );
    }
}

/*
=========================
SEARCH BUTTON
=========================
*/
function searchFood(){

    loadFoods(1);
}

/*
=====================
RESET SELECTION
=====================
*/
function resetFilter(){
    selections = {
        tipe: [],
        jenis: [],
        rasa: [],
        bahan_utama: []
    };

    /*
    =====================
    RESET BUTTON ACTIVE
    =====================
    */

    document
    .querySelectorAll(
        '.btn.active'
    )
    .forEach(btn => {

        btn.classList.remove(
            'active'
        );

    });

    /*
    =====================
    RESET SEARCH
    =====================
    */

    const keyword =
        document
        .getElementById(
            'keyword'
        );

    if(keyword){

        keyword.value =
            '';
    }

    /*
    =====================
    LOAD DEFAULT
    =====================
    */

    loadFoods(1);
}

/*
=========================
LIKE
=========================
*/
function toggleLike(id){

    liked[id] =
        !liked[id];

    renderFoods(
        foods
    );
}

/*
=========================
RENDER FOOD
=========================
*/
function renderFoods(
    foods
){

    const result =
        document
        .getElementById(
            'result'
        );

    let html = '';

    if(
        foods.length === 0
    ){

        html = `
        <div class="empty-state">

            <div style="
                font-size:22px;
                font-weight:bold;
                margin-bottom:10px;
            ">
                Makanan Tidak Ditemukan
            </div>

            <div
            style="
            color:gray;
            "
            >
                Coba keyword
                atau filter lain
            </div>

        </div>
        `;

    }else{

        foods.forEach(
        food => {

            const isLiked =
                liked[
                    food.id
                ];

            html += `
            <div class="card">

                <div class="card-image">

                    <img
                    src="http://127.0.0.1:8000/${food.image_url}"
                    alt="${food.name}"
                    >

                </div>

                <div class="card-body">

                    <div class="food-name">
                        ${food.name}
                    </div>

                    <div>

                        ${food.tags.map(
                        tag => `

                        <span
                        class="
                        tag
                        tag-${tag.type}
                        ">
                            ${tag.name}
                        </span>

                        `
                        ).join('')}

                    </div>

                    <div class="
                    like-area
                    ">

                        <button
                        class="
                        like-btn
                        "
                        onclick="
                        toggleLike(
                        ${food.id}
                        )
                        "
                        >

                            ❤️

                        </button>

                        <span>

                            ${
                                food.likes_count
                                +
                                (
                                    isLiked
                                    ? 1
                                    : 0
                                )
                            }

                        </span>

                    </div>

                </div>

            </div>
            `;
        });
    }

    result.innerHTML =
        html;
}

/*
=========================
PAGINATION
=========================
*/
function renderPagination(
    data
){

    let html = '';

    for(
        let i = 1;
        i <= data.last_page;
        i++
    ){

        html += `
        <button
        onclick="
        loadFoods(
        ${i}
        )
        "
        class="
        btn
        ${
            i ===
            data.current_page

            ? 'active'
            : ''
        }
        "
        >
            ${i}
        </button>
        `;
    }

    document
    .getElementById(
        'pagination'
    )
    .innerHTML =
        html;
}

/*
=========================
INIT
=========================
*/
loadFoods();

</script>

@endsection
