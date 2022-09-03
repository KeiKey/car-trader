@extends('layouts.app')

@section('content')
<div class="container">
{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal">--}}
{{--        <i class="fa fa-shopping-cart"></i> <span class="badge badge-light">4</span>--}}
{{--    </button>--}}
{{--    <livewire:cart-component />--}}

    @foreach($vehicles as $vehicle)
        <livewire:vehicle-component :vehicle='$vehicle' />
    @endforeach

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            {{ $vehicles->links() }}
        </div>
    </div>
</div>
@endsection
