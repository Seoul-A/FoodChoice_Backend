@extends('layouts.app')

@section('content')

<style>

    .title-area{
        display:flex;
        align-items:center;
        gap:18px;
        margin-top:10px;
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

    @media(max-width:700px){

        .empty-card{
            flex-direction:column;
            text-align:center;
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
    Makanan yang pernah kamu suka
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

<div class="empty-card">

    <div class="empty-icon">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#8B0000"
            stroke-width="2.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        >

            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>

        </svg>

    </div>

    <div>

        <div class="empty-title">
            Belum ada makanan yang kamu suka
        </div>

        <div class="empty-subtitle">

            Yuk temukan makanan favoritmu dan klik tombol

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

            untuk menyimpannya!

        </div>

    </div>

</div>

@endsection