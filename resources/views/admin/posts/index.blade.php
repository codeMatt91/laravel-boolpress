@extends('layouts.app');

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between">
            <h1>Post del mio blog</h1>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-success">Aggiungi Post</a>
            </div>
        </header>
        <!-- MESSAGGIO DI CONFERMA ELIMINAZIONE -->
        @if (session('message'))
            <div class="alert alert-{{ session('type') ?? 'info' }}">
                {{ session('message') }}
            </div>
        @endif
        <table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Modificato il:</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>
                                @if ($post->category)
                                    <a href="{{ route('admin.posts.category', $post->category_id) }}"><span
                                            class="badge badge-{{ $post->category->color }}">{{ $post->category->label }}</span></a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($post->tags)
                                    @forelse ($post->tags as $tag)
                                        <div class="badge" style="background-color: {{ $tag->color }} "> <span
                                                style="color:white"> {{ $tag->label }}</span></div>
                                    @empty -
                                    @endforelse
                                @endif
                            </td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td class="d-flex">

                                <form class="delete-form" action="{{ route('admin.posts.destroy', $post->id) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger " type="submit">Elimina</button>
                                </form>

                                <div>
                                    <a class="btn btn-sm btn-warning m-0 ml-2 "
                                        href="{{ route('admin.posts.edit', $post->id) }}">Modifica
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <h1>Non ci sono post</h1>
                        @endforelse
                    </tbody>
                </table>
            </table>
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </div>
    @endsection

    @section('scripts')
        <script>
            // METODO PER APRIRE UNA MODALE E CHIEDERE CONFERMA ELIMINAZIONE
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const confirmation = confirm(
                        'Are you sure you want to delete this?');
                    if (confirmation) e.target.submit();
                })
            });
        </script>
    @endsection
