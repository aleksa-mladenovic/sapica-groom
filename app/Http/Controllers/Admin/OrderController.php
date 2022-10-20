<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '!=' , '1')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order-status');
        $order->update();
        return redirect('admin-orders')->with('status', "Order Updated Successfully.");
    }

    public function history()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }

    public function pdf(){

        $orders = Order::where('status', '1')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.orders', compact('orders'));
        return $pdf->stream();
    }
}
