@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <header>
                    <h1 class="text-center">Tutti i post:</h1>

                    @if (session('message'))
                        <div class="container alert alert-{{ session('type') }} text-center" role="alert">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </header>
                <div class="add-posts d-flex justify-content-end mb-4">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.posts.create') }}"><i
                            class="fa-solid fa-plus"></span></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Title</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    {{-- <i class="fa-solid fa-toggle-on"></i> --}}
                                    <a class="btn btn-sm btn-light mr-2" href="#"><i class="fa-solid fa-toggle-off"></i></a>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.show', $post->id) }}"><i
                                            class="fa-regular fa-file-lines"></i></a>
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.edit', $post->id) }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                        class="delete-form" data-name="{{ $post->title }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="fw-bold btn btn-sm btn-dark" type="submit"><i
                                                class="text-white fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h3>Non ci sono post</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
