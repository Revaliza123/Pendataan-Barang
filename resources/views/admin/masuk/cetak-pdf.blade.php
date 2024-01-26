{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Cetak pdf</title>
</head>
<body>
    <div class="mt-5 col-6 m-auto">
        <form action="" method="post">
            @csrf
            @method('PUT') 
            <strong style="text-align: center" class="underline">Invoice Barang Masuk</strong>
                <div class="container">
                    <div class="mt-5 mb-2">
                        <h6>Id Barang       :{{ $masuk->id }}</h6>
                        <h6>Nama Barang     :{{ $masuk->Barang->nama_barang }}</h6>
                        <h6>Tanggal         :{{ $masuk->tanggal }}</h6>
                        <h6>Tanggal         :{{ $masuk->jumlah }}<span>/{{ $masuk->satuan }}</h6>
                        <h6>Keterangan      :{{ $masuk->Keterangan }}</h6>
                    </div>
                </div>

                <p>Barang telah diterima oleh pegawai toko dan barang tiba dengan keadaan baik</p><br>
                <h4>Penerima</h4><br><br><br><br>
                <p>_________________________</p>

                
    
</body>
</html> --}}

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
        text-align: center;
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
        margin-right: 35px;
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
                        <td>{{ $masuk->id }}</td>
                    </tr> 
                        
                    <tr>
                        <th> Nama Barang</th>
                        <th>:</th>
                        <td>{{ $masuk->Barang->nama_barang }}</td>
                    </tr> 

                    <tr>
                        <th> Tanggal</th>
                        <th>:</th>
                        <td>{{ $masuk->tanggal }}</td>
                    </tr>

                    <tr>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td>{{ $masuk->jumlah }}<span>/{{ $masuk->satuan }}</td>
                    </tr>

                    <tr>
                        <th> Keterangan</th>
                        <th>:</th>
                        <td>{{ $masuk->keterangan }}</td>
                    </tr>
                </table>

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
