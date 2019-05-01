@extends('layout')
@section('title', 'Home')
@section('menu.home', 'uk-active')
@section('style')
    <link rel='stylesheet' href="{{ asset('vendor/laraberg/css/laraberg.css') }}">
@endsection
@section('content')
    <form class='uk-card uk-card-default uk-card-body uk-margin' laraberg-form>
        <p>Please fill this form and submit your post:</p>
        <div class='uk-margin'>
            <label class='uk-form-label' for='title'>Title</label>
            <div class='uk-form-controls'>
                <input
                    id='title'
                    name='title'
                    type='text'
                    required
                    placeholder='Some text...'
                    class='uk-input'
                >
            </div>
        </div>
        <div class='uk-margin'>
            <label class='uk-form-label' for='laraberg-input'>Content</label>
            <div class='uk-form-controls' style='min-height: 500px;'>
                <textarea
                    id='laraberg-input'
                    name='content'
                    class='uk-textarea'
                    hidden
                ></textarea>
            </div>
        </div>
        <div class='uk-text-center uk-margin'>
            <button
                type='submit'
                class='uk-button uk-button-primary'
            >Submit Post</button>
        </div>
        <div class='uk-alert uk-alert-success' laraberg-success hidden>
            <p>Your post has been published!</p>
        </div>
        <div class='uk-alert uk-alert-warning' laraberg-error hidden>
            <p>Unfortunately there was an error during submitting your post! Please try again.</p>
        </div>
    </form>
@endsection
@section('script')
    <script src='https://unpkg.com/react@16.6.3/umd/react.production.min.js'></script>
    <script src='https://unpkg.com/react-dom@16.6.3/umd/react-dom.production.min.js'></script>
    <script src='https://unpkg.com/moment@2.22.1/min/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js'></script>
    <script src='{{ asset('vendor/laraberg/js/laraberg.js') }}'></script>
    <script src='{{ asset('js/serialize.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', DOMContentLoadedEvent => {
            const Laraberg = window.Laraberg;
            const $form = document.querySelector('[laraberg-form]');
            const $success = document.querySelector('[laraberg-success]');
            const $error = document.querySelector('[laraberg-error]');
            function success() {
                $error.hidden = true;
                $success.hidden = false;
            }
            function error() {
                $error.hidden = false;
                $success.hidden = true;
            }
            Laraberg.initGutenberg('laraberg-input', { minHeight: '500px' });
            $form.addEventListener('submit', submitEvent => {
                submitEvent.preventDefault();
                fetch('/api/posts', {
                    method: 'POST',
                    body: JSON.stringify({
                        title: $form.title.value,
                        laraberg: Laraberg.getContent(),
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    },
                }).then(
                    response => {
                        if (response.ok) {
                            success();
                        } else {
                            error();
                        }
                    },
                    error => {
                        console.error({ error });
                        error();
                    },
                );
            });
        });
    </script>
@endsection
