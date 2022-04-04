@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Crea un nuovo Post</h1>
        </header>

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row mb-3">
                <div class="col-8">

                    <!-- TITOLO -->
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- CATEGORIA -->
                <div class="col-4">
                    <label for="category">Catogoria</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option value=""> Nessuna categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->label }}</option>
                        @endforeach
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </select>
                </div>

                <!-- TAG -->
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        @foreach ($tags as $tag)
                            <input class="form-check-input ml-2" type="checkbox" id="tag-{{ $loop->iteration }}"
                                value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', []))) checked @endif>
                            <label class="form-check-label" for="tag-{{ $loop->iteration }}">{{ $tag->label }}</label>
                        @endforeach

                    </div>
                </div>

                <!-- CONTENUTO POST -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        <textarea id="content" rows="6" class="form-control @error('content') is-invalid @enderror" name="content"
                            placeholder="Contenuto del post.."></textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <!-- IMMAGINE PREVIEW-->

                <div class="col-2">
                    @if ($post->image)
                        <img src="{{ asset("storage/$post->image") }}" alt="placeholder" class="img-fluid"
                            id="preview">
                    @else
                        <img src=" https://icons.iconarchive.com/icons/ccard3dev/dynamic-yosemite/1024/Preview-icon.png"
                            alt="placeholder" class="img-fluid" id="preview">
                    @endif
                </div>

                <!-- IMMAGINE -->
                <div class="col-10 d-flex flex-column justify-content-center">
                    <div class="form-group">
                        <label for="image">Immagine</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                            name="image">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Indietro</a>
        </form>
    </div>
@endsection

@section('scripts')
    {{-- Script per la preview dell'immagine --}}

    <script>
        const placeholder =
            "https://icons.iconarchive.com/icons/ccard3dev/dynamic-yosemite/1024/Preview-icon.png";
        const imgInput = document.getElementById('image');
        const imgPreview = document.getElementById('preview');

        imgInput.addEventListener('change', e => {
            // CONTROLLO SE HO UN FILE CARICATO sennò si spacca tutto
            if (imgInput.files && imgInput.files[0]) {
                let reader = new FileReader();
                // funzione asincrona : accetta un file e lo elabora e crea un url 
                reader.readAsDataURL(imgInput.files[0]);
                // essendo asincrona quando il file è pronto esegui la funzione
                reader.onload = (e) => {
                    imgPreview.setAttribute('src', e.target.result);
                } else {
                    imgPreview.setAttribute('src', placeholder);

                }
            }
        })
    </script>
@endsection
