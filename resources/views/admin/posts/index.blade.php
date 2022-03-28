@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <header>
                    <h1 class="text-center">Tutti i post:</h1>
                </header>
                <div class="add-posts d-flex justify-content-end mb-4">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.posts.create') }}"><i
                            class="fa-solid fa-plus"></span></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.show', $post->id) }}"><i
                                            class="fa-regular fa-file-lines"></i></a>
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.edit', $post->id) }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.destroy', $post->id) }}"><i
                                            class="text-white fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
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
