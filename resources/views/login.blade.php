<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body{
        margin: 0;
        padding: 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background: linear-gradient(120deg,#0a17c4, grey);
        height: 100vh;
        overflow: hidden;
     }
     .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: rgb(255, 255, 255);
        border-radius: 10px;
        height: 320px;
        
     }
     
     .center h1{
        text-align: center;
        padding: 0 0 20px 0;
        border-bottom: 1px solid rgb(58, 7, 201);
     }
     .center h4{
        text-align: center;
        padding: 0 0 20px 0;
     }
     .center form{
        padding: 0 40px;
        box-sizing: border-box;
     }
      form .txt_field{
         position: relative;
         border-bottom: 2px solid #0220c9;
         margin: 30px 0;
     }
     .txt_field input{
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
     }
     .txt_field label{
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .4s;
     }
     .txt_field span::before{
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background:#1100ff;
        transition: .4s;
     }
     .txt_field input:focus~ label,
     .txt_field input:valid~ label{
        top: -5px;
        color: rgb(0, 2, 148);
     }
     .txt_field input:focus~ ::before,
     .txt_field input:valid~ ::before{
        width: 100%;
     }
     input[type="submit"]{
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: rgb(7, 48, 184);
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
     }
     input[type="submit"]:hover{
        border-color: #263bd9;
        transition: .4s;
     } 
    </style>
</head>
<body>
 
    <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
        <h4 class="p-3">Login</h4>
        @if (Session::has('status'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('massage') }}
        </div>
        @endif

        <div class="row">
            .col-md-2
        </div>
        {{-- <div class="center">
            <form action="" method="post">
                @csrf
                <h2 style="text-align: center;">LOGIN</h2>
                <div class="txt_field">
                    <input type="email" name="email" id="email"  required>
                    <span></span>
                    <label>Email: </label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" id="password"  required">
                    <span></span>
                    <label>Password: </label>
                </div>
                <input type="submit" value="Login" name="proseslog">
            </form>    
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>