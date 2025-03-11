<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm từ bảng products
        $products = Product::all();

        // Trả dữ liệu vào view
        return view('products.index', compact('products'));
    }
}
