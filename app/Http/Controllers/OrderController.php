<?php
/**
 * Created by IntelliJ IDEA.
 * User: impulse
 * Date: 2019-09-19
 * Time: 00:01
 */

namespace App\Http\Controllers;


use App\Order;
use App\Partner;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Страница со списком заказов
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->orderService->getAll();
        return view('order.index', ['orders' => $orders]);
    }

    public function edit($id)
    {
        $order = $this->orderService->getOne($id);
        $statuses = Order::statuses();
        $partners = Partner::all()->keyBy('id')->map(function ($model) {
            return $model['name'];
        });
        return view('order.edit', [
            'order' => $order,
            'statuses' => $statuses,
            'partners' => $partners
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderService->getOne($id);
        $this->validate(request(), [
            'client_email' => 'required',
            'partner_id' => 'required|numeric',
            'status' => 'required|numeric'
        ]);
        $order->client_email = $request->get('client_email');
        $order->partner_id = $request->get('partner_id');
        $order->status = $request->get('status');
        $order->save();
        return redirect('orders')->with('success', 'Заказ обновлен');
    }
}
