@extends('layouts.app')

@section('content')

<style>

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

    .search-box{
        background:white;
        padding:20px;
        border-radius:16px;
        margin-bottom:25px;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);
    }

    .search-form{
        display:flex;
        gap:12px;
    }

    .search-input{
        flex:1;
        padding:14px 16px;
        border:1px solid #ddd;
        border-radius:12px;
        font-size:16px;
        outline:none;
    }

    .search-input:focus{
        border-color:#a31212;
    }

    .search-btn{
        background:#a31212;
        color:white;
        border:none;
        border-radius:12px;
        padding:0 22px;
        cursor:pointer;
        font-weight:bold;
        font-size:16px;
    }

    .search-btn:hover{
        background:#8d0f0f;
    }

    .result-title{
        font-size:30px;
        font-weight:bold;
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

    .tag-bahan{
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
        text-align:center;
        box-shadow:0 4px 12px rgba(0,0,0,0.08);
        grid-column:1 / -1;
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

        .search-form{
            flex-direction:column;
        }

        .search-btn{
            height:48px;
        }
    }

</style>

<div class="title">
    Pencarian Langsung
</div>

<div class="subtitle">
    Cari makanan favoritmu
</div>

<div class="search-box">

    <form id="searchForm" class="search-form">

        <input
            type="text"
            id="keyword"
            class="search-input"
            placeholder="Contoh: Nasi Goreng"
        >

        <button
            type="submit"
            class="search-btn">
            Cari
        </button>

    </form>

</div>

<div class="result-title">
    Hasil Pencarian
</div>

<div id="result" class="grid">

    <div class="empty-state">
        Cari makanan yang kamu inginkan.
    </div>

</div>

<script>

let liked = {};
let currentFoods = [];

document
.getElementById('searchForm')
.addEventListener('submit', searchFood);

function toggleLike(id){

    liked[id] = !liked[id];

    renderFoods(currentFoods);
}

async function searchFood(e){

    e.preventDefault();

    const keyword =
        document.getElementById('keyword').value.trim();

    if(keyword === ''){
        return;
    }

    const result =
        document.getElementById('result');

    result.innerHTML = `
        <div class="empty-state">
            Mencari...
        </div>
    `;

    try{

        const response =
            await fetch(
                `/api/foods?search=${encodeURIComponent(keyword)}`
            );

        const data =
            await response.json();

        const foods = data.data || [];

        currentFoods = foods;

        if(foods.length === 0){

            result.innerHTML = `
                <div class="empty-state">
                    Makanan tidak ditemukan.
                </div>
            `;

            return;
        }

        renderFoods(foods);

    }catch(error){

        console.log(error);

        result.innerHTML = `
            <div class="empty-state">
                Terjadi kesalahan saat mengambil data.
            </div>
        `;
    }
}

function renderFoods(foods){

    let html = '';

    foods.forEach(food => {

        const isLiked = liked[food.id];

        html += `

        <div class="card">

            <div class="card-image">

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

                    ${(food.tags ?? []).map(tag => `

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

    document.getElementById('result').innerHTML = html;
}

</script>

@endsection