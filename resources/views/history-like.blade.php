@extends('layouts.app')

@section('content')
<div
style="
max-width:1200px;
margin:0 auto;
padding:0 20px;
"
>

<script>
const token =
    localStorage.getItem(
        'token'
    );

let foods = [];

let foodIdToDelete =
    null;

async function
loadLikedFoods(
    page = 1
){

    const keyword =
        document
        .querySelector(
            '.search-input'
        )
        .value;

    const response =
        await fetch(
        `/api/history-like?page=${page}&search=${keyword}`,
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
}

function renderFoods(
    foods
){

    const container =
        document
        .getElementById(
            'foodContainer'
        );

    if(
        foods.length === 0
    ){

        container.innerHTML =
        `
        <div
        class="empty-card"
        style="
        grid-column:
        1 / -1;
        "
        >
            <div class="
            empty-icon
            ">
                ❤️
            </div>

            <div>

                <div
                class="
                empty-title
                "
                >
                    Belum ada makanan
                    yang kamu suka
                </div>

                <div
                class="
                empty-subtitle
                "
                >
                    Yuk cari makanan
                    favoritmu
                </div>

            </div>

        </div>
        `;

        return;
    }

    let html = '';

    foods.forEach(
    food => {

        html += `
        <div
        class="
        food-card-pref
        "
        style="
        background:white;
        border-radius:28px;
        overflow:hidden;
        box-shadow:
        0 4px 15px rgba(
            0,0,0,.08
        );
        transition:.3s;
        display:flex;
        flex-direction:column;
        "
        >

            <div
            class="food-image"
            >

                <img
                src="/${food.image_url}"
                class="
                food-hover-img
                "
                >

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
                    margin-right:6px;
                    margin-bottom:8px;

                    ${
                        tag.type
                        ===
                        'tipe'
                        ? `
                        background:#e5e5e5;
                        `
                        : ''
                    }

                    ${
                        tag.type
                        ===
                        'jenis'
                        ? `
                        background:#d8f5d0;
                        `
                        : ''
                    }

                    ${
                        tag.type
                        ===
                        'rasa'
                        ? `
                        background:#ffd6d6;
                        `
                        : ''
                    }

                    ${
                        tag.type
                        ===
                        'bahan_utama'
                        ? `
                        background:#ffe8cc;
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
                    openConfirm(
                    ${food.id}
                    )
                    "
                    style="
                    font-size:28px;
                    border:none;
                    background:none;
                    cursor:pointer;
                    color:#8B0000;
                    "
                    >
                        ♥
                    </button>

                    <span>
                        ${
                            food
                            .likes_count
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

function openConfirm(
    id
){

    foodIdToDelete =
        id;

    document
    .getElementById(
        'confirmPopup'
    )
    .style.display =
    'flex';
}

function closeConfirm(){

    document
    .getElementById(
        'confirmPopup'
    )
    .style.display =
    'none';
}

window.onload =
function(){

    document
    .getElementById(
        'confirmUnlike'
    )
    .onclick =
    async function(){

        await fetch(
            `/api/foods/${foodIdToDelete}/like`,
        {
            method:'POST',
            headers:{
                Authorization:
                    `Bearer ${token}`,
                Accept:
                    'application/json'
            }
        });

        foods =
            foods.filter(
                food =>
                food.id !==
                foodIdToDelete
            );

        renderFoods(
            foods
        );

        closeConfirm();
    };

    document
    .querySelector(
        '.search-input'
    )
    .addEventListener(
        'input',
        () =>
        loadLikedFoods()
    );

    loadLikedFoods();
};
</script>

<style>

    .title-area{
        display:flex;
        align-items:center;
        gap:18px;
        margin-top:0;
        margin-bottom:7px;
    }

    .title{
        font-size:28px;
        font-weight:bold;
    }

    .love-icon{
        width:40px;
        height:40px;
        border-radius:50%;
        background:white;

        display:flex;
        align-items:center;
        justify-content:center;

        box-shadow:0 4px 12px rgba(0,0,0,0.06);
    }

    .subtitle{
        color:black;
        margin-bottom:30px;
        font-size:18px;
    }

    .search-box{
        background:white;
        padding:12px;
        border-radius:16px;
        margin-bottom:30px;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);
    }


    .search-wrapper{
        position:relative;
        width:100%;
    }

    .search-icon{
        position:absolute;
        left:18px;
        top:50%;
        transform:translateY(-50%);
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .search-input{
        width:100%;
        height:58px;
        padding-left:58px;
        padding-right:16px;

        border:1px solid #d9d9d9;
        border-radius:14px;

        font-size:16px;
        box-sizing:border-box;
        outline:none;
    }

    .search-input:focus{
        border-color:#a31212;
    }

    .empty-card{
        background:white;
        border-radius:18px;
        padding:30px;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);

        display:flex;
        align-items:center;
        gap:20px;

        max-width:700px;
        margin:0 auto;
    }

    .empty-icon{
        width: 60px;
        height:60px;
        border-radius:50%;
        background:#f5f5f5;

        display:flex;
        align-items:center;
        justify-content:center;

        flex-shrink:0;

        box-shadow:0 4px 10px rgba(0,0,0,0.08);
    }

    .empty-title{
        font-size:20px;
        font-weight:bold;
        margin-bottom:5px;
        color:#222;
    }

    .empty-subtitle{
        color:#666;
        font-size:14px;
        line-height:1.5;
    }

    .inline-love{
        display:inline-flex;
        align-items:center;
        vertical-align:middle;
        margin:0 3px;
    }

    .food-grid{
        display:grid;
        grid-template-columns:
        repeat(3,1fr);
        gap:30px;
    }

    .food-card-pref{
        background:white;
        border-radius:28px;
        overflow:hidden;

        box-shadow:
        0 4px 15px rgba(
            0,0,0,0.08
        );

        transition:.3s;

        display:flex;
        flex-direction:column;

        min-height:100%;
    }

    .food-card-pref:hover{

        transform:
        translateY(-5px);

        box-shadow:
        0 12px 25px rgba(
            0,0,0,0.15
        );
    }

    .food-card-pref
    .food-image{
        overflow:hidden;
    }

    .food-hover-img{
        width:100%;
        height:240px;
        object-fit:cover;

        transition:.4s;
    }

    .food-card-pref:hover
    .food-hover-img{

        transform:
        scale(1.08);
    }

    @media(max-width:1100px){

        .food-grid{
            grid-template-columns:
            repeat(2,1fr);
        }
    }

    @media(max-width:700px){

        .food-grid{
            grid-template-columns:
            1fr;
        }
    }
    @media(max-width:700px){

        .empty-card{
            flex-direction:column;
            text-align:center;
        }

    }
    @media(max-width:1100px){

        #foodContainer{
            grid-template-columns:
            repeat(2,1fr)
            !important;
        }
    }

    @media(max-width:700px){

        #foodContainer{
            grid-template-columns:
            1fr
            !important;
        }
    }

</style>

<div class="title-area">

    <div class="title">
        Riwayat Suka
    </div>

    <div class="love-icon">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="#c81e1e"
            stroke="#c81e1e"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >

            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>

        </svg>

    </div>

</div>

<div class="subtitle">
    Makanan yang kamu suka
</div>

<div class="search-box"> 

    <div class="search-wrapper">

        <span class="search-icon">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#999"
                stroke-width="2"
            >
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>

        </span>

        <input
            type="text"
            class="search-input"
            placeholder="Cari makanan yang pernah disukai..."
        >

    </div>

</div>

<div
id="foodContainer"
class="food-grid"
></div>

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

<div
id="confirmPopup"
style="
position:fixed;
inset:0;
background:
rgba(0,0,0,.5);
display:none;
justify-content:center;
align-items:center;
z-index:9999;
"
>

    <div
    style="
    background:white;
    width:100%;
    max-width:420px;
    border-radius:28px;
    padding:30px;
    text-align:center;
    box-shadow:
    0 12px 30px rgba(
        0,0,0,.15
    );
    "
    >

        <div
        style="
        font-size:26px;
        font-weight:bold;
        margin-bottom:10px;
        "
        >
            Batalkan Suka?
        </div>

        <div
        style="
        color:#666;
        margin-bottom:28px;
        "
        >
            Makanan akan
            dihapus dari
            riwayat suka
        </div>

        <div
        style="
        display:flex;
        gap:14px;
        "
        >

            <button
            onclick="
            closeConfirm()
            "
            style="
            flex:1;
            border:none;
            border-radius:18px;
            padding:15px;
            background:#eee;
            cursor:pointer;
            font-weight:bold;
            "
            >
                Tidak
            </button>

            <button
            id="confirmUnlike"
            style="
            flex:1;
            border:none;
            border-radius:18px;
            padding:15px;
            background:#8B0000;
            color:white;
            cursor:pointer;
            font-weight:bold;
            "
            >
                Ya
            </button>

        </div>

    </div>

</div>
</div>
@endsection