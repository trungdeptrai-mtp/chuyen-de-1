<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 1. TRANG CHỦ
    public function index() {
        $products = Product::paginate(8);
        return view('home', compact('products'));
    }

    // 2. CHI TIẾT
    public function show($id) {
        $product = Product::findOrFail($id);

        $related = Product::where('id', '!=', $id)
                          ->inRandomOrder()
                          ->limit(4)
                          ->get();

        return view('detail', compact('product', 'related'));
    }

    // 3. THÊM GIỎ
    public function addToCart($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => "https://loremflickr.com/400/400/watch?lock=" . $id
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Đã thêm vào giỏ!');
    }

    // 4. MUA NGAY
    public function buyNow($id) {
        $this->addToCart($id);
        return redirect('/cart');
    }

    // 5. GIỎ HÀNG
    public function cart() {
        return view('cart');
    }

    // 6. XOÁ 1 SP
    public function remove($id) {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Đã xoá sản phẩm!');
    }

    // 7. XOÁ ALL
    public function clear() {
        session()->forget('cart');
        return back()->with('success', 'Đã xoá toàn bộ giỏ!');
    }

    // 8. TĂNG
    public function increase($id) {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return back();
    }

    // 9. GIẢM
    public function decrease($id) {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return back();
    }

    // 10. SEARCH
    public function search(Request $request) {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
                           ->orWhere('description', 'LIKE', "%{$query}%")
                           ->paginate(8);

        return view('home', compact('products', 'query'));
    }

    // 🔥 11. SETUP DATA (CHUẨN)
    public function setup() {
        Product::truncate();

        $brands = ['Casio', 'G-Shock', 'Edifice'];

        for ($i = 1; $i <= 24; $i++) {
            Product::create([
                'name' => $brands[array_rand($brands)] . ' ' . rand(100,999),
                'price' => rand(2,15) * 1000000,
                'description' => 'Đồng hồ chính hãng',

                'brand' => $brands[array_rand($brands)],
                'gender' => rand(0,1) ? 'nam' : 'nu'
            ]);
        }

        return redirect('/');
    }

    // 🔥 12. LỌC NAM / NỮ
    public function category($type) {
        $products = Product::where('gender', $type)->paginate(8);
        return view('home', compact('products'));
    }

    // 🔥 13. LỌC THƯƠNG HIỆU
    public function brand($brand) {
        $products = Product::where('brand', $brand)->paginate(8);
        return view('home', compact('products'));
    }

    // 🔥 14. THANH TOÁN
    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);

        if(empty($cart)) {
            return back()->with('error', 'Giỏ hàng trống!');
        }

        $order = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment' => $request->payment,
            'items' => $cart,
            'time' => now()
        ];

        $orders = session()->get('orders', []);
        $orders[] = $order;

        session()->put('orders', $orders);

        session()->forget('cart');

        return redirect('/order-success');
    }

    public function orderSuccess() {
        return view('order_success');
    }

    public function orders() {
        $orders = session('orders', []);
        return view('orders', compact('orders'));
    }
    public function store(Request $request)
{
    $path = null;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => 'Đồng hồ chính hãng',
        'brand' => $request->brand,
        'gender' => $request->gender,
        'image' => $path
    ]);

    return redirect('/');
}
}