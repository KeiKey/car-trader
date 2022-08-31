@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.vehicles_table') }}

                        <a class="btn btn-primary mx-1 btn-sm" href="{{ route('vehicles.create') }}">
                            <i class="fa fa-plus mx-1"></i>{{ __('general.create_vehicle') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-auto">#</th>
                                    <th class="w-25">{{ __('Name') }}</th>
                                    <th class="w-auto text-end">{{ __('Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <th>{{ $vehicle->id }}</th>
                                    <td>{{ $vehicle->model }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-warning mx-1" href="{{ route('vehicles.edit', $vehicle) }}"><i class="fa fa-edit"></i></a>

                                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
