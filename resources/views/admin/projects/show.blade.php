@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<section>
    <h1>{{$project->title}}</h1>

    <p>{{$project->description}}</p>
    <img class="img-fluid w-100" src="{{ '/storage/'.$project->image }}" alt="{{$project->title}}">
</section>
@endsection