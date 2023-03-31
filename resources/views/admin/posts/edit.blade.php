@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
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
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group w-25 ">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                       value="{{ $post->title}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                                <div class="form-group mt-2">
                                    <label>Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{ $category->id == $post->category_id ? ' selected' : ''}}
                                            >{{$category->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple=""
                                        data-placeholder="Выберите теги" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ $post->content}}</textarea>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Изменить превью</label>
                                <div class="w-50 mb-2">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Preview image"
                                         class="w-75">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>

                                @error('preview_image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label for="exampleInputFile">Изменить главное изображение</label>
                                <div class="w-50">
                                    <img src="{{ asset( 'storage/'.$post->main_image) }}" alt="Main image"
                                         class="w-75">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>

                                @error('main_image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
