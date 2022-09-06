<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order\Order;
use App\Models\User\User;
use App\Services\OrderService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    /**
     * Display a listing of the orders.
     *
     * @return View
     */
    public function index(): View
    {
        return view('orders.index', [
            'orders' => Order::query()->with(['purchaser', 'vehicles:id,make'])->paginate(10)
        ]);
    }

    /**
     * Display a listing of the user orders.
     *
     * @param User $user
     * @return View
     */
    public function indexUserOrders(User $user): View
    {
        if ($user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('orders.index', [
            'orders' => Order::query()->with(['purchaser', 'vehicles:id,make'])->forUser($user)->paginate(10)
        ]);
    }

    /**
     * Show the specified order.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        return view('orders.show', ['order'=> $order]);
    }

    /**
     * Store a newly created order.
     *
     * @param OrderRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $this->orderService->createOrder($request->all(), $request->user());

            return RedirectResponse::success(null, Lang::get('general.create_success', ['title' => 'Order']));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }

    /**
     * Cancel the specified order.
     *
     * @param OrderRequest $request
     * @param Order $order
     * @return RedirectResponse
     * @throws Exception
     */
    public function cancel(Request $request, Order $order): RedirectResponse
    {
        try {
            $this->orderService->cancelOrder($order, $request->user());

            return RedirectResponse::success(null, Lang::get('general.cancel_success', ['title' => 'Order']));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }
}
