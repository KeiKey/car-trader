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
                        Attach new category
                        <i class="fa fa-plus"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($existingVehicleCategories as $category)
                <tr>
                    <td>
                        <select class="form-select vehicle-category">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $categoryOption)
                                <option value="{{ $categoryOption->id }}" >{{ $categoryOption->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="vehicle-category-id" type="hidden">
                        <input type="text" class="form-control vehicle-category-extra" value="{{ $category->name }}">
                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger" wire:click="deleteRow({{ $category->id }})">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
