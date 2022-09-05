@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.search-filter')

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
