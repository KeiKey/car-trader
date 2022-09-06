<div class="row mb-3">
    <label class="col-md-3 col-form-label text-md-end">Vehicle categories</label>

    <div class="col-md-9">
        <table class="table table-bordered" id="category-table">
            <thead class="text">
            <tr>
                <th>{{ __('general.category') }}</th>
                <th>{{ __('general.extra') }}</th>
                <th>{{ __('general.action') }}
                    <a class="btn btn-sm btn-primary pull-right" wire:click="addRow()">
                        {{ __('general.attach_category') }}
                        <i class="fa fa-plus"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($vehicleCategories as $id => $vehicleCategory)
                <tr>
                    <td>
                        <select class="form-select vehicle-category" wire:change="categorySelected($event.target.value, {{ $id }})">
                            <option value="0" @if(is_null($vehicleCategory['category_id'])) selected @endif disabled>{{ __('general.select_category') }}</option>

                            @if(!is_null($vehicleCategory['category_id']))
                                <option selected value="{{ $vehicleCategory['category_id'] }}" selected>{{ $categories->firstWhere('id', $vehicleCategory['category_id'])?->name }}</option>
                            @endif

                            @foreach($categoryOptions as $categoryOption)
                                <option value="{{ $categoryOption->id }}">{{ $categoryOption->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control vehicle-category-extra" value="{{ $vehicleCategory['extra'] }}">
                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger" wire:click="deleteRow({{ $id }})">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
