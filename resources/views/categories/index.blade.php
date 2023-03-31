@extends('layouts.main')

@section('content')

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title mt-0" data-aos="fade-up">Категории</h1>
        <section class="featured-posts-section">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </section>
    </div>

</main>

@endsection
