<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ $vehicle->make }}</div>

            <div class="card-body">
                <h5 class="card-title">{{ $vehicle->model }}</h5>

                <ul class="list-group my-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.color') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">{{ $vehicle->color }}</span>
                        </h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.engine_size') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">{{ $vehicle->engine_size }}</span>
                        </h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.production_year') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">{{ $vehicle->production_year }}</span>
                        </h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.serial_number') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">{{ $vehicle->serial_number }}</span>
                        </h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.price') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">$ {{ $vehicle->price }}</span>
                        </h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ __('general.quantity') }}:
                        <h5 class="mb-0">
                            <span class="badge rounded-pill bg-primary">{{ $vehicle->quantity }}</span>
                        </h5>
                    </li>
                    @foreach($vehicle->categories as $vahicleCategory)
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-secondary">
                            {{ $vahicleCategory->name }} ({{ __('general.custom_category') }}):
                            <h5 class="mb-0">
                                <span class="badge rounded-pill bg-primary">{{ $vahicleCategory->pivot->extra }}</span>
                            </h5>
                        </li>
                    @endforeach
                </ul>

                <p class="card-text"><small class="text-muted">{{ __('general.last_updated_at') }}: {{ $vehicle->updated_at->format('H:i d/m/Y') }}</small></p>
                <a class="btn btn-sm btn-primary" wire:click="addToCart">{{ __('general.add_to_cart') }}</a>
            </div>
        </div>
    </div>
</div>
