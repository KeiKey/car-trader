<form action="{{ isset($vehicle) ? route('vehicles.update', ['vehicle' => $vehicle]) : route('vehicles.store') }}" method="POST">
    @csrf
    @isset($vehicle)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="serial_number" class="col-md-3 col-form-label text-md-end">{{ __('general.serial_number') }} (17)</label>

        <div class="col-md-9">
            <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror"
                   name="serial_number" value="{{ old('serial_number', $vehicle->serial_number ?? '') }}" required minlength="17" maxlength="17">

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
            <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make"
                   value="{{ old('make', $vehicle->make ?? '') }}" required>

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
            <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model"
                   value="{{ old('model', $vehicle->model ?? '') }}" required>

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

                <input id="engine_size" type="number" min="250" max="7000" value="{{ old('engine_size', $vehicle->engine_size ?? '1390') }}"
                       class="form-control @error('engine_size') is-invalid @enderror" name="engine_size" required step="1">
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
            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                   value="{{ old('color', $vehicle->color ?? '') }}" required>

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
            <input id="production_year" type="number" min="1900" max="2025" value="{{ old('production_year', $vehicle->production_year ?? '2000') }}"
                   class="form-control @error('production_year') is-invalid @enderror" name="production_year" required step="1">

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

                <input id="price" type="number" min="0" value="{{ old('price', $vehicle->price ?? '1.00') }}"
                       class="form-control @error('price') is-invalid @enderror" name="price" required step="0.01">
            </div>

            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="quantity" class="col-md-3 col-form-label text-md-end">{{ __('general.quantity') }}</label>

        <div class="col-md-9">
            <input id="quantity" type="number" min="0" value="{{ old('quantity', $vehicle->quantity ?? '1') }}"
                   class="form-control @error('quantity') is-invalid @enderror" name="quantity" required step="1">

            @error('quantity')
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
                <input class="form-check-input" @isset($vehicle) @if($vehicle->active) checked @endif @endisset
                type="checkbox" role="switch" id="active" name="active" value="1">
            </div>
        </div>
    </div>

    <livewire:vehicle-categories-component :categories='$categories' :existingVehicleCategories="$categories"/>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ isset($vehicle) ? __('general.update') : __('general.create') }}
            </button>
        </div>
    </div>
</form>
