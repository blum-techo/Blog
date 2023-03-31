@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{$date->day}} {{ $date->translatedFormat('F') }} {{$date->year}}
                • {{$date->format('H:i')}} • {{$post->category->title}} • {{$post->comments->count()}} Комментриев</p>
            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->main_image)}}" alt="featured image" class="w-50  ">
            </section>
            <section class="post-content">
                <div class="row">
                    {!! $post->content !!}
                </div>
            </section>
            <div class="row">
                <form action="{{route('post.like.store', $post->id)}}" method="post">
                    @csrf
                    <span>{{$post->liked_users_count}}</span>
                    @auth()
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fa{{auth()->user()->LikedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i>
                        </button>
                    @endauth
                    @guest()
                        <i class="far fa-heart"></i>
                    @endguest
                    <span>Лайкни пост</span>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count()>0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Связаные посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/'. $relatedPost->preview_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost ->category->title}}</p>
                                    <a href="{{route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                                        <h6 class="post-title">{{ $relatedPost ->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list mb-5">
                        <h3 class="mb-4 ">
                            Комментарии
                        </h3>
                        @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                        <span class="username text-bold">
                            <div>
                                <h5>
                                {{$comment->user->name}}
                                </h5>
                            </div>
                        <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                        </span><!-- /.username -->
                            {{$comment->message}}
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only"></label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Напиши коментарий!"
                                              rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
