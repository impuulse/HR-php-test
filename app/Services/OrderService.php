<?php
/**
 * Created by IntelliJ IDEA.
 * User: impulse
 * Date: 2019-09-19
 * Time: 00:24
 */

namespace App\Services;


use App\Order;

class OrderService
{
    public function getAll()
    {
        return Order::all();
    }

    public function getOne($id)
    {
        return Order::find($id);
    }
}
