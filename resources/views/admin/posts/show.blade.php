@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- TITOLO -->
        <h2 class="mb-3">{{ $post->title }}</h2>
        <div class="d-flex mb-3">
            <!-- IMMAGINE -->
            @if ($post->image)
                <img width="200" src="{{ asset("storage/$post->image") }}" alt="placeholder" class="img-fluid"
                    id="preview">
            @else
                <img width="200" src=" https://icons.iconarchive.com/icons/ccard3dev/dynamic-yosemite/1024/Preview-icon.png"
                    alt="placeholder" class="img-fluid" id="preview">
            @endif
            <!-- CONTENUTO DEL POST -->
            <p class="ml-3">{{ $post->content }}</p>
        </div>
        <!-- TAG -->
        <div>
            Tags:
        </div>
        <div>
            @if ($post->tags)
                @foreach ($post->tags as $tag)
                    <div class="badge" style="background-color: {{ $tag->color }}">{{ $tag->label }}</div>
                @endforeach
            @endif
        </div>
        <div class="d-flex">
            <a href="{{ route('admin.posts.index', $post->id) }}" class="btn btn-secondary mr-3">Indietro</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" id="delete">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        // METODO PER APRIRE UNA MODALE E CHIEDERE CONFERMA ELIMINAZIONE
        const delectForm = document.getElementById('delete');

        deleteForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const accept = confirm('Are you sure you want to delete this?');
            if (accept) e.target.submit();
        });
    </script>
@endsection --}}
