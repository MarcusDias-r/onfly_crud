@extends('master.master')
@section('content')
<style>
  .description{
          max-width: 20ch;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
        };
</style>
<table class="table table-responsive-sm">
    <thead>
      <tr>
        <a class="btn btn-outline-dark btn-lg btn-block mb-3" href="{{route('despesas.create')}}">Registrar Despesa</a>
      </tr>

      @if(count($records) === 0)
        <div class="alert alert-warning" role="alert">
          Não há nenhuma despesa cadastrada. Pressione o botão acima para começar
        </div>
      @endif 

      <tr>
        <th scope="col">Imagem</th>
        <th scope="col">Descrição</th>
        <th scope="col">Autor</th>
        <th scope="col">Valor</th>
        <th scope="col">Data de Registro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($records as $r)

      @php
        foreach($users as $u){
          if($u->id === $r->user_id){
            $autor = $u->name; 
            break;
          }
        }
      @endphp

        <tr>
          <td class="align-middle">
            @if($r->image)
              <img src="{{'storage/images/'.$r->image}}" class="rounded " style="max-width:120px; max-height: 120px">
            @endif
          </td>
            <td class="align-middle description">{{$r->description}}</td>
            <td class="align-middle">{{$autor}}</td>
            <td class="align-middle">R${{number_format($r->value,2, ',','.')}}</td>

          @php
            $date = date_create($r->expense_date);
          @endphp

          <td class="align-middle">{{date_format($date, "d/m/Y \à\s H:i")}}</td>
          <td class="align-middle">
            <form action="{{route('despesas.destroy',['despesa' => $r->id])}}" method="POST">
              @csrf
              {!! method_field('delete')!!}
              <div class="btn-group">
                <a class="btn btn-outline-info" href="{{route('despesas.show', ['despesa' => $r->id])}}">Detalhes</a>
                <a class="btn btn-outline-info" href="{{route('despesas.edit', ['despesa' => $r->id])}}">Editar</a>
                <button class="btn btn-outline-info" onclick="return confirm('Se prosseguir irá excluir esse registro')">Excluir</button>
              </div>
            </form>
          </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
  
@endsection