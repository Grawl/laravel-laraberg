@extends('layout')
@section('title', 'Posts')
@section('menu.posts', 'uk-active')
@section('style')
@endsection
@section('content')
    <div class='uk-margin uk-margin-remove-top'>
        <div class='uk-grid uk-grid-small uk-child-width-1-3@l uk-child-width-1-2@m'>
            @foreach($posts as $post)
                <div class='uk-grid-margin'>
                    <a
                        href="{{ route('post', ['id' => $post['id']]) }}"
                        class='uk-card uk-card-default uk-card-body uk-card-hover uk-display-block'
                    >
                        <div class='uk-card-badge uk-label'>{{ $post['created_at'] }}</div>
                        <h3 class='uk-card-title'>{{ $post['title'] }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
@endsection
