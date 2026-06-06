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
        border:1px solid #d9d9d9;
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
        border:1px solid #d9d9d9;
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
        border:1px solid #d9d9d9;
        color:#b31212;
        cursor:pointer;
        background:white;
        border-radius:4px 0 0 4px;
        font-size:16px;
    }

    .upload-text{
        border:1px solid #d9d9d9;
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
        border:1px solid #d9d9d9;
        padding:12px 24px;
        border-radius:4px;
        cursor:pointer;
        font-size:16px;
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
    Tambah Data Makanan
</h2>

<div class="food-card">

    <form id="foodForm">

        <!-- Nama -->
        <div class="form-row">

            <label class="form-label">
                Nama Makanan
                <span style="color:red;" display:inline>
                    *
                </span>
            </label>

            <input
                type="text"
                id="name"
                class="form-input"
                placeholder="Contoh: Nasi Goreng Spesial"
                required
            >

        </div>

        <!-- Tipe -->
        <div class="form-row">

            <label class="form-label">
                Tipe
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn" data-id="1">Makanan Berat</button>
                <button type="button" class="tag-btn" data-id="2">Camilan</button>
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
                <span style="color:red;" display:inline>
                    *
                </span>
            </label>

            <div class="upload-wrapper">

                <input
                    type="file"
                    id="image"
                    accept=".svg,image/svg+xml"
                    required
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
                Tambah Makanan
            </button>

            <button
                type="reset"
                class="reset-btn"
            >
                Reset
            </button>

        </div>

    </form>

</div>

</div>

<script>

const token =
    localStorage.getItem(
        'token'
    );

// TAG ACTIVE
document
.querySelectorAll('.tag-btn')
.forEach(btn => {

    btn.addEventListener(
    'click',
    function(){

        this.classList.toggle(
            'active'
        );
    });

});

// FILE NAME
document
.getElementById(
    'image'
)
.addEventListener(
'change',
function(){

    document
    .getElementById(
        'fileName'
    )
    .textContent =
    this.files.length
        ? this.files[0].name
        : 'Belum ada file yang dipilih';

});

// RESET
document
.querySelector(
    '.reset-btn'
)
.addEventListener(
'click',
function(){

    setTimeout(() => {

        document
        .querySelectorAll(
            '.tag-btn'
        )
        .forEach(btn => {

            btn.classList.remove(
                'active'
            );

        });

        document
        .getElementById(
            'fileName'
        )
        .textContent =
        'Belum ada file yang dipilih';

        document
        .getElementById(
            'image'
        ).value = '';

    }, 0);

});

// SUBMIT
document
.getElementById(
    'foodForm'
)
.addEventListener(
'submit',
async function(e){

    e.preventDefault();

    const saveBtn =
        document.querySelector(
            '.save-btn'
        );

    const allInputs =
        document.querySelectorAll(
            'input, button'
        );

    const name =
        document
        .getElementById(
            'name'
        )
        .value
        .trim();

    if(name === ''){

        alert(
            'Nama makanan wajib diisi'
        );

        return;
    }

    // ambil tag aktif
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

    if(tags_ids.length === 0){

        alert(
            'Pilih minimal 1 tag'
        );

        return;
    }

    const image =
        document
        .getElementById(
            'image'
        );

    if(!image.files.length){

        alert(
            'Gambar wajib diupload'
        );

        return;
    }

    const file =
        image.files[0];

    if(
        file.type !==
        'image/svg+xml'
    ){

        alert(
            'Format gambar harus SVG'
        );

        return;
    }

    // disable semua
    allInputs.forEach(el => {
        el.disabled = true;
    });

    saveBtn.textContent =
        'Loading...';

    try{

        const formData =
            new FormData();

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
            'image',
            file
        );

        tags_ids.forEach(id => {

            formData.append(
                'tags_ids',
                JSON.stringify(
                    tags_ids
                )
            );
        });

        const response =
            await fetch(
            '/api/admin/foods',
            {
                method:'POST',

                headers:{
                    'Authorization':
                        `Bearer ${token}`,

                    'Accept':
                        'application/json'
                },

                body: formData
            });

        const data =
            await response.json();

        if(response.ok){

            alert(
                'Makanan berhasil ditambahkan'
            );

            document
            .getElementById(
                'foodForm'
            )
            .reset();

            document
            .querySelectorAll(
                '.tag-btn'
            )
            .forEach(btn => {

                btn.classList.remove(
                    'active'
                );

            });

            document
            .getElementById(
                'fileName'
            )
            .textContent =
                'Belum ada file yang dipilih';

        }else{

            if(data.errors){

                alert(
                    'Terjadi kesalahan'
                );
            }else{

                alert(
                    data.message ??
                    'Terjadi kesalahan'
                );
            }
        }

    }catch(error){

        console.error(error);

        alert(
            'Terjadi kesalahan server'
        );

    }finally{

        // enable lagi
        allInputs.forEach(el => {
            el.disabled = false;
        });

        saveBtn.textContent =
            'Tambah Makanan';
    }
});

</script>
@endsection
