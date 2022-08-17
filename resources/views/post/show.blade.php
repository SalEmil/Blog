@php
    /** @var \App\Models\Post $post */
@endphp

@extends('layouts.laymain')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$post->created_at->transLatedFormat('F')}}
                , {{$post->created_at->day}}, {{$post->created_at->year}}.{{$post->created_at->format('H:i')}} • {{$post->comments->count()}}
                комментария</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->preview_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/'.$post->main_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$post->category->title}}</p>
                                    <a href="{{route('post.show',$post->id)}}"><h5
                                            class="post-title">{{$post->title}}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                </div>
                </section>
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарии</h2>
                    <form action="{{route('post.comment.store',$post->id)}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Напишите комментарий"
                                          rows="10"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                        </div>

                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        </div>
    </main>

@endsection
