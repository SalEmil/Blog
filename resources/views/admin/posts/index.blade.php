@extends('admin.layouts.laymain')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Гланая</a></li>
                            <li class="breadcrumb-item active">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-1 mb-3">
                        <a href="{{route('admin.post.create')}}" type="submit" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">


                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3" class="text-center">Действие</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><a href="{{route('admin.post.show',$post->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.post.edit',$post->id)}}"><i
                                                        class="fas fa-pencil-alt text-success "></i></a></td>
                                            <td>
                                                <form action="{{route('admin.post.delete',$post->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i class="fas fa-trash text-danger  " role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                    <!-- ./col -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
