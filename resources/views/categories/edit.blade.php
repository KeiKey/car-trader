@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Role') }}</div>

                    <div class="card-body">
                        @include('partials.forms.category-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
