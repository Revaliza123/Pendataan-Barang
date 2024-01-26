<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Data Masuk {{ $keluar->Brng->nama_barang }}</title>
</head>
<body>
    <div class="mt-5 col-6 m-auto">
        <form action="/admin/keluar/data-keluar/{{ $keluar->id }}" method="post">
            @csrf
            @method('PUT') 
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                    <div class="mb-3">
                        <label for="id_barang">Nama Barang</label>
                        <select name="id_barang" id="id_barang" class="form-control">
                            <option value="{{ $keluar->Brng->id }}">{{ $keluar->Brng->nama_barang }}</option>
                             @foreach ($barang as $item)
                                <option value="{{ $item->id_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control" type="date" value="{{ $keluar->tanggal }}">
                    </div>
        
                    <div class="mb-3">
                        <label for="jumlah">Jumlah</label>
                        <input name="jumlah" id="jumlah" class="form-control" type="number" placeholder="Masukan Jumlah Barang" value="{{ $keluar->jumlah }}">
                    </div>
        
                    <div class="mb-3">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control">
                            <option value="{{ $keluar->satuan }}">{{ $keluar->satuan }}</option>
                            <option value="kardus">kardus</option>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="keterangan">keterangan</label>
                        <input name="keterangan" id="keterangan" class="form-control" type="text" placeholder="keterangan" value="{{ $keluar->keterangan }}">
                    </div>
        
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Simpan</button>
                        <a class="btn btn-danger" href="/admin/keluar/data-keluar">Cancel</a>
                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>