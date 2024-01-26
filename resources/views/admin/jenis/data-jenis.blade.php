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
                <div class="card-header" style="background-color: rgb(0, 82, 189)">
                  <h3 style="color: aliceblue" class="text-center ">Data Jenis</h3>
                </div>
                <div class="card-body">
                  <div style="overflow-x:auto;">
                    <div class="my-3 col-12 col-sm-8 col-md-6">
                      <form action="" method="get">
                        <div class="input-group mb-3">
                          <input class="form-control" type="search" name="Search" placeholder="Search by nama jenis" aria-label="Search" id="floatingInputGroup1">
                          <button class="input-group-text btn-btn-primary" type="submit">Search</button>
                        </div>
                      </form>
                    </div>
                    {{-- <a href="/admin/jenis/jenis-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a> --}}
                    <button type="button" class="btn btn-outline-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Tambah
                    </button>
                    <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
                    <table class="table table-straped">
                      <tr>
                                <td>No</td>
                                <th>Nama jenis</th>
                                <th colspan="2">Aksi</th>
                              </tr>
                            @foreach ($jenis as $datas)
                            <tr>   
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $datas -> nama_jenis }}</td>
                                <td>
                                    <a href="/admin/jenis/jenis-edit/{{ $datas->id }}" class="btn btn-success"><span data-feather="edit"></a>
                                    <a href="/admin/jenis/jenis-delete/{{ $datas->id }}" class="btn btn-danger"><span data-feather="x-square"></a>
                                    @endforeach
                                </td>
                            </tr>
                          </table>
                          <div class="mt-5 d-flex justify-content-center">
                            <a class="btn btn-outline-success" href="/admin/jenis/jenis-export">Export</a>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
      </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/jenis/data-jenis" method="post">
          @csrf
          <div class="mb-3">
              <label for="nama_jenis">Nama Jenis</label>
              <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" required placeholder="Isi jenis barang">
          </div>

          <div class="mb-3">
              <button class="btn btn-success" type="submit">Simpan</button>
              <a class="btn btn-danger" href="/admin/jenis/data-jenis">Cancel</a>
          </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
      
{{-- delete modal --}}

{{-- <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div >
          <h2 >Are You sure to delete jenis : {{ $jenis->nama_jenis }}</h2>
          <form style="display: inline-block" action="/admin/jenis/data-jenis/{{ $jenis->id }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-success">Delete</button>
          </form>
          <a href="/admin/jenis/data-jenis" class="btn btn-primary">Cancel</a>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}

{{-- <div class="container mt-4">
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 style="color: aliceblue" class="text-center ">Data Jenis</h3>
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
              <input class="form-control" type="search" name="Search" placeholder="Search by nama jenis" aria-label="Search" id="floatingInputGroup1">
              <button class="input-group-text btn-btn-primary" type="submit">Search</button>
            </div>
          </form>
        </div>
        <a href="/admin/jenis/jenis-add" class="btn btn-outline-primary mb-3 float-end">Tambah</a>
        <!-- <a href="#" class="btn btn-outline-success mb-3 float-end">Data Yang Sudah Di Hapus</a> -->
        <table class="table table-straped">
          <tr>
                    <td>No</td>
                    <th>Nama jenis</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                @foreach ($jenis as $datas)
                <tr>   
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $datas -> nama_jenis }}</td>
                    <td>
                        <a href="/admin/jenis/jenis-edit/{{ $datas->id }}" class="btn btn-warning">Edit</a>
                        <a href="/admin/jenis/jenis-delete/{{ $datas->id }}" class="btn btn-danger">Hapus</a>
                        @endforeach
                    </td>
                </tr>
              </table>
              <div class="mt-5 d-flex justify-content-center">
                <a class="btn btn-outline-success" href="/admin/jenis/jenis-export">Export</a>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      
      {{-- <form action="" method="get">
        <div class="input-group mb-3">
          <select name="jenis" class="form-control">
            <option value="">Pilih jenis</option>
            @foreach ($pilihanJenis as $item)
            <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
            @endforeach
          </select>
          <button class="input-group-text btn-btn-primary" type="submit">Search</button>
          </div>
      </form> --}}
      
      <script>
        feather.replace();
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>