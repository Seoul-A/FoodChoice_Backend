@extends('layouts.app')

@section('content')

<style>

    .food-form-container{
        max-width:800px;
        margin:auto;
    }

    .page-title{
        font-size:28px;
        font-weight:700;
        margin-bottom:30px;
        color:#222;
    }

    .food-card{
        background:white;
        padding:30px;
        border-radius:18px;
        box-shadow:0 4px 15px rgba(0,0,0,.08);
    }

    .form-row{
        display:grid;
        grid-template-columns:160px 1fr;
        gap:20px;
        margin-bottom:22px;
        align-items:start;
    }

    .form-label{
        font-weight:610;
        color:#222;
        line-height:1.4;
        font-size:18px;
    }

    .form-input{
        width:95%;
        height:44px;
        border:2px solid #d9d9d9;
        border-radius:6px;
        padding:0 14px;
        outline:none;
        font-size:16px;
    }

    .form-input:focus{
        border-color:#b31212;
    }

    .button-group{
        display:flex;
        flex-wrap:wrap;
        gap:8px;
    }

    .tag-btn{
        min-width:100px;
        height:40px;
        border:2px solid #d9d9d9;
        background:white;
        border-radius:4px;
        cursor:pointer;
        transition:.2s;
        font-size:16px;
    }

    .tag-btn:hover{
        border-color:#b31212;
    }

    .tag-btn.active{
        background:#b31212;
        color:white;
        border-color:#b31212;
    }

    .upload-wrapper{
        display:flex;
        align-items:center;
    }

    .upload-btn{
        padding:10px 18px;
        border:2px solid #d9d9d9;
        color:#b31212;
        cursor:pointer;
        background:white;
        border-radius:4px 0 0 4px;
        font-size:16px;
    }

    .upload-btn:hover{
        border-color:#b31212;
    }
    
    .upload-text{
        border:2px solid #d9d9d9;
        border-left:none;
        padding:10px 14px;
        flex:1;
        color:#999;
        border-radius:0 4px 4px 0;
        font-size:16px;
    }

    .action-row{
        display:flex;
        justify-content:flex-end;
        gap:10px;
        margin-top:30px;
    }

    .save-btn{
        background:#b31212;
        color:white;
        border:none;
        padding:12px 24px;
        border-radius:4px;
        cursor:pointer;
        font-weight:600;
        font-size:16px;
    }

    .save-btn:hover{
        background:#970f0f;
    }

    .reset-btn{
        background:white;
        border:2px solid #d9d9d9;
        padding:12px 24px;
        border-radius:4px;
        cursor:pointer;
        font-size:16px;
        font-weight:bold;
    }

    .reset-btn:hover{
        background:#fdf0f0;
        border-color:#b31212;
        color:#b31212;
        transition:.2s;
    }

    @media(max-width:768px){

        .form-row{
            grid-template-columns:1fr;
            gap:10px;
        }

        .action-row{
            flex-direction:column;
        }

        .save-btn,
        .reset-btn{
            width:100%;
        }

    }

</style>

<div class="food-form-container">
<h2 class="page-title">
    Edit Data Makanan
</h2>

<div class="food-card">

    <form id="foodForm">

        <!-- Nama -->
        <div class="form-row">

            <label class="form-label">
                Nama Makanan
                <span style="color:red;">
                    *
                </span>
            </label>

            <input
                type="text"
                id="name"
                class="form-input"
                placeholder="Contoh: Nasi Goreng Spesial"
            >

        </div>

        <!-- Tipe -->
        <div class="form-row">

            <label class="form-label">
                Tipe
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn" data-id="1">
                    Makanan Berat
                </button>

                <button type="button" class="tag-btn" data-id="2">
                    Camilan
                </button>

            </div>

        </div>

        <!-- Jenis -->
        <div class="form-row">

            <label class="form-label">
                Jenis
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn" data-id="3">Kuah</button>
                <button type="button" class="tag-btn" data-id="4">Kering</button>
                <button type="button" class="tag-btn" data-id="5">Nyemek</button>
                <button type="button" class="tag-btn" data-id="6">Bakar</button>

            </div>

        </div>

        <!-- Rasa -->
        <div class="form-row">

            <label class="form-label">
                Rasa
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn" data-id="7">Pedas</button>
                <button type="button" class="tag-btn" data-id="8">Manis</button>
                <button type="button" class="tag-btn" data-id="9">Asin</button>

            </div>

        </div>

        <!-- Bahan -->
        <div class="form-row">

            <label class="form-label">
                Bahan Utama
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn" data-id="10">Nasi</button>
                <button type="button" class="tag-btn" data-id="11">Mi</button>
                <button type="button" class="tag-btn" data-id="12">Sayur</button>
                <button type="button" class="tag-btn" data-id="13">Ikan</button>
                <button type="button" class="tag-btn" data-id="14">Lontong</button>
                <button type="button" class="tag-btn" data-id="15">Ayam</button>
                <button type="button" class="tag-btn" data-id="16">Seafood</button>
                <button type="button" class="tag-btn" data-id="17">Sapi</button>
                <button type="button" class="tag-btn" data-id="18">Kambing</button>

            </div>

        </div>

        <!-- Upload -->
        <div class="form-row">

            <label class="form-label">
                Gambar
                <span style="color:red;">*</span>
            </label>

            <div class="upload-wrapper">

                <input
                    type="file"
                    id="image"
                    accept=".svg,image/svg+xml"
                    hidden
                >

                <label
                    for="image"
                    class="upload-btn"
                >
                    Pilih File
                </label>

                <span
                    id="fileName"
                    class="upload-text"
                >
                    Belum ada file yang dipilih
                </span>

            </div>

        </div>

        <!-- Tombol -->
        <div class="action-row">

            <button
                type="submit"
                class="save-btn"
            >
                Simpan Perubahan
            </button>

            <button
                type="button"
                class="reset-btn"
            >
                Reset
            </button>

        </div>

    </form>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

const token = localStorage.getItem('token');

const foodId =
    window.location.pathname
    .split('/')[3];

let originalFood = null;

document.querySelectorAll('.tag-btn').forEach(btn => {

    btn.addEventListener('click', () => {

        btn.classList.toggle('active');

    });

});

document
.getElementById('image')
.addEventListener('change', function(){

    document.getElementById('fileName').textContent =
        this.files.length
        ? this.files[0].name
        : 'Belum ada file yang dipilih';

});

async function loadFood(){

    try{

        const response =
            await fetch(
                '/api/admin/foods/' + foodId,
                {
                    headers:{
                        'Authorization':
                            'Bearer ' + token,
                        'Accept':
                            'application/json'
                    }
                }
            );

        const food =
            await response.json();
        originalFood = food;
        console.log(originalFood);
        console.log(originalFood.tags);

        document
        .getElementById('name')
        .value = food.name;

        if(food.image_url){

            document
            .getElementById('fileName')
            .textContent =
                food.image_url
                .split('/')
                .pop();

        }

        document
        .querySelectorAll('.tag-btn')
        .forEach(btn => {

            const tagName =
                btn.innerText
                .trim()
                .toLowerCase();

            const found =
                food.tags.some(tag =>

                    tag.name
                    .toLowerCase()
                    ===
                    tagName

                );

            if(found){

                btn.classList.add(
                    'active'
                );

            }

        });

    }catch(error){

        console.log(error);

        alert(
            'Gagal memuat data makanan'
        );

    }

}

document
.getElementById('foodForm')
.addEventListener(
'submit',
async function(e){

    e.preventDefault();

    const name =
        document
        .getElementById('name')
        .value
        .trim();

    const tags_ids =
        Array.from(
            document.querySelectorAll(
                '.tag-btn.active'
            )
        ).map(btn =>
            Number(
                btn.dataset.id
            )
        );

    const formData =
        new FormData();

    formData.append(
        '_method',
        'PUT'
    );

    formData.append(
        'name',
        name
    );

    formData.append(
        'description',
        ''
    );

    formData.append(
        'is_available',
        '1'
    );

    formData.append(
        'tags_ids',
        JSON.stringify(tags_ids)
    );

    const image =
        document.getElementById(
            'image'
        );

    if(image.files.length){

        formData.append(
            'image',
            image.files[0]
        );
    }

    try{

        const response =
            await fetch(
                '/api/admin/foods/' + foodId,
                {
                    method:'POST',

                    headers:{
                        'Authorization':
                            `Bearer ${token}`,
                        'Accept':
                            'application/json'
                    },

                    body:formData
                }
            );

        const data =
            await response.json();

        if(response.ok){

                await Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Makanan berhasil diperbarui',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#b31212'
                });

            window.location.href =
                '/admin/dashboard';

        }else{

            alert(
                data.message ||
                'Gagal memperbarui makanan'
            );

        }

    }catch(error){

        console.error(error);

        alert(
            'Terjadi kesalahan server'
        );

    }

});

document
.querySelector('.reset-btn')
.addEventListener('click', function(e){

    e.preventDefault();

    if(!originalFood) return;

    // reset nama
    document.getElementById('name').value =
        originalFood.name;

    // hapus semua active
    document
    .querySelectorAll('.tag-btn')
    .forEach(btn => {

        btn.classList.remove('active');

    });

    // aktifkan kembali tag sesuai data awal
    originalFood.tags.forEach(tag => {

        document
        .querySelectorAll('.tag-btn')
        .forEach(btn => {

            if(
                btn.textContent.trim().toLowerCase() ===
                tag.name.trim().toLowerCase()
            ){
                btn.classList.add('active');
            }

        });

    });

    // reset file
    document.getElementById('image').value = '';

    document.getElementById('fileName').textContent =
        originalFood.image_url
        ? originalFood.image_url.split('/').pop()
        : 'Belum ada file yang dipilih';

});
loadFood();

</script>

@endsection
