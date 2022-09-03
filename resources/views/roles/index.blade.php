@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.roles_table') }}

                        <a class="btn btn-primary mx-1 btn-sm" href="{{ route('roles.create') }}">
                            <i class="fa fa-plus mx-1"></i>{{ __('general.create_role') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-auto">#</th>
                                    <th class="w-25">{{ __('general.name') }}</th>
                                    <th class="w-50">{{ __('general.permissions') }}</th>
                                    <th class="w-auto text-end">{{ __('general.actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th>{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge rounded-pill bg-primary">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-warning mx-1 btn-sm" href="{{ route('roles.edit', $role) }}"><i class="fa fa-edit"></i></a>

                                        <form
                                            @if($role->non_deletable) title="Role is non deletable" @endif
                                            action="{{ route('roles.destroy', $role) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" @class(['btn btn-danger btn-sm', 'disabled' => $role->non_deletable])>
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
