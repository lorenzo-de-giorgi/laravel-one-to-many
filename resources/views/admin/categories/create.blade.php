@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section>
        <h2>Create a new post</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" minlength="3" maxlength="200">
                {{-- @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
                {{-- <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> --}}
            </div>
            <div class="mb-3">
                <button type="submit">Crea</button>
                <button type="reset">Svuota campi</button>

            </div>
        </form>


    </section>

@endsection