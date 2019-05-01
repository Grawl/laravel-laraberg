@extends('layout')
@section('title', $post['title'])
@section('style')
    <link rel='stylesheet' href='{{ asset('vendor/laraberg/css/laraberg.css' )}}'>
@endsection
@section('content')
    <div class='uk-card uk-card-default uk-margin-top uk-margin'>
        <div class='uk-card-header'>
            <h3 class='uk-card-title uk-margin-remove-bottom'>{{ $post['title'] }}</h3>
            <p class='uk-text-meta uk-margin-remove-top'>
                <time datetime='{{ $post['created_at'] }}'>{{ $post['created_at'] }}</time>
            </p>
        </div>
        <div class='uk-card-body'>
            {!! $post['laraberg'] !!}
        </div>
        <div class='uk-card-footer'>
            <p class='uk-text-meta'>Last Updated at: {{ $post['updated_at'] }}</p>
        </div>
    </div>
@endsection
@section('script')
@endsection
