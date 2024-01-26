<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Delete Barang Masuk {{ $keluar->Brng->nama_barang }}</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 flex-column">
        <h2 >Are You sure to delete data : {{ $keluar->Brng->nama_barang }}<span> Tanggal : {{ $keluar->tanggal }}</h2>
        <form style="display: inline-block" action="/admin/keluar/keluar-delete/{{ $keluar->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-success">Delete</button>
            <a href="/admin/keluar/data-keluar" class="btn btn-primary">Cancel</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>