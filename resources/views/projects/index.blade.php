@extends('layouts.app')

@section('content')

<section class="section-index">

    {{-- <div class="container">
        <a href="{{route('admin.projects.create')}}">Create new project</a>
    </div> --}}

    @foreach ($projects as $project)
        <div class="m-5  p-2 d-flex text-center">
            <div class="col-6  p-3">
                <p><strong>Title: </strong>  {{$project->title}}</p>
                {{-- <p>{{$project->slug}}</p> --}}
                <p> <strong> Content: </strong> {{$project->content}}</p>
                {{-- @dump($project->type) --}}
                <p> <strong>Type: </strong> {{$project->type ? $project->type->name : ' No Type'}}</p>
                <p><strong> Technology: </strong></p>
                @foreach ($project->technologies as $technology)
                    {{-- <p>{{$project->technology ? $project->$technology->name : 'Nessuna tecnologia'}}</p> --}}
                    <p>  {{$technology->name}}</p>
                @endforeach
                {{-- @dump($project->technologies) --}}
                <a href="{{$project->link}}"><strong> Link: </strong> {{$project->link}}</a> <br>
                <a class="link-warning" href="{{route('admin.projects.edit', $project)}}">edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
          
            {{-- <div  role="group" aria-label="Default button group">
              
            </div> --}}
            <div class="col-6 right-align p-3">
                
            </div>
        </div>
    @endforeach
</section>

@endsection