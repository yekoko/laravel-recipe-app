@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($list as $recipe)  
            <div class="card" style="width: 18rem;margin: 15px;padding: 10px;">
                <img src="{{ $recipe->thumbnail }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->name }}</h5>
                    <p class="card-text">
                        @foreach($recipe->ingredients as $ingredient)
                            <span class="badge bg-danger">{{ $ingredient->ingredent_name}}</span>
                        @endforeach
                    </p>
                    <a href="{{ route('recipe-detail', $recipe->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
