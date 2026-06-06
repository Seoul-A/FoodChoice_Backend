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
            font-size:16px;
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
            left:18px;
            top:50%;
            transform:translateY(-50%);
            display:flex;
            align-items:center;
            justify-content:center;
            pointer-events:none;
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

        .search-input::placeholder{
            color:#999;
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
            font-size:16px;
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
            gap:16px;
            margin-top:auto;
            padding-top:18px;
            border-top:1px solid #eee;
        }

        .edit-btn,
        .delete-btn{
            flex:1;
            height:48px;
            border:none;
            border-radius:10px;
            cursor:pointer;

            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;

            font-size:15px;
            font-weight:600;

            transition:.25s;
        }

        .edit-btn{
            background:#4f8df7;
            color:white;
        }

        .edit-btn:hover{
            background:#3d7df0;
            transform:translateY(-2px);
        }

        .delete-btn{
            background:#ff3131;
            color:white;
        }

        .delete-btn:hover{
            background:#f11f1f;
            transform:translateY(-2px);
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
        .modal{
            background:white;
            width:500px;
            max-width:90%;
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 25px 60px rgba(0,0,0,.2);
            animation:modalShow .25s ease;
        }

        .logout-modal{
            background:white;
            width:360px;
            max-width:90%;
            border-radius:18px;
            padding:28px;
            box-shadow:0 10px 30px rgba(0,0,0,.15);
        }

        .logout-title{
            font-size:26px;
            font-weight:700;
            color:#222;
            margin-bottom:12px;
        }

        .logout-text{
            color:#666;
            font-size:16px;
            line-height:1.5;
            margin-bottom:24px;
        }

        .logout-actions{
            display:flex;
            justify-content:flex-end;
            gap:10px;
        }

        .logout-cancel{
            border:none;
            background:#f1f1f1;
            color:#333;
            padding:12px 22px;
            border-radius:10px;
            cursor:pointer;
            font-size:15px;
            font-weight:600;
        }

        .logout-confirm{
            border:none;
            background:#b31212;
            color:white;
            padding:12px 22px;
            border-radius:10px;
            cursor:pointer;
            font-size:15px;
            font-weight:600;
        }

        @keyframes modalShow{
            from{
                transform:translateY(20px) scale(.95);
                opacity:0;
            }
            to{
                transform:translateY(0) scale(1);
                opacity:1;
            }
        }

        .modal-header{
            padding:28px 28px 18px;
            text-align:center;
        }

        .modal-icon{
            width:70px;
            height:70px;
            border-radius:50%;
            background:#fde8e8;
            margin:0 auto 16px;

            display:flex;
            align-items:center;
            justify-content:center;
        }

        .modal-title{
            font-size:24px;
            font-weight:700;
            color:#222;
            margin-bottom:10px;
        }

        .modal-text{
            font-size:16px;
            color:#666;
            line-height:1.5;
        }

        .modal-footer{
            border-top:1px solid #eee;
            padding:18px 24px;

            display:flex;
            justify-content:center;
            gap:12px;
        }

        .btn-cancel{
            min-width:100px;
            height:46px;
            border:none;
            border-radius:12px;
            background:#f2f2f2;
            font-size:16px;
            cursor:pointer;
        }
        .btn-cancel:hover{
            background:#e6e6e6;
        }

        .btn-delete{
            min-width:140px;
            height:46px;
            border:none;
            border-radius:12px;
            background:#ef2b2b;
            color:white;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
        }

        .btn-delete:hover{
            background:#d81f1f;
        }

        .modal-overlay{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.45);
            backdrop-filter:blur(4px);
            display:none;
            justify-content:center;
            align-items:center;
            z-index:999;
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

</div>
<!-- MODAL HAPUS -->

<div id="deleteModal" class="modal-overlay">

    <div class="modal">

        <div class="modal-header">

            <div class="modal-icon">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#ef2b2b"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6l-1 14H6L5 6"></path>
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                    <path d="M9 6V4h6v2"></path>
                </svg>

            </div>

            <div class="modal-title">
                Hapus Makanan
            </div>

            <div class="modal-text">
                Apakah Anda yakin ingin menghapus menu ini?
                <br>
                Data yang sudah dihapus tidak dapat dikembalikan.
            </div>

        </div>

        <div class="modal-footer">

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
<!-- MODAL LOGOUT -->

<div
    id="logoutModal"
    class="modal-overlay"
    style="display:none;"
>

    <div class="logout-modal">

        <div class="logout-title">
            Logout
        </div>

        <div class="logout-text">
            Apakah Anda yakin ingin keluar dari dashboard?
        </div>

        <div class="logout-actions">

            <button
                class="logout-cancel"
                onclick="closeLogoutModal()"
            >
                Batal
            </button>

            <button
                class="logout-confirm"
                onclick="confirmLogout()"
            >
                Logout
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
let currentPage = 1;

/* LOAD FOODS */

async function loadFoods(page = 1){

    currentPage = page;

    try{

        const response =
            await fetch(
                '/api/admin/foods?page=' + page,
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

        renderPagination(data);

    }catch(error){

        console.error(error);

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
                        src="http://127.0.0.1:8000/${food.image_url}"
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
                            Edit
                        </button>

                        <button
                            class="delete-btn"
                            onclick="openDeleteModal(${food.id})"
                        >
                            Hapus
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

function renderPagination(data){

    let html = '';

    for(
        let i = 1;
        i <= data.last_page;
        i++
    ){

        html += `

        <button
            onclick="loadFoods(${i})"
            class="
                ${i === data.current_page ? 'active-page' : ''}
            "
            style="
                padding:10px 16px;
                border:none;
                border-radius:12px;
                cursor:pointer;
                font-weight:bold;
                background:
                    ${i === data.current_page
                        ? '#8B0000'
                        : '#ffffff'};
                color:
                    ${i === data.current_page
                        ? '#fff'
                        : '#333'};
                box-shadow:
                    0 4px 12px rgba(0,0,0,.08);
            "
        >
            ${i}
        </button>

        `;
    }

    document
        .getElementById('pagination')
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

    document
    .getElementById('logoutModal')
    .style.display = 'flex';

}

function closeLogoutModal(){

    document
    .getElementById('logoutModal')
    .style.display = 'none';

}

function confirmLogout(){

    localStorage.removeItem('token');
    localStorage.removeItem('user');

    window.location.href = '/login';

}
/* INIT */

loadFoods();

</script>

</body>
</html>