<div class="position-fixed right-0 my-5 w-auto">
    <div class="row justify-content-center mb-5 ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('general.cart') }}</div>

                <div class="card-body">
                    @auth
                        <form action="{{ route('orders.store') }}" method="POST" id="order-form">
                            @csrf
                    @endauth

                    @if ($items->isNotEmpty())

                        <table class="table" id="cart-items-table">
                            <thead>
                            <tr>
                                <th >{{ __('general.name') }}</th>
                                <th>{{ __('general.quantity') }}</th>
                                <th class="text-end">{{ __('general.actions') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($items as $id => $cartItem)
                                <tr class="align-text-bottom">
                                    <input class="item" type="hidden" name="item[]" value="{{ $id }}">
                                    <input class="item-qty" type="hidden" name="quantity[]" value="{{ $cartItem->get('quantity') }}">

                                    <td>{{ $cartItem->get('name') }}</td>
                                    <td>{{ $cartItem->get('quantity') }}</td>
                                    <td class="d-flex justify-content-end">
                                        <button
                                            type="button"
                                            @class([
                                                'btn btn-sm btn-warning',
                                                'disabled' => $cartItem->get('quantity') === 1
                                                ]) wire:click="decreaseCartItemQuantity({{ $id }})">
                                            <i class="fa fa-minus"></i>
                                        </button>

                                        <button
                                            type="button"
                                            @class([
                                                'btn btn-sm btn-success mx-1',
                                                'disabled' => $cartItem->get('quantity') == $cartItem->get('totalQuantity')
                                                ]) wire:click="increaseCartItemQuantity({{ $id }})">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" wire:click="removeFromCart({{ $id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-success @guest disabled @endguest" type="submit">
                                        <i class="fa fa-shopping-cart"></i> {{ __('general.buy') }}
                                    </button>
                                </td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-danger" wire:click="clearCart()" type="button">
                                        <i class="fa fa-trash"></i> {{ __('general.clear_cart') }}
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="text-center mb-2">{{ __('general.cart_is_empty') }}</p>
                    @endif

                    @auth
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
