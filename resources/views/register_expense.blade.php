@extends('master.master')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger items-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('despesas.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description" class="float-left">Descrição</label>
            <textarea class="form-control" name="description" id="description" cols="4" rows="3" ></textarea>
        </div>
        <div class="form-group">
            <label for="value" class="float-left">Valor</label>
            <input class="form-control" id="money" type="text" name="value" id="value" placeholder="00,00"/>
        </div>
        <div class="form-group">
            <label for="image" class="float-left">Imagem</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="form-group">
            <input class="btn btn-outline-dark btn-lg btn-block" type="submit" value="Registrar">
        </div>
    </form>
  
@endsection