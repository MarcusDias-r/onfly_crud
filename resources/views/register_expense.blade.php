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
            <label for="money" class="float-left">Valor</label>
            <input class="form-control" id="money" type="text" name="value" placeholder="00,00" required/>
        </div>
        
        <div class="row">

            <div class="form-group col-md-6">
                <label for="date" class="float-left">Data</label>
                <input class="form-control" id="date" type="text" name="date" placeholder="01/03/1999" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="time" class="float-left">Hora</label>
                <input class="form-control" id="time" type="text" name="time" placeholder="00:00" />
            </div>

        </div>

        <div class="form-group">
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