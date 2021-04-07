@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Categoria  {{$category->name}}</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>


                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input value="{{$category->name}}" disabled name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o Nome">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Ordem</label>
                        <input value="{{$category->order}}" disabled name="order" type="number" class="form-control" id="exampleInputPassword1" placeholder="Digite a prioridade da categoria">
                      </div>


                    </div>
                    <!-- /.card-body -->


                  </form>
                  <img  src="{{ asset('storage/'.$category->photo) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
