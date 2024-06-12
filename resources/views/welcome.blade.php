@extends('layouts.app')
@section('content')

<section class="welcome-section">
    <div class="jumbotron bg-my  bg-light rounded-3">
        <div class="contenitore d-flex ">
            <div class="col-6 welcome-col">
                <h1 class="display-5 fw-bold text-center welcome-project">
                    <div class="hover-project">
                    Riccardo <br>
                    <i class="bi bi-box"></i> Marino
                    </div>
                </h1>
            </div>
            <div class="col-6 welcome-col">
                <div class="welcome-info">
                    <a class="welcome-1" href="#">test</a>
                    <a class="welcome-2" href="{{route('admin.projects.index')}}">My Project</a> 
                    <a class="welcome-3" href="#">test</a>
                    <a class="welcome-4" href="#">test</a> 
                </div>

            </div>
        </div>
    </div>
</section>





@endsection