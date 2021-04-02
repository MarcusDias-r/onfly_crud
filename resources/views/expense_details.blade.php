@extends('master.master')
@section('content')
<div class="relative ">
  <div class="card mb-3" style="max-width: 700px; margin: 0 auto;" >
      
    @if($data->image)
      <img class="card-img-top" src="{{asset('storage/images/'.$data->image)}}">
    @endif
     
      <div class="card-body">
        <h5 class="card-title">R${{number_format($data->value,2, ',','.')}}</h5>
        <p class="card-text">{{$data->description}}</p>
        <p class="card-text"><small class="text-muted">Registrado por {{$user->name}} no dia: {{date_format($data->created_at, "d/m/Y \a\s H:i")}} </small></p>
      </div>
      <form action="{{route('despesas.destroy',['despesa' => $data->id])}}" method="POST">
        @csrf
        {!! method_field('delete')!!}
        <div class="btn-group">
            <a class="btn btn-outline-info" href="{{route('despesas.edit',['despesa' => $data->id])}}">Editar</a>
            <button class="btn btn-outline-info" onclick="return confirm('Se prosseguir irá excluir esse registro')">Excluir</button>
        </div>
      </form>
    </div>
</div>

@endsection

