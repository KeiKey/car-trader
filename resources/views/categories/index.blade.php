@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.categories_table') }}

                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('categories.create') }}">
                            <i class="fa fa-plus mx-1"></i>{{ __('general.create_category') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-auto">#</th>
                                    <th class="w-50">{{ __('Name') }}</th>
                                    <th class="w-auto text-end">{{ __('Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-warning mx-1" href="{{ route('categories.edit', $category) }}"><i class="fa fa-edit"></i></a>

                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-sm btn-danger">
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
