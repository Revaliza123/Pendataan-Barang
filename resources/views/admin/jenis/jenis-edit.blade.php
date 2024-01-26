<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Barang</title>
</head>
<body>
    <div class="mt-5 col-6 m-auto">
        <form action="/admin/jenis/data-jenis/{{ $jenis->id }}" method="post">
            @csrf
            @method('PUT') 
            <div class="mb-3">
                <label for="nama_jenis">Nama Jenis</label>
                <input name="nama_jenis" id="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}">   
            </div>
    
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a class="btn btn-danger" href="/admin/jenis/data-jenis">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>