<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
   
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
</head>
<body class="pt-5">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top px-5">
        <a class="navbar-brand" href="{{route('despesas.index')}}">Despesas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     
        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
          <ul class="navbar-nav">
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} </a>
              <div class="dropdown-menu " aria-labelledby="dropdown01">
                <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
               </div>
            </li>
          </ul>
        </div>
    
      </nav>
  
   