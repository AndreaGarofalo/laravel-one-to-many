@extends('layouts.app')

@section('title', 'Projects')


@section('content')
<div class="d-flex justify-content-between mt-5">
    <div class="title">
        <h1>Title: {{ $project->title }}</h1>
        <h5>Slug: {{ $project->slug }}</h5>
        <p class="mt-5">Description: {{ $project->description }}</p>
    </div>
    <img class="img-fluid" src="{{ asset('storage/' . $project->screen) }}" alt="{{ $project->slug }}">
</div>
<div class="d-flex justify-content-between mt-5">
    <div class="text-danger"><strong>Created: {{ $project->created_at }}</strong></div>
    <div class="text-success"><strong>Category: {{ $project->category->label }}</strong></div>
    <div class="text-danger"><strong>Updated: {{ $project->updated_at }}</strong></div>   
</div>
<hr>
<div class="d-flex justify-content-start my-3">
    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i class="fa-solid fa-pencil me-2"></i>Edit</a>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mx-3"><i class="fa-solid fa-arrow-left me-2"></i>Go back</a>
    <form class="delete-form" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Elimina</button>
    </form>
</div>
@endsection