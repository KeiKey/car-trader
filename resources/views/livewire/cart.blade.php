{{--<i class="fa fa-shopping-cart"></i> <span class="badge badge-light">{{ $content->count() }}</span>--}}

<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($content->count() > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="w-auto">#</th>
                            <th class="w-25">{{ __('Name') }}</th>
                            <th class="w-auto text-end">{{ __('Actions') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($content as $id => $vehicle)
                            <tr class="align-text-bottom">
                                <th>{{ $vehicle->id }}</th>
                                <td>{{ $vehicle->model }}</td>
                                <td class="d-flex justify-content-end">
                                    <button class="btn btn-warning" wire:click="updateCartItem({{ $id }}, 'minus')">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-success mx-2" wire:click="updateCartItem({{ $id }}, 'plus')">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button class="btn btn-danger" wire:click="removeFromCart({{ $id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {{--                                    <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                Total: ${{ $total }}
                            </td>
                            <td>
                                <button class="w-full p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="clearCart()">Clear Cart</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    {{--                <hr class="my-2">--}}
                    {{--                <p class="text-xl text-right mb-2">Total: ${{ $total }}</p>--}}
                    {{--                <button class="w-full p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="clearCart()">Clear Cart</button>--}}
                @else
                    <p class="text-3xl text-center mb-2">cart is empty!</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
