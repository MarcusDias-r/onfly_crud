@extends('master.master')
@section('content')
    <form method="POST" action="{{route('despesas.update',['despesa' => $data->id])}}" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        @if($data->image)
            <input type="hidden" name="img_name" value="{{$data->image}}">
        
            <span>Imagem atual</span>
            <div class="mt-2">
                <img src="{{asset('storage/images/'.$data->image)}}" width="200px" class="rounded">
            </div>
        @endif

        <div class="form-group">
            <label for="description" class="float-left">Descrição</label>
            <textarea class="form-control" name="description" id="description" cols="4" rows="3" required="required">{{$data->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="value" class="float-left">Valor</label>
            <input class="form-control" id="money" type="text" name="value" id="value" value="{{number_format($data->value, 2)}}" required/>
        </div>
        <div class="form-group">
            <label for="image" class="float-left">Imagem</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="form-group">
            <input class="btn btn-outline-dark btn-lg btn-block" type="submit" value="Editar">
        </div>
     
    </form>

@endsection