<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>yasu-meshi</title>
  </head>

@if(Auth::check())
  
<style>
      .nav-item{
            font-weight: bold;
            font-size:50px;
            margin:20px 20px 0 50px;
            z-index: 20;
      }

      nav{
            background: url("/storage/images/katudonimg.jpg");
            z-index: 1;
            opacity: 0.7;
            background-position:center;
            background-size:contain;
        }
      
</style>

<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 300px;" >
    <a class="navbar-brand" style=" margin-left: 150px; font-size:80px;" href="#">安飯</a>
    <p class="h4" style="margin-top: 10px; font-size:20px;">～yasu - meshi ～</p>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <p class="nav-link active" style="margin-left:350px;" aria-current="page"><?= Auth::user()->name;  ?>さん</p>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="{{ route('mypage') }}">my献立一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">ログアウト</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


@else

<style>
     .h4{
         margin-left: 30px;
     }

     .backimg{
            background: url("../../../public/images/katudonimg.jpg");
            z-index: 1;
            opacity: 0.7;
        }
  </style>
<body>

</div>

<div class="backimg d-flex align-items-center justify-content-center" style="height: 500px;">
    <h1 class=" display-1" >安飯</h1>
    <p class="h4">～yasu - meshi ～</p>
</div>

@endif

@yield('content')

<p class="d-flex align-items-center justify-content-center bg-warning" style="height: 100px; width:100%;">
    Copyright© Hiroki kanatsu. All Rights Reserved</p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   
