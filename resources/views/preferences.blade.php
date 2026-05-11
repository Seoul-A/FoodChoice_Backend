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
        font-size:24px;
        font-weight:bold;
        margin-bottom:5px;
    }

    .subtitle{
        color:gray;
        margin-bottom:20px;
        font-size:14px;
    }

    .box{
        background:white;
        padding:18px;
        border-radius:15px;
        margin-bottom:18px;
        box-shadow:0 2px 8px rgba(0,0,0,0.1);
    }

    .box-title{
        display:flex;
        align-items:center;
        gap:8px;
        font-weight:bold;
        margin-bottom:15px;
        font-size:18px;
    }

    .btn{
        padding:8px 16px;
        border:none;
        border-radius:20px;
        background:#e5e5e5;
        cursor:pointer;
        margin:5px;
        transition:0.2s;
    }

    .btn:hover{
        transform:scale(1.05);
    }

    .active{
        background:#a31212;
        color:white;
    }

    .search-btn{
        width:100%;
        padding:14px;
        border:none;
        border-radius:25px;
        background:#a31212;
        color:white;
        font-size:16px;
        font-weight:bold;
        cursor:pointer;
        margin-top:10px;
        box-shadow:0 4px 10px rgba(0,0,0,0.2);
    }

    .result-title{
        font-size:22px;
        font-weight:bold;
        margin-top:30px;
        margin-bottom:5px;
    }

    .result-subtitle{
        color:gray;
        margin-bottom:20px;
    }

    .grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:20px;
    }

    .card{
        background:white;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);
    }

    .card img{
        width:100%;
        height:220px;
        object-fit:cover;
    }

    .card-body{
        padding:15px;
    }

    .food-name{
        font-size:18px;
        font-weight:bold;
        margin-bottom:10px;
    }

    .tag{
        display:inline-block;
        padding:5px 12px;
        border-radius:20px;
        font-size:12px;
        margin-right:5px;
        margin-bottom:5px;
        font-weight:500;
    }
    /* TIPE */

    .tag-tipe{
        background:#e5e5e5;
        color:#444;
    }

    /* BAHAN */

    .tag-bahan{
        background:#ffe8cc;
        color:#a35b00;
    }

    /* JENIS */

    .tag-jenis{
        background:#d8f5d0;
        color:#3c7a2a;
    }

    /* RASA */

    .tag-rasa{
        background:#ffd6d6;
        color:#b30000;
    }

    .like-area{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        margin-top:15px;
        gap:6px;
    }

    .like-btn{
        border:none;
        background:none;
        font-size:20px;
        cursor:pointer;
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

    <button class="btn active" onclick="toggle(this,'tipe')">
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

    <button class="btn active" onclick="toggle(this,'rasa')">
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

    <button class="btn" onclick="toggle(this,'bahan')">
        Nasi
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Mi
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Sapi
    </button>

    <button class="btn active" onclick="toggle(this,'bahan')">
        Sayur
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Seafood
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Kambing
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Ikan
    </button>

    <button class="btn" onclick="toggle(this,'bahan')">
        Lainnya
    </button>

</div>

<!-- BUTTON -->

<button class="search-btn" onclick="searchFood()">
    🔍 Temukan Rekomendasi
</button>

<!-- RESULT -->

<div class="result-title">
    Hasil Pencarian
</div>

<div id="result" class="grid" style="margin-top:20px;"></div>

<script>

const foods = [

    {
        id:1,
        name:'Nasi Goreng',
        image:'https://images.unsplash.com/photo-1603133872878-684f208fb84b?q=80&w=1000',
        tipe:'Makanan Berat',
        jenis:'Kering',
        rasa:'Asin',
        bahan:'Nasi',
        like:107
    },

    {
        id:2,
        name:'Sate Ayam',
        image:'https://images.unsplash.com/photo-1529563021893-cc83c992d75d?q=80&w=1000',
        tipe:'Makanan Berat',
        jenis:'Bakar',
        rasa:'Manis',
        bahan:'Ayam',
        like:95
    },

    {
        id:3,
        name:'Mie Kuah',
        image:'https://images.unsplash.com/photo-1617093727343-374698b1b08d?q=80&w=1000',
        tipe:'Makanan Berat',
        jenis:'Kuah',
        rasa:'Asin',
        bahan:'Mi',
        like:89
    }

];

let selections = {
    tipe: [],
    jenis: [],
    rasa: [],
    bahan: []
};

let liked = {};

function toggle(el, category){

    const value = el.innerText;

    el.classList.toggle('active');

    if(selections[category].includes(value)){

        selections[category] =
        selections[category].filter(v => v !== value);

    } else {

        selections[category].push(value);

    }
}

function toggleLike(id){

    liked[id] = !liked[id];

    searchFood();
}

function searchFood(){

    let filtered = foods.filter(food => {

        return (

            (selections.tipe.length === 0 ||
            selections.tipe.includes(food.tipe))

            &&

            (selections.jenis.length === 0 ||
            selections.jenis.includes(food.jenis))

            &&

            (selections.rasa.length === 0 ||
            selections.rasa.includes(food.rasa))

            &&

            (selections.bahan.length === 0 ||
            selections.bahan.includes(food.bahan))

        );

    });

    let html = '';

    if(filtered.length === 0){

        html = `

        <div style="
            width:100%;
            grid-column:1 / -1;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            padding:60px 20px;
            color:gray;
        ">

            <div style="
                font-size:20px;
                font-weight:bold;
                margin-bottom:8px;
                color:#333;
            ">
                Makanan Tidak Ditemukan
            </div>

            <div style="
                font-size:14px;
            ">
                Coba ubah preferensi makanan kamu
            </div>

        </div>

        `;

    } else {

        filtered.forEach(food => {

            const isLiked = liked[food.id];

            html += `

            <div class="card">

                <img src="${food.image}">

                <div class="card-body">

                    <div class="food-name">
                        ${food.name}
                    </div>

                    <div>

                        <span class="tag tag-tipe">
                            ${food.tipe}
                        </span>

                        <span class="tag tag-bahan">
                            ${food.bahan}
                        </span>

                        <span class="tag tag-jenis">
                            ${food.jenis}
                        </span>
                        
                        <span class="tag tag-rasa">
                            ${food.rasa}
                        </span>


                    </div>

                    <div class="like-area">

                        <button class="like-btn"
                        onclick="toggleLike(${food.id})">

                            ${isLiked ? '❤️' : '🤍'}

                        </button>

                        <span>
                            ${food.like + (isLiked ? 1 : 0)}
                        </span>

                    </div>

                </div>

            </div>

            `;

        });

    }

    document.getElementById('result').innerHTML = html;
}

searchFood();

</script>

@endsection