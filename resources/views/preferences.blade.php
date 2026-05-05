<!DOCTYPE html>
<html>
<head>
    <title>FoodChoice - Search</title>
</head>
<body style="font-family:sans-serif; text-align:center; margin-top:50px;">

    <h1>🍔 Food Search</h1>

    <form method="GET" action="/search">
        <input type="text" name="keyword" placeholder="Cari makanan..." />
        
        <select name="tag">
            <option value="">Semua kategori</option>
            <option value="pedas">Pedas</option>
            <option value="manis">Manis</option>
            <option value="gurih">Gurih</option>
        </select>

        <button type="submit">Cari</button>
    </form>

    <hr>

    @if(request('keyword'))
        <h3>Hasil untuk: "{{ request('keyword') }}"</h3>
    @endif

</body>
</html>