
@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



            <div class="card">
                <div class="card-header"><span>Categorias</span>  <a href="{{route('category.create')}}" class="btn btn-success">+</a></div>

                <div class="card-body">
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ordenação</th>
                            <th scope="col-6">Ação</th>

                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($dices as $dice )


                          <tr  >
                            <th   scope="row">{{$dice->id}}</th>
                            <td>{{$dice->name}}</td>
                            <td>{{$dice->order}}</td>
                            <td style="display: flex;justify-content: space-between;"> <a href="{{route('category.show',$dice->id)}}" class="btn btn-info"><i class="fas fa-search"></i></a>
                                <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                 <form method="POST"  action="{{route('category.destroy',$dice->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></a></button>

                                 </form>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>


                </div>
            </div>
            <div >

            </div>
        </div>
    </div>
</div>

@endsection
