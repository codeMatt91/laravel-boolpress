@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($category->posts as $post)
                <div class="col-6">
                    <div class="d-flex">
                        @if (is_file($post->image))
                            <div class="mr-3">{{ $post->image }}</div>
                        @endif
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <p>{{ $post->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
