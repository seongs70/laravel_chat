@extends('layouts.layout')
@section('title', 'Chat')

@section('body-class', 'chat')

@section('content')

    <div class="container h-full">
        <div id="app" class="h-75">
            <chat-component></chat-component>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection


{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Dashboard</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        You are logged in!--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

