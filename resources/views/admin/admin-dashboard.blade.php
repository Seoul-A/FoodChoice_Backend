<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Food Choice</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#f4f4f4;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        /* HEADER */

        .header{
            background:white;
            height:90px;
            display:flex;
            align-items:center;
            justify-content:flex-end;
            padding:0 25px;
            border-bottom:1px solid #ddd;
            position:sticky;
            top:0;
            z-index:100;
        }

        .header-logo{
            position:absolute;
            left:50%;
            transform:translateX(-50%);
        }

        .header-logo img{
            height:55px;
            object-fit:contain;
        }

        .logout-btn{
            background:#8B0000;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
            cursor:pointer;
            font-weight:600;
        }

        .logout-btn:hover{
            background:#700000;
        }

        /* CONTENT */

        .content{
            flex:1;
            padding:30px;
        }

        .page-title{
            font-size:32px;
            font-weight:bold;
            color:#222;
            margin-bottom:8px;
        }

        .page-subtitle{
            color:#666;
            margin-bottom:30px;
        }

        /* TOOLBAR */

        .toolbar{
            display:flex;
            gap:15px;
            margin-bottom:30px;
        }

        .search-box{
            flex:1;
        }

        .search-wrapper{
            position:relative;
            width:100%;
        }

        .search-icon{
            position:absolute;
            left:16px;
            top:50%;
            transform:translateY(-50%);
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .search-input{
            width:100%;
            height:52px;
            border:1px solid #ddd;
            border-radius:16px;
            padding-left:55px;
            padding-right:16px;
            font-size:15px;
            outline:none;
            background:white;
            transition:.2s;
        }

        .search-input:focus{
            border-color:#8B0000;
            box-shadow:0 0 0 4px rgba(139,0,0,.08);
        }

        .add-btn{
            background:#8B0000;
            color:white;
            border:none;
            padding:0 25px;
            border-radius:12px;
            cursor:pointer;
            font-weight:600;
        }

        .add-btn:hover{
            background:#700000;
        }

        /* GRID */

        .food-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:25px;
        }

        /* CARD */

        .food-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(0,0,0,0.08);
            transition:.3s;
            display:flex;
            flex-direction:column;
            height:100%;
        }

        .food-card:hover{
            transform:translateY(-5px);
            box-shadow:0 12px 25px rgba(0,0,0,0.15);
        }

        .food-image-wrapper{
            overflow:hidden;
        }

        .food-image{
            width:100%;
            height:250px;
            object-fit:cover;
            display:block;
            transition:.4s;
        }

        .food-card:hover .food-image{
            transform:scale(1.08);
        }

        .food-body{
            padding:18px;
            display:flex;
            flex-direction:column;
            flex-grow:1;
        }

        .food-name{
            font-size:24px;
            font-weight:bold;
            margin-bottom:18px;
            color:#222;
        }

        /* TAG */

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

        /* LIKE */

        .likes{
            display:flex;
            align-items:center;
            gap:8px;
            margin-top:18px;
            color:#a31212;
            font-weight:bold;
            font-size:15px;
        }

        .inline-love{
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* ACTION */

        .actions{
            display:flex;
            align-items:center;
            margin-top:auto;
            padding-top:18px;
            border-top:1px solid #eee;
        }

        .edit-btn,
        .delete-btn{
            flex:1;
            background:none;
            border:none;
            padding:14px;
            cursor:pointer;
            font-size:15px;
            font-weight:500;
        }

        .edit-btn{
            color:#2563eb;
        }

        .delete-btn{
            color:#dc2626;
        }

        .edit-btn:hover,
        .delete-btn:hover{
            background:#fafafa;
        }

        .action-divider{
            width:1px;
            height:25px;
            background:#e5e5e5;
        }

        /* EMPTY */

        .empty-state{
            background:white;
            padding:40px;
            border-radius:18px;
            text-align:center;
            grid-column:1/-1;
        }

        /* MODAL */

        .modal-overlay{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.45);
            display:none;
            justify-content:center;
            align-items:center;
            z-index:999;
        }

        .modal{
            background:white;
            width:400px;
            max-width:90%;
            border-radius:20px;
            padding:25px;
        }

        .modal-title{
            font-size:22px;
            font-weight:bold;
            margin-bottom:10px;
        }

        .modal-text{
            color:#666;
            margin-bottom:25px;
        }

        .modal-actions{
            display:flex;
            gap:10px;
            justify-content:flex-end;
        }

        .btn-cancel{
            border:none;
            background:#eee;
            padding:12px 20px;
            border-radius:10px;
            cursor:pointer;
        }

        .btn-delete{
            border:none;
            background:#dc2626;
            color:white;
            padding:12px 20px;
            border-radius:10px;
            cursor:pointer;
        }

        /* FOOTER */

        .footer{
            background:#3a3a3a;
            color:white;
            text-align:center;
            padding:35px 20px;
            font-size:13px;
            line-height:1.6;
            margin-top:40px;
        }

        @media(max-width:1100px){

            .food-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        @media(max-width:700px){

            .food-grid{
                grid-template-columns:1fr;
            }

            .toolbar{
                flex-direction:column;
            }

            .add-btn{
                height:52px;
            }

            .food-name{
                font-size:20px;
            }

        }

    </style>

</head>

<body>

<div class="header">

    <div class="header-logo">

        <img
            src="{{ asset('image/logo.svg') }}"
            alt="Food Choice"
        >

    </div>

    <button
        class="logout-btn"
        onclick="logout()"
    >
        Logout
    </button>

</div>

<div class="content">

    <div class="page-title">
        Dashboard Admin
    </div>

    <div class="page-subtitle">
        Kelola data makanan yang tersedia
    </div>

    <div class="toolbar">

        <div class="search-box">

            <div class="search-wrapper">

                <span class="search-icon">
                    🔍
                </span>

                <input
                    type="text"
                    id="searchInput"
                    class="search-input"
                    placeholder="Cari makanan..."
                    onkeyup="renderFoods()"
                >

            </div>

        </div>

        <button
            class="add-btn"
            onclick="window.location.href='/admin/foods/create'"
        >
            + Tambah Menu
        </button>

    </div>

    <div
        id="foodContainer"
        class="food-grid"
    ></div>

</div>
<!-- MODAL HAPUS -->

<div
    id="deleteModal"
    class="modal-overlay"
>

    <div class="modal">

        <div class="modal-title">
            Hapus Makanan
        </div>

        <div class="modal-text">
            Apakah Anda yakin ingin menghapus menu ini?
            Data yang sudah dihapus tidak dapat dikembalikan.
        </div>

        <div class="modal-actions">

            <button
                class="btn-cancel"
                onclick="closeDeleteModal()"
            >
                Batal
            </button>

            <button
                class="btn-delete"
                onclick="confirmDelete()"
            >
                Hapus
            </button>

        </div>

    </div>

</div>

<div class="footer">

    ⚙ Sistem Rekomendasi Berbasis Preferensi
    <br>
    made by
    <br>
    kelompok 9

</div>

<script>

const token = localStorage.getItem('token');

let foods = [];

let deleteId = null;

/* LOAD FOODS */

async function loadFoods(){

    try{

        const response =
            await fetch(
                '/api/admin/foods',
                {
                    headers:{
                        'Authorization':
                            'Bearer ' + token,

                        'Accept':
                            'application/json'
                    }
                }
            );

        const data =
            await response.json();

        foods = data.data || [];

        renderFoods();

    }catch(error){

        console.error(error);

        document
        .getElementById('foodContainer')
        .innerHTML = `

            <div class="empty-state">

                Gagal memuat data makanan

            </div>

        `;
    }

}

/* RENDER */

function renderFoods(){

    const keyword =
        document
        .getElementById('searchInput')
        .value
        .toLowerCase();

    const filtered =
        foods.filter(food =>

            food.name
            .toLowerCase()
            .includes(keyword)

        );

    let html = '';

    if(filtered.length === 0){

        html = `

            <div class="empty-state">

                Tidak ada makanan ditemukan

            </div>

        `;

    }else{

        filtered.forEach(food => {

            html += `

            <div class="food-card">

                <div class="food-image-wrapper">

                    <img
                        src="/${encodeURI(food.image_url)}"
                        class="food-image"
                        alt="${food.name}"
                    >

                </div>

                <div class="food-body">

                    <div class="food-name">

                        ${food.name}

                    </div>

                    <div>

                        ${food.tags.map(tag => `

                            <span
                                class="tag tag-${tag.type}"
                            >

                                ${tag.name}

                            </span>

                        `).join('')}

                    </div>

                    <div class="likes">

                        <span class="inline-love">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="#c81e1e"
                                stroke="#c81e1e"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>

                            </svg>

                        </span>

                        <span>

                            ${food.likes_count} Disukai

                        </span>

                    </div>

                    <div class="actions">

                        <button
                            class="edit-btn"
                            onclick="editFood(${food.id})"
                        >

                            ✏ Edit

                        </button>

                        <div
                            class="action-divider"
                        ></div>

                        <button
                            class="delete-btn"
                            onclick="openDeleteModal(${food.id})"
                        >

                            🗑 Hapus

                        </button>

                    </div>

                </div>

            </div>

            `;

        });

    }

    document
    .getElementById('foodContainer')
    .innerHTML = html;

}

/* EDIT */

function editFood(id){

    window.location.href =
        '/admin/foods/' +
        id +
        '/edit';

}

/* MODAL */

function openDeleteModal(id){

    deleteId = id;

    document
    .getElementById('deleteModal')
    .style.display = 'flex';

}

function closeDeleteModal(){

    deleteId = null;

    document
    .getElementById('deleteModal')
    .style.display = 'none';

}

/* DELETE */

async function confirmDelete(){

    if(!deleteId){

        return;

    }

    try{

        const response =
            await fetch(

                '/api/admin/foods/' +
                deleteId,

                {
                    method:'DELETE',

                    headers:{
                        'Authorization':
                            'Bearer ' + token,

                        'Accept':
                            'application/json'
                    }
                }

            );

        const data =
            await response.json();

        if(response.ok){

            closeDeleteModal();

            loadFoods();

        }else{

            alert(
                data.message ||
                'Gagal menghapus makanan'
            );

        }

    }catch(error){

        console.error(error);

        alert(
            'Terjadi kesalahan'
        );

    }

}

/* LOGOUT */

function logout(){

    const result =
        confirm(
            'Yakin ingin logout?'
        );

    if(!result){

        return;

    }

    localStorage.removeItem(
        'token'
    );

    localStorage.removeItem(
        'user'
    );

    window.location.href =
        '/login';

}

/* INIT */

loadFoods();

</script>

</body>
</html>