<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Choice</title>

    <style>

        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#f4f4f4;
        }

        /* HEADER */

        .header{
            background:white;
            height:90px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 22px;
            border-bottom:1px solid #ddd;
            position:sticky;
            top:0;
            z-index:100;
        }

        .header-btn{
            margin-top:4px;
            width:45px;
            height:45px;
            display:flex;
            align-items:center;
            justify-content:center;
            text-decoration:none;
        }
        .back-btn-area{
            margin-left:20px;
        }

        .search-btn-area{
            margin-right:20px;
        }

        /* BACK ICON */

        .back-icon{
            font-size:56px;
            color:#8B0000;
            font-weight:300;
            line-height:1;
            font-family:Arial, sans-serif;
            margin-top:-2px;
            margin-left:8px;
        }


        /* LOGO */

        .header-logo{
            position:absolute;
            left:50%;
            transform:translateX(-50%);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .header-logo img{
            margin-top:4px;
            height:55px;
            object-fit:contain;
        }

        /* CONTENT */

        .content{
            min-height:80vh;
            padding:20px;
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

    </style>
</head>
<body>

    <!-- HEADER -->

    <div class="header">

        <!-- BACK -->

        <a href="javascript:history.back()"
        class="header-btn back-btn-area">

            <span class="back-icon">
                ‹
            </span>

        </a>

        <!-- LOGO -->

        <div class="header-logo">

            <img src="{{ asset('image/logo.svg') }}"
            alt="Food Choice Logo">

        </div>

        <!-- SEARCH -->

        <div class="header-btn search-btn-area">

            <div class="search-icon"></div>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        @yield('content')

    </div>

    <!-- FOOTER -->

    <div class="footer">

        ⚙ Sistem Rekomendasi Berbasis Preferensi <br>
        made by <br>
        kelompok 9

    </div>

</body>
</html>