@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders table') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('general.purchaser') }}</th>
                                    <th>{{ __('general.state') }}</th>
                                    <th>{{ __('general.vehicles') }}</th>
                                    <th class="text-end">{{ __('general.actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th>{{ $order->id }}</th>
                                    <td>{{ $order->purchaser->name }}</td>
                                    <td>
                                        <span
                                            @class(['badge rounded-pill', 'bg-success' => $order->state == 'open', 'bg-danger' => $order->state == 'canceled'])
                                        >{{ $order->state }}</span>
                                    </td>
                                    <td>
                                        @foreach($order->vehicles as $vehicle)
                                            <span class="badge rounded-pill bg-primary">
                                                {{ $vehicle->make }} - {{ $vehicle->pivot->quantity }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{ route('orders.cancel', $order) }}" method="POST">
                                            @csrf
                                            @method('put')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times  "></i> {{ __('general.cancel_order') }}
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
