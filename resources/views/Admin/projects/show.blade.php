@extends('layouts.app')


@section('content')
<div class="m-2 border p-2">
    <p>{{$project->title}}</p>
    <p>{{$project->slug}}</p>
    <p>{{$project->content}}</p>
    {{-- @dump($project->type) --}}
    <p>{{$project->type ? $project->type->name : 'Nessun tipo'}}</p>
    {{-- @dump($project->technologies) --}}
    {{-- <p>{{$project->technology}}</p> --}}
    @foreach($project->technologies as $technology)
    <p>{{$technology->name}}</p>
    @endforeach
    <a href="{{$project->link}}">{{$project->link}}</a>
    <a class="dropdown-item" href="{{route('admin.projects.index')}}">Back</a>
</div>
@endsection
