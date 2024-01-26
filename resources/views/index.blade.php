<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data barang</title>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<style>
  .main{
      height: 100vh;
  }

  .sidebare{
      background: rgb(0, 89, 255);
      color: aliceblue;
  }
  .sidebare a{
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 19px;
  }
  </style>
<body>

  <div class="main d-flex flex-column justify-content-between">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: rgb(0, 82, 189)">
        <div class="container-fluid">
         
          <a class="navbar-brand" href="/">Data Barang</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> 
        </div>
      </nav>

      <div class="body-content h-100">
        <div class="row g-0 h-100">
            <div class="sidebare col-lg-2 collapse d-lg-block" id="menu">
              
                    <a href="/admin/barang/data-barang" class="badge float-start"><span data-feather="home"></span> Home</a>
                    <a href="/admin/masuk/data-masuk" class="badge float-start"><span data-feather="database"></span>Barang Masuk</a>
                    <a href="/admin/jenis/data-jenis" class="badge float-start"><span data-feather="grid"></span>Jenis</a>
                    <a href="/admin/keluar/data-keluar"class="badge float-start"><span data-feather="external-link"></span>Barang Keluar</a>
                    <a href="/logout"class="badge float-start"><span data-feather="log-out"></span>Logout</a>
                
            </div>

            <div class="container p-5 col-lg-10">
              <div class="card">
                <div class="card-header" style="background-color: rgb(0, 82, 189)">
                  <h3 style="color: aliceblue" class="text-center ">Data Barang</h3>
                </div>
                <!-- @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('massage') }}
                </div>
                @endif -->
                <div class="card-body">
                  <div style="overflow-x:auto;">
                    <div class="my-3 col-12 col-sm-8 col-md-6">
                      <form action="" method="get">
                        <div class="input-group mb-3">
                          <input class="form-control" type="search" name="Search" placeholder="Search by tanggal" aria-label="Search" id="floatingInputGroup1">
                          <button class="input-group-text btn-btn-primary" type="submit">Search</button>
                        </div>
                      </form>
                    </div>
                    {{-- <form action="" method="get">
                      <div class="input-group mb-3">
                        <select name="jenis" class="form-control">
                          <option value="">Pilih Jenis</option>
                          @foreach ($pilihanJenis as $item)
                              <option value="{{ $item->id }}">{{$item->nama_jenis}}</option>
                          @endforeach
                        </select>
                        <button class="input-group-text btn-btn-primary" type="submit">Search</button>
                      </div>
                    </form> --}}
                  {{-- <a href="/admin/barang/barang-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a> --}}
                  <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                  </button>
                  <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
                  <table class="table  table-hover">
                    <tr>
                                <td>No</td>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            @foreach ($barang as $datas)
                            <tr>   
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $datas -> nama_barang }}</td>
                                <td>{{ $datas-> deskripsi  }}</td>
                                <td>{{ $datas -> stock }}</td>
            
            
                                <td>
                                    <a href="/admin/barang/barang-edit/{{ $datas->id }}" class="btn btn-success" class="badge bg dark"><span data-feather="edit"></a>
                                    <a href="/admin/barang/data-delete/{{ $datas->id }}" class="btn btn-danger"class="badge bg-dark"><span data-feather="x-square"></a>
                                    @endforeach
                                </td>
                            </tr>
                          </table>
                          <div class="mt-5 d-flex justify-content-center">
                            <a class="btn btn-outline-success" href="/admin/barang/barang-export">Export</a>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
      </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/barang/data-barang" method="post">
          @csrf
          <div class="mb-3">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" name="nama_barang" id="nama_barang" class="form-control">
          </div>

          <div class="mb-3">
              <label for="deskripsi">Deskripsi</label>
              <input name="deskripsi" id="deskripsi" class="form-control" type="text">
          </div>

          <div class="mb-3">
              <label for="stock">Stock</label>
              <input name="stock" id="stock" class="form-control" type="number">
          </div>

          <div class="mb-3">
              <label for="jenis_id">Jenis</label>
              <select name="jenis_id" id="jenis_id" class="form-control" required>
                  <option value="">pilih jenis</option>
                  @foreach ($jenis as $item)
                      <option value="{{ $item->id}}">{{$item->nama_jenis}}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-3">
              <button class="btn btn-success" type="submit">Simpan</button>
              <a class="btn btn-danger" href="/admin/barang/data-barang">Cancel</a>
          </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
</div>
      
{{-- <div class="container mt-4">
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 style="color: aliceblue" class="text-center ">Data Barang</h3>
    </div>
    <!-- @if (Session::has('status'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('massage') }}
    </div>
    @endif -->
    <div class="card-body">
      <div style="overflow-x:auto;">
        <div class="my-3 col-12 col-sm-8 col-md-6">
          <form action="" method="get">
            <div class="input-group mb-3">
              <input class="form-control" type="search" name="Search" placeholder="Search by tanggal" aria-label="Search" id="floatingInputGroup1">
              <button class="input-group-text btn-btn-primary" type="submit">Search</button>
            </div>
          </form>
        </div>
      <a href="/admin/barang/barang-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a>
      <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
      <table class="table table-straped">
        <tr>
                    <td>No</td>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th colspan="2">Aksi</th>
                </tr>
                @foreach ($barang as $datas)
                <tr>   
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $datas -> nama_barang }}</td>
                    <td>{{ $datas-> deskripsi  }}</td>
                    <td>{{ $datas -> stock }}</td>


                    <td>
                        <a href="/admin/barang/barang-edit/{{ $datas->id }}" class="btn btn-warning">Edit</a>
                        <a href="/admin/barang/data-delete/{{ $datas->id }}" class="btn btn-danger">Hapus</a>
                        @endforeach
                    </td>
                </tr>
              </table>
              <div class="mt-5 d-flex justify-content-center">
                <a class="btn btn-outline-success" href="/admin/barang/barang-export">Export</a>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

      <script>
        feather.replace();
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>