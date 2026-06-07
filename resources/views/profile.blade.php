@extends('layouts.app')

@section('content')

<style>

    .profile-container{
        display:flex;
        justify-content:center;
        padding:20px;
    }

    .profile-card{
        width:100%;
        max-width:650px;
        background:#fff;
        border-radius:16px;
        padding:30px;
        box-shadow:0 4px 15px rgba(0,0,0,.08);
    }

    .profile-top{
        display:flex;
        flex-direction:column;
        align-items:center;
        text-align:center;
        gap:20px;
    }

    .profile-avatar{
        width:110px;
        height:110px;
        border-radius:50%;
        background:#d9d9d9;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
    }

    .profile-avatar svg{
        width:70px;
        height:70px;
        fill:#666;
    }

    .profile-info{
        text-align:center;
    }

    .profile-name{
        font-size:28px;
        font-weight:bold;
        color:#222;
        margin-bottom:8px;
    }

    .profile-email{
        color:#666;
        font-size:17px;
        margin-bottom:20px;
    }

    .logout-btn{
        background:#b30000;
        color:white;
        border:none;
        border-radius:25px;
        padding:12px 35px;
        font-size:15px;
        font-weight:600;
        cursor:pointer;
        text-decoration:none;
        display:inline-block;

        min-width:140px;

        box-shadow:0 4px 12px rgba(179,0,0,0.25);

        transition:
            background 0.3s ease,
            transform 0.2s ease,
            box-shadow 0.3s ease;
    }

    .logout-btn:hover{
        background:#8b0000;
        transform:translateY(-3px);
        box-shadow:0 8px 18px rgba(179,0,0,0.35);
    }

    .logout-btn:active{
        transform:translateY(1px);
        box-shadow:0 2px 6px rgba(179,0,0,0.25);
    }

    @media(max-width:768px){

        .profile-card{
            padding:25px;
        }

        .profile-email{
            font-size:15px;
        }


    }

</style>

<div class="profile-container">

    <div class="profile-card">

        <div class="profile-top">

            <!-- FOTO PROFIL -->
            <div class="profile-avatar">

                <svg viewBox="0 0 24 24">
                    <path d="M12 12c2.76 0 5-2.24 5-5S14.76 2 12 2 7 4.24 7 7s2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
                </svg>

            </div>

            <!-- DATA USER -->
            <div class="profile-info">

                <div class="profile-name">
                     {{ $user?->name ?? 'User' }}
                </div>

                <div class="profile-email">
                    ✉ {{ $user?->email ?? '-' }}
                </div>

                <a
                    href="#"
                    class="logout-btn"
                    style="text-decoration:none;"
                    onclick="openLogoutModal()"
                >
                    Logout
                </a>

            </div>

        </div>

    </div>

</div>
<!-- MODAL LOGOUT -->

<div
    id="logoutModal"
    style="
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.45);
        justify-content:center;
        align-items:center;
        z-index:999;
    "
>

    <div
        style="
            background:white;
            width:350px;
            border-radius:18px;
            padding:25px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,.15);
        "
    >

        <h3
            style="
                margin-bottom:12px;
                color:#222;
            "
        >
            Logout
        </h3>

        <p
            style="
                color:#666;
                margin-bottom:25px;
            "
        >
            Apakah Anda yakin ingin keluar?
        </p>

        <div
            style="
                display:flex;
                justify-content:center;
                gap:10px;
            "
        >

            <button
                onclick="closeLogoutModal()"
                style="
                    padding:10px 20px;
                    border:none;
                    background:#e5e5e5;
                    border-radius:10px;
                    cursor:pointer;
                    font-weight:600;
                "
            >
                Batal
            </button>

            <button
                onclick="logout()"
                style="
                    padding:10px 20px;
                    border:none;
                    background:#b30000;
                    color:white;
                    border-radius:10px;
                    cursor:pointer;
                    font-weight:600;
                "
            >
                Logout
            </button>

        </div>

    </div>

</div>
<script>

function openLogoutModal(){

    document
        .getElementById('logoutModal')
        .style.display = 'flex';

}

function closeLogoutModal(){

    document
        .getElementById('logoutModal')
        .style.display = 'none';

}

function logout(){

    localStorage.removeItem('token');
    localStorage.removeItem('user');

    window.location.href = '/login';

}

</script>

@endsection