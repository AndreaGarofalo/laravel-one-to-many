@extends('layouts.app')

@section('title', 'Projects')


@section('content')
<a href="{{ route('admin.projects.create')}}" class="btn btn-small btn-success my-5"><i class="fa-solid fa-plus  me-2"></i>Add new project</a>
<table class="table my-2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Category</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse($projects as $project)
    <tr>
      <th scope="row">{{ $project->id }}</th>
      <td>{{ $project->title }}</td>
      <td>{{ $project->slug }}</td>
      <td>{{ $project->category?->label }}</td>
      <td>{{ $project->created_at }}</td>
      <td>{{ $project->updated_at }}</td>
      <td class="d-flex">
        <a href="{{ route('admin.projects.show', $project->id)}}" class="btn btn-small btn-primary"><i class="fa-solid fa-eye"></i></a>
        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-small btn-warning mx-2 text-white"><i class="fa-solid fa-pencil "></i></a>
        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="6" class="text-center">There are no projects</th>
    </tr>
        
    @endempty
  </tbody>
</table>
@endsection