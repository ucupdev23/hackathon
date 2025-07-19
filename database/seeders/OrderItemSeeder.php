<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderIds = Order::pluck('id')->toArray();
        $products = Product::all();

        for ($i = 0; $i < 500000; $i++) {
            $randomOrder = fake()->randomElement($orderIds);
            $randomProduct = fake()->randomElement($products);
            $quantity = fake()->numberBetween(1, 5);
            $priceAtOrder = $randomProduct->price;

            OrderItem::create([
                'order_id' => $randomOrder,
                'product_id' => $randomProduct->id,
                'quantity' => $quantity,
                'price_at_order' => $priceAtOrder,
            ]);

            Order::where('id', $randomOrder)
                ->increment('total_amount', $quantity * $priceAtOrder);
        }
    }
}
