<form action="{{ isset($role) ? route('roles.update', ['role' => $role]) : route('roles.store') }}" method="POST">
    @csrf
    @isset($role)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('general.name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name', $role->name ?? '') }}"
                   required
                   {{ isset($role) ? ($role->non_deletable ? ' readonly' : '') : '' }}
                   autocomplete="name"
                   autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('general.permissions') }}</label>

        <div class="col-md-8">
            <div class="container">
                <div class="row">
                    @foreach($permissions as $id => $permission)
                        <div class="checkbox-custom checkbox-primary col-sm-6 col-md-4">
                            <input id="permission-manage-users"
                                   {{ in_array($id, old('permissions', isset($role) ? $role->permissions->pluck('id')->toArray() : [])) ? 'checked' : '' }}
                                       type="checkbox" name="permissions[]" value="{{ $id }}" class="form-check-input">

                            <label for="permission-manage-users">{{ $permission }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            @error('permissions')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ isset($role) ? __('general.update') : __('general.create') }}
            </button>
        </div>
    </div>
</form>
