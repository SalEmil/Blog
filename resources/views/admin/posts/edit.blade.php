@extends('admin.layouts.laymain')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <div class="col-12">

                        <form action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group w-25">
                                <input type="text" name="title" class="form-control" placeholder="Название категории"
                                       value="{{$post->title}}">
                            </div>
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror


                            <div class="form-group">
                                <form method="post">
                                <textarea id="summernote" name="content">
                                     {{$post->content}}
                                </textarea>
                                </form>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить превью</label>
                                    <div class="w-75">
                                        <img src="{{asset('storage/'. $post->preview_image) }}" alt="preview_image" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_image">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить главное изображение</label>
                                    <div class="w-75">
                                        <img src="{{url('storage/'. $post->main_image) }}" alt="main_image" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image">
                                            <label class="custom-file-label">Выберите главное изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                                <div class="form-group w-50">
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control">
                                        @foreach( $categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$category->id == $post->category_id ? 'selected': ''}}>{{$category->title}}</option>
                                        @endforeach

                                    </select>

                                    <div class="form-group">
                                        <label>Теги </label>
                                        <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}"  {{$tag->id == old('tagIds') ? 'selected': ''}}>{{$tag->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <input type="submit" class="btn btn-primary" value="Обновить">
                                </div>

                        </form>
                    </div>
                    <!-- ./col -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
