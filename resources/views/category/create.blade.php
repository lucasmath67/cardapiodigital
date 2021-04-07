@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionar Categoria</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  @if ($errors->any())
                      <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  <form method="POST"   action="{{route('category.store')}}   " enctype="multipart/form-data">

                    @csrf

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input name="name" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o Nome">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Ordem</label>
                        <input name="order" required type="number" class="form-control" id="exampleInputPassword1" placeholder="Digite a prioridade da categoria">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input required type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                            <label  class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>

                        </div>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
