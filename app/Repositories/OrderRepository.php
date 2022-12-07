<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders()
    {
        if(Cache::has('key')){
            return Cache::get('key');
        }else{
            Cache::put('key', Order::all());
        }
        return Cache::get('key');
    }

    public function getOrderById($orderId)
    {
        return Order::findOrFail($orderId);
    }

    public function deleteOrder($orderId)
    {
        Order::destroy($orderId);
    }

    public function createOrder(array $orderDetails)
    {
        return Order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails)
    {
        return Order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders()
    {
        return Order::where('is_fulfilled', true);
    }
}
