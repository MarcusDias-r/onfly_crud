@extends('master.master')
@section('content')
<div class="relative ">
  <div class="card mb-3" style="max-width: 700px; margin: 0 auto;" >
      <img class="card-img-top" src="{{asset('storage/images/'.$data->image)}}"  >
      <div class="card-body">
        <h5 class="card-title">R${{str_replace(".", ",", $data->value )}}</h5>
        <p class="card-text">{{$data->description}}</p>
        <p class="card-text"><small class="text-muted">Registrado por {{$user->name}} no dia: {{date_format($data->created_at, "d/m/Y \a\s H:i")}} </small></p>
      </div>
      <div class="btn-group">
          <a class="btn btn-outline-info" href="{{route('despesas.edit',['despesa' => $data->id])}}">Editar</a>
          <a class="btn btn-outline-info" href="#">Excluir</a>
      </div>
    </div>
</div>

@endsection

