@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$project->title}}</h1>
        @if ($project->category)
            <h3>{{ $project->category->name }}</h3>
        @endif
        <div>
            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-secondary">Edit</a>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger"  data-item-title="{{ $project->title }}">
                 Delete Project</i>
                </button>

              </form>
        </div>

    </div>


    <p>{{$project->content}}</p>
    <img class="w-50" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}">
</section>
@include('partials.modal-delete')
@endsection