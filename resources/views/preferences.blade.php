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

<!-- BUTTON -->
<button class="search-btn" onclick="searchFood()">

    <span class="search-btn-icon"></span>

    Temukan Rekomendasi

</button>

<!-- RESULT -->
<div class="result-title">
    Hasil Pencarian
</div>

<div id="result" class="grid"></div>

<script>

let foods = [];

let selections = {
    tipe: [],
    jenis: [],
    rasa: [],
    bahan: []
};

let liked = {};

async function loadFoods(){

    try{

        const response = await fetch(
            'http://127.0.0.1:8000/api/foods'
        );

        foods = await response.json();

        console.log(foods);

    }catch(error){

        console.log(error);
    }
}

function toggle(el, category){

    const value = el.innerText;

    el.classList.toggle('active');

    if(selections[category].includes(value)){

        selections[category] =
        selections[category].filter(v => v !== value);

    }else{

        selections[category].push(value);
    }
}

function toggleLike(id){

    liked[id] = !liked[id];

    searchFood();
}

// ⭐ DITAMBAH
function hasTag(food, type, value){

    return food.tags.some(tag =>

        tag.type.toLowerCase() === type.toLowerCase()

        &&

        tag.name.toLowerCase() === value.toLowerCase()
    );
}

function searchFood(){

    // ⭐ DIUBAH
    let filtered = foods.data.filter(food => {

        return (

            (
                selections.tipe.length === 0 ||

                selections.tipe.some(value =>
                    hasTag(food, 'tipe', value)
                )
            )

            &&

            (
                selections.jenis.length === 0 ||

                selections.jenis.some(value =>
                    hasTag(food, 'jenis', value)
                )
            )

            &&

            (
                selections.rasa.length === 0 ||

                selections.rasa.some(value =>
                    hasTag(food, 'rasa', value)
                )
            )

            &&

            (
                selections.bahan.length === 0 ||

                selections.bahan.some(value =>
                    hasTag(food, 'bahan_utama', value)
                )
            )

        );

    });

    let html = '';

    if(filtered.length === 0){

        html = `

        <div class="empty-state">

            <div style="
                font-size:22px;
                font-weight:bold;
                margin-bottom:10px;
                color:#333;
            ">
                Makanan Tidak Ditemukan
            </div>

            <div style="
                font-size:15px;
                color:gray;
            ">
                Coba ubah preferensi makanan kamu
            </div>

        </div>

        `;

    }else{

        filtered.forEach(food => {

            const isLiked = liked[food.id];

            html += `

            <div class="card">

                <div class="card-image">

                    <!-- ⭐ DIUBAH -->
                    <img
                        src="http://127.0.0.1:8000${food.image_url}"
                        alt="${food.name}"
                    >

                </div>

                <div class="card-body">

                    <div class="food-name">
                        ${food.name}
                    </div>

                    <div>

                        <!-- ⭐ DIUBAH -->
                        ${food.tags.map(tag => `

                            <span class="tag tag-${tag.type}">
                                ${tag.name}
                            </span>

                        `).join('')}

                    </div>

                    <div class="like-area">

                        <button
                            class="like-btn"
                            onclick="toggleLike(${food.id})"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="28"
                                height="28"
                                viewBox="0 0 24 24"
                                fill="${isLiked ? '#8B0000' : 'none'}"
                                stroke="#8B0000"
                                stroke-width="2.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>

                            </svg>

                        </button>

                        <span>
                            ${food.likes_count + (isLiked ? 1 : 0)}
                        </span>

                    </div>

                </div>

            </div>

            `;
        });
    }

    document.getElementById('result').innerHTML = html;
}

async function init(){

    await loadFoods();

    searchFood();
}

init();

</script>

@endsection
