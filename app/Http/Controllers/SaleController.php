<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['product', 'customer', 'user'])
            ->latest()
            ->get();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('stock_quantity', '>', 0)
            ->orderBy('name')
            ->get();

        $customers = Customer::orderBy('full_name')->get();

        return view('sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'customer_id' => ['nullable', 'exists:customers,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::lockForUpdate()->findOrFail($validated['product_id']);

            if ($validated['quantity'] > $product->stock_quantity) {
                throw ValidationException::withMessages([
                    'quantity' => 'Insufficient stock. Only ' . $product->stock_quantity . ' item(s) available.',
                ]);
            }

            Sale::create([
                'product_id' => $product->id,
                'customer_id' => $validated['customer_id'] ?? null,
                'user_id' => auth()->id(),
                'quantity' => $validated['quantity'],
                'total_price' => $product->price * $validated['quantity'],
            ]);

            $product->decrement('stock_quantity', $validated['quantity']);
        });

        return redirect()->route('sales.index')
            ->with('success', 'Sale recorded and stock updated successfully.');
    }

    public function show(Sale $sale)
    {
        return redirect()->route('sales.index');
    }

    public function edit(Sale $sale)
    {
        return redirect()->route('sales.index');
    }

    public function update(Request $request, Sale $sale)
    {
        return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        return redirect()->route('sales.index');
    }
}