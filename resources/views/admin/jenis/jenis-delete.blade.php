<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Delete Data</title>
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
    <div class="d-flex justify-content-center align-items-center vh-100 flex-column">
        <form style="display: inline-block" action="/admin/jenis/jenis-delete/{{ $jenis->id }}" method="post">
            @csrf
            @method('delete')
            <h2 >Are You sure to delete jenis : {{ $jenis->nama_jenis }}</h2>
            <button type="submit" class="btn btn-success">Delete</button>
            <a href="/admin/jenis/data-jenis" class="btn btn-primary">Cancel</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>