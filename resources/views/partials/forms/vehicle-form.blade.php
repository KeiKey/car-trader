<form method="POST" action="{{ route('vehicles.store') }}" id="vehicle-form">
    @csrf

    <div class="row mb-3">
        <label for="serial_number" class="col-md-3 col-form-label text-md-end">{{ __('general.serial_number') }} (17)</label>

        <div class="col-md-9">
            <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror"
                   name="serial_number" value="{{ old('serial_number') }}" required minlength="17" maxlength="17">

            @error('serial_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="make" class="col-md-3 col-form-label text-md-end">{{ __('general.make') }}</label>

        <div class="col-md-9">
            <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ old('make') }}" required>

            @error('make')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="model" class="col-md-3 col-form-label text-md-end">{{ __('general.model') }}</label>

        <div class="col-md-9">
            <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required>

            @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="engine_size" class="col-md-3 col-form-label text-md-end">{{ __('general.engine_size') }}</label>

        <div class="col-md-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text rounded-0 rounded-start">Cc</span>
                </div>

                <input id="engine_size" type="number" min="250" max="7000" value="1390" class="form-control @error('engine_size') is-invalid @enderror" name="engine_size" required step="1">
            </div>

            @error('engine_size')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="color" class="col-md-3 col-form-label text-md-end">{{ __('general.color') }}</label>

        <div class="col-md-9">
            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required>

            @error('color')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="production_year" class="col-md-3 col-form-label text-md-end">{{ __('general.production_year') }}</label>

        <div class="col-md-9">
            <input id="production_year" type="number" min="1900" value="2000" max="2025" class="form-control @error('production_year') is-invalid @enderror" name="production_year" required step="1">

            @error('production_year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="price" class="col-md-3 col-form-label text-md-end">{{ __('general.price') }}</label>

        <div class="col-md-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text rounded-0 rounded-start">$</span>
                </div>

                <input id="price" type="number" min="0" value="1.00" class="form-control @error('price') is-invalid @enderror" name="price" required step="0.01">
            </div>

            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="active" class="col-md-3 col-form-label text-md-end">{{ __('general.active') }}</label>

        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" value="1">
            </div>
        </div>
    </div>

    <vehicle-categories :categories="{{ $categories }}" :existingVehicleCategories="{{ $categories }}"></vehicle-categories>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ __('general.create') }}
            </button>
        </div>
    </div>
</form>
