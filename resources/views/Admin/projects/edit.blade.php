@extends('layouts.app')

@section('content')
<form class="m-5" action="{{route('admin.projects.update', $project)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="contenitore-input input-group mb-3">
        <label class="input-group-text" for="title" >Title</label>
        <input class="form-control" type="text" name="title" id="title" value="{{$project->title}}">
    </div>

    <div class="contenitore-input input-group mb-3">
        <label class="input-group-text" for="description" >Content</label>
        <textarea class="form-control"  name="content" id="content">{{$project->content}}</textarea>
    </div>

    <div class="container-input input-group mb-3">
        <label class="input-group-text" for="price" >Link</label>
        <input class="form-control" type="text" name="link" id="link" value="{{$project->link}}">
    </div>

    <div class="container-input input-group mb-3">
        <select name="type_id" id="type_id">
            <option value="">Seleziona categiora</option>
            @foreach ($types as $type)
            <option @selected($type->id == old('type_id', $project->type_id)) value="{{$type->id}}">{{$type->name}}</option>
                
            @endforeach
        </select>
    </div>

    <div class="container-input input-group mb-3">
        @foreach ($technologies as $technology)
            <div class="form-check">
                <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                <input @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all() )) ) type="checkbox" name="technologies[]" class="form-check-input" value="{{$technology->id}}" id="technology-{{$technology->id}}" >
            </div>
        @endforeach
  
    </div>

    {{-- <div class="container-input input-group mb-3">
        <label class="input-group-text" for="slug" >slug momentaneo</label>
        <input  class="form-control" type="slug" name="slug" id="slug" value="{{$project->slug}}">
    </div> --}}
    <a  href="{{route('admin.projects.index')}}">Back</a>


    <button class="btn btn-success">Modifica</button>
</form>
{{-- <form action="{{ route('admin.project.destroy', $project) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Elimina</button>
</form> --}}
@if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
@endsection