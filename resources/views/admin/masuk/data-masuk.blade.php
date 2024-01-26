<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
         
          <a class="navbar-brand" href="#">Data Barang</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> 
        </div>
      </nav>

      <div class="body-content h-100">
        <div class="row g-0 h-100">
            <div class="sidebare col-lg-2 collapse d-lg-block" id="menu">
                
              <a href="/" class="badge float-start"><span data-feather="home"></span> Home</a>
              <a href="/admin/barang/data-barang" class="badge float-start"><span data-feather="package"></span>Barang</a>
              <a href="/admin/masuk/data-masuk" class="badge float-start"><span data-feather="database"></span>Barang Masuk</a>
              <a href="/admin/jenis/data-jenis" class="badge float-start"><span data-feather="grid"></span>Jenis</a>
              <a href="/admin/keluar/data-keluar"class="badge float-start"><span data-feather="external-link"></span>Barang Keluar</a>
              <a href="/logout"class="badge float-start"><span data-feather="log-out"></span>Logout</a>
            </div>

            <div class="container p-5 col-lg-10">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if (Session::has('status'))
               <div class="alert alert-success" role="alert">
                 {{ Session::get('message') }}
               </div>
               @endif
              <div class="card">
                <div class="card-header" style="background-color:rgb(0, 82, 189)">
                  <h3 style="color: aliceblue" class="text-center ">Data Barang Masuk</h3>
                </div>
                  <div class="card-body">
                    <div style="overflow-x:auto;">
                      <div class="my-3 col-12 col-sm-8 col-md-6">
                        <form action="" method="get">
                          <div class="input-group mb-3">
                            <input class="form-control" type="search" name="Search" placeholder="Search by bulan" aria-label="Search" id="floatingInputGroup1">
                            <input type="date" name="date" class="form-control">
                            <button class="input-group-text btn-btn-primary" type="submit">Search</button>
                          </div>
                        </form>
                      </div>
                      {{-- <a href="/admin/masuk/masuk-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a> --}}
                      <button type="button" class="btn btn-outline-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                      </button>
                  <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
                  <table class="table table-straped">
                    <tr>
                                <td>No</td>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>satuan</th>
                                <th>keterangan</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            @foreach ($masuk as $datas)
                            <tr>   
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $datas -> Barang->nama_barang }}</td>
                                <td>{{ $datas->  tanggal }}</td>
                                <td>{{ $datas -> jumlah }}</td>
                                <td>{{ $datas -> satuan }}</td>
                                <td>{{ $datas -> keterangan }}</td>
            
            
                                <td>
                                    <a href="/admin/masuk/masuk-edit/{{ $datas->id }}" class="btn badge bg-success"><span data-feather="edit"></a>
                                    <a href="/admin/masuk/masuk-delete/{{ $datas->id }}" class="btn badge bg-danger"><span data-feather="x-square"></a> 
                                    <a href="/admin/masuk/export-pdf/{{ $datas->id }}" class="btn" style="background-color:rgb(255, 255, 255)"><img src="/file-pdf.png"></a>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <div class="mt-5 d-flex justify-content-center">
                          <a class="btn btn-outline-success" href="/admin/masuk/masuk-export">Export</a>
                        </div>
                        </div>
                        <div class="my-3">
                          {{ $masuk->withQueryString()->links() }}
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
        <form action="/admin/masuk/data-masuk" method="post">
          @csrf
          <div class="mb-3">
              <label for="id_barang">Nama Barang</label>
              <select name="id_barang" id="id_barang" class="form-control">
                  <option value="">Pilih barang</option>
                   @foreach ($barang as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-3">
              <label for="tanggal">Tanggal</label>
              <input name="tanggal" id="tanggal" class="form-control" type="date">
          </div>

          <div class="mb-3">
              <label for="jumlah">Jumlah</label>
              <input name="jumlah" id="jumlah" class="form-control" type="number" placeholder="Masukan Jumlah Barang">
          </div>

          <div class="mb-3">
              <label for="satuan">Satuan</label>
              <select name="satuan" id="satuan" class="form-control">
                <option value="">Pilih Satuan</option>
                <option value="kg">Kg</option>
                <option value="gr">gr</option>
                <option value="Buah">Buah</option>
                <option value="Box">Box</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="keterangan">keterangan</label>
              <input name="keterangan" id="keterangan" class="form-control" type="text" placeholder="keterangan">
          </div>

          <div class="mb-3">
              <button class="btn btn-success" type="submit">Simpan</button>
              <a class="btn btn-danger" href="/admin/masuk/data-masuk">Cancel</a>
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
      <h3 style="color: aliceblue" class="text-center ">Data Barang Masuk</h3>
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
          <a href="/admin/masuk/masuk-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a>
      <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
      <table class="table table-straped">
        <tr>
                    <td>No</td>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>satuan</th>
                    <th>keterangan</th>
                    <th colspan="2">Aksi</th>
                </tr>
                @foreach ($masuk as $datas)
                <tr>   
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $datas -> Barang->nama_barang }}</td>
                    <td>{{ $datas->  tanggal }}</td>
                    <td>{{ $datas -> jumlah }}</td>
                    <td>{{ $datas -> satuan }}</td>
                    <td>{{ $datas -> keterangan }}</td>


                    <td>
                        <a href="/admin/masuk/masuk-edit/{{ $datas->id }}" class="btn btn-warning">Edit</a>
                        <a href="/admin/masuk/masuk-delete/{{ $datas->id }}" class="btn btn-danger">Hapus</a> 
                        <a href="/admin/masuk/export-pdf/{{ $datas->id }}" class="btn btn-primary">Cetak</a>
                        @endforeach
                    </td>
                </tr>
            </table>
            <div class="mt-5 d-flex justify-content-center">
              <a class="btn btn-outline-success" href="/admin/masuk/masuk-export">Export</a>
            </div>
            </div>
        </div>
    </div>
</div> --}}

<script>
  feather.replace();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>