@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item">Комментарии</li>
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
                    <a class="nav-link" href="{{route('post.show', $comment->post_id)}}">Посмотреть пост</a></p>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="{{route('personal.comment.update', $comment->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <textarea class="form-control" name="message" col="30" rows="10">{{ $comment->message}} </textarea>

                            @error('message')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group mt-2">
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
