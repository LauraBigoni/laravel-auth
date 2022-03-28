@extends('layouts.app')

@section('content')
    @include('includes.posts.form')
@endsection

@section('scripts')
    <script src="{{ asset('js/image-preview.js') }} " defer></script>
@endsection
