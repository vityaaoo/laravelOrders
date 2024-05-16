<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function openOrderPage()
    {   
        $userID = Auth::id();
        $user = User::find($userID);
        if ($userID) {
            $oneWeekAgo = Carbon::now()->subDays(7)->toDateString();

            $orders = Order::select('id', 'provider_id', 'service_id', 'total_time', 'earnings', 'status', 'created_at')
                ->where('provider_id', $userID)
                ->where('status', 'confirmed')
                ->whereDate('created_at', '>', $oneWeekAgo)
                ->get();

            $totalHours = $this->getTotalHoursPerDay($orders);
            $totalEarnings = $this->getTotalEarningsPerDay($orders);

            return view('ordersPage', [
                'orders' => $orders,
                'userID' => $userID,
                'userName' => $user->name,
                'totalHours' => $totalHours,
                'totalEarnings' => $totalEarnings,
            ]);
        }
    }

    private function getTotalHoursPerDay($orders)
    {
        $totalHoursPerDay = [];

        foreach ($orders as $order) {
            $orderDate = $order->created_at->toDateString();

            if (!isset($totalHoursPerDay[$orderDate])) {
                $totalHoursPerDay[$orderDate] = 0;
            }

            $totalHoursPerDay[$orderDate] += $order->total_time;
        }

        return $totalHoursPerDay;
    }

    private function getTotalEarningsPerDay($orders)
    {
        $totalEarningsPerDay = [];

        foreach ($orders as $order) {
            $orderDate = $order->created_at->toDateString();

            if (!isset($totalEarningsPerDay[$orderDate])) {
                $totalEarningsPerDay[$orderDate] = 0;
            }

            $totalEarningsPerDay[$orderDate] += $order->earnings;
        }

        return $totalEarningsPerDay;
    }
}
