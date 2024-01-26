<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak pdf Keluar</title>
</head>
<style>

    table, th{
        text-align: start
    }

    table, td{
        
    }

    body .isi{
        border: 2px solid black;
    }
    .isi, strong{
        text-align: center
    }
    .cont{
        text-align: left;
    }
    strong{
        color: black;
        font-size: 28px;
    }
    
    .isi{
        width: 370px;
  padding: 50px;
  margin: 20px;
  align-content: center;
    }
    .accept{
        text-align: end;
    }
    .accept h4{
        margin-right: 10px;
    }

    .cont p{
        line-height: 18px;
        text-align: start;
        
    }
    .ket {
        margin-top: 14px;
        text-align: left;
    }
</style>
<body>
    <div class="isi">
        <form action="" method="post">
            @csrf
            @method('PUT')
            <strong>Invoice Barang Keluar</strong> <br> <br> <br>
            <div class="cont">
                <div>
                    <table>
                    <tr>
                        <th> Id Barang</th>
                        <th>:</th>
                        <td>{{ $keluar->id }}</td>
                    </tr> 
                        
                    <tr>
                        <th> Nama Barang</th>
                        <th>:</th>
                        <td>{{ $keluar->Brng->nama_barang }}</td>
                    </tr> 

                    <tr>
                        <th> Tanggal</th>
                        <th>:</th>
                        <td>{{ $keluar->tanggal }}</td>
                    </tr>

                    <tr>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td>{{ $keluar->jumlah }}<span>/{{ $keluar->satuan }}</td>
                    </tr>

                    <tr>
                        <th> Keterangan</th>
                        <th>:</th>
                        <td>{{ $keluar->keterangan }}</td>
                    </tr>
                </table>

                    {{-- <p> <b>Id Barang : </b>{{ $keluar->id }}<p> <hr>
                    <p> <b> Nama Barang :  </b>{{ $keluar->Brng->nama_barang }}</p> <hr>
                    <p> <b> Tanggal : </b>{{ $keluar->tanggal }}</p> <hr>
                    <p> <b> Tanggal : </b>{{ $keluar->jumlah }}<span>/{{ $keluar->satuan }}</p> <hr>
                    <p> <b> Keterangan : </b>{{ $keluar->keterangan }}</p> --}}
                </div>
            </div>

            <div class="ket">
            <abbr>Barang telah dikeluarkan untuk diantarkan ke pelanggan dan pembeli tidak harus membayar upah kepada pengantar</abbr><br>
        </div>
            <div class="accept">
                <h4>Penerima</h4><br><br><br><br>
                <p>__________________</p>
            </div>
        </div>    
</body>

</html>
