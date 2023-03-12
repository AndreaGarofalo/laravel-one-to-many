@if($project->exists)

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
        
@else
           
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

@endif

        @csrf

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required minlength="5" maxlength="20">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                    <div class="text-muted">Insert title</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ Str::slug(old('title', $project->title), '-') }}" disabled>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" id="category_id">
                    <option value="">No category</option>
                    @foreach ($categories as $category)
                        <option @if(old('category_id', $project->category_id) == $category->id) selected @endif  value="{{ $category->id }}">{{ $category->label }}</option>
                    @endforeach
                </select>
                @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="screen" class="form-label">Screen</label>
                    <input type="file" class="form-control" id="screen" name="screen" >
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="text-muted">Insert description</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-small btn-success me-2">Save</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-small btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Go back</a>
        </div>
    </form>

@section('script')
    <script>
        const slugInput = document.getElementById('slug');
        const titleInput = document.getElementById('title');

        console.log(slugInput.value);
        console.log(titleInput.value);

        titleInput.addEventListener('blur', () => {
            slugInput.value = titleInput.value.toLowerCase().split(' ').join('-');
        });
    </script>
@endsection