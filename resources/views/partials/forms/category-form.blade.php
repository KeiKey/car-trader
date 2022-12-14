<form action="{{ isset($category) ? route('categories.update', ['category' => $category]) : route('categories.store') }}" method="POST">
    @csrf
    @isset($category)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('general.name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name', $category->name ?? '') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ isset($category) ? __('general.update') : __('general.create') }}
            </button>
        </div>
    </div>
</form>
