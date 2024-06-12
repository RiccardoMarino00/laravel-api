@extends('layouts.app')

@section('content')
    <div class="text-center">
        <p>Rotta create</p>
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="contenitore-input input-group mb-3">
                <label for="title" class="input-group-text" >Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci un titolo...">
            </div>

            <div class="contenitore-input input-group mb-3">
                <label for="content" class="input-group-text" >Content</label>
                <textarea  class="form-control " name="content" id="content" placeholder="Inserisci una descrizione..."></textarea>
            </div>

            <div class="container-input input-group mb-3">
                <label for="link" class="input-group-text" >Link</label>
                <input class="form-control" type="text" name="link" id="link" placeholder="Inserisci un prezzo...">
            </div>

            <div class="container-input input-group mb-3">
                <select name="type_id" id="">
                    <option value="">Seleziona categiora</option>
                    @foreach ($types as $type)
                    <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                        
                    @endforeach
                </select>
            </div>

            {{-- <div class="container-input input-group mb-3">
                <label class="input-group-text" for="slug" >slug momentaneo</label>
                
                <input  class="form-control" type="slug" name="slug" id="slug" value="{{$project->slug}}">
            </div> --}}
{{-- @dd($projects) --}}
            <div>
                <h2>Seleziona Tecnologia utilizzata</h2>
                @foreach($technologies as $technology)
                <div>
                    <input name="technology[]" type="checkbox" value="{{$technology->id}}" id="technology-{{$technology->id}}">
                    <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                </div>
                @endforeach
            </div>

            {{-- <div class="container-input input-group mb-3">
                <label for="slug" class="input-group-text" >slug momentaneo</label>
                <input class="form-control " type="text" name="slug" id="slug" placeholder="..." >
            </div> --}}
            
            <button class="btn btn-success" >Crea</button>
        </form>
        @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
@endsection