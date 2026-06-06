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
        grid-template-columns:140px 1fr;
        gap:20px;
        margin-bottom:22px;
        align-items:start;
    }

    .form-label{
        font-weight:600;
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

                <button type="button" class="tag-btn">
                    Makanan Berat
                </button>

                <button type="button" class="tag-btn">
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

                <button type="button" class="tag-btn">Kuah</button>
                <button type="button" class="tag-btn">Kering</button>
                <button type="button" class="tag-btn">Nyemek</button>
                <button type="button" class="tag-btn">Bakar</button>

            </div>

        </div>

        <!-- Rasa -->
        <div class="form-row">

            <label class="form-label">
                Rasa
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn">Asin</button>
                <button type="button" class="tag-btn">Manis</button>
                <button type="button" class="tag-btn">Pedas</button>

            </div>

        </div>

        <!-- Bahan -->
        <div class="form-row">

            <label class="form-label">
                Bahan Utama
            </label>

            <div class="button-group">

                <button type="button" class="tag-btn">Nasi</button>
                <button type="button" class="tag-btn">Mi</button>
                <button type="button" class="tag-btn">Sapi</button>
                <button type="button" class="tag-btn">Ayam</button>
                <button type="button" class="tag-btn">Sayur</button>
                <button type="button" class="tag-btn">Seafood</button>
                <button type="button" class="tag-btn">Kambing</button>
                <button type="button" class="tag-btn">Ikan</button>
                <button type="button" class="tag-btn">Lontong</button>

            </div>

        </div>

        <!-- Upload -->
        <div class="form-row">

            <label class="form-label">
                Gambar
            </label>

            <div class="upload-wrapper">

                <input
                    type="file"
                    id="image"
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

    document
    .querySelector('.reset-btn')
    .addEventListener('click', function(){

        setTimeout(() => {

            document
            .querySelectorAll('.tag-btn')
            .forEach(btn => {

                btn.classList.remove('active');

            });

            document.getElementById('fileName').textContent =
                'Belum ada file yang dipilih';

            document.getElementById('image').value = '';

        }, 0);

    });

</script>

@endsection
