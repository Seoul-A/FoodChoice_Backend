@extends('layouts.app')

@section('content')

<style>

    .profile-container{
        display:flex;
        justify-content:center;
        padding:20px;

        min-height:calc(100vh - 230px);
        padding:20px;
        box-sizing:border-box;
    }
    .content{
        overflow:hidden;
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

                <a href="/login" class="logout-btn" style="text-decoration:none;">
                    Logout
                </a>

            </div>

        </div>

    </div>

</div>

@endsection