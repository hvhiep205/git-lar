<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\BillDetail;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất
        return view('page.trangchu', compact('slide', 'newProducts', 'topProducts'));
    }
				
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
    
        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
                
    public function getIndexAdmin()													
        {													
        $products = Product::all();													
        return view('pageadmin.admin')->with(['products' => $products, 'sumSold' => count(BillDetail::all())]);													
        }
        
    public function postAdminAdd(Request $request)							
         {							
        $product = new Product();							
        if ($request->hasFile('inputImage')) {							
        $file = $request->file('inputImage');							
        $fileName = $file->getClientOriginalName('inputImage');							
        $file->move('source/image/product', $fileName);							
        }							
        $file_name = null;							
        if ($request->file('inputImage') != null) {							
        $file_name = $request->file('inputImage')->getClientOriginalName();							
        }							
                                    
         $product->name = $request->inputName;							
         $product->image = $file_name;							
        $product->description = $request->inputDescription;							
        $product->unit_price = $request->inputPrice;							
        $product->promotion_price = $request->inputPromotionPrice;							
        $product->unit = $request->inputUnit;							
        $product->new = $request->inputNew;							
        $product->id_type = $request->inputType;							
        $product->save();							
         return $this->getIndexAdmin();							
        }							
        
    public function postAdminDelete($id)
        {
            $product = Product::find($id);
            $product->delete();
            return $this->getIndexAdmin();
        }
        
    public function postAdminEdit(Request $request)
        {
            $id = $request->editId;
            $product = Product::find($id);
        
            if ($request->hasFile('editImage')) {
                $file = $request->file('editImage');
                $fileName = $file->getClientOriginalName();
                $file->move('source/image/product', $fileName);
                $product->image = $fileName;
            }
        
            $product->name = $request->editName;
            $product->description = $request->editDescription;
            $product->unit_price = $request->editPrice;
            $product->promotion_price = $request->editPromotionPrice;
            $product->new = $request->editNew;
            $product->id_type = $request->editType;
        
            $product->save();
            return $this->getIndexAdmin();
        }
    public function getAdminEdit($id)
        {
            $product = Product::find($id);
            return view('pageadmin.formEdit')->with('product', $product);
        }
        public function getAdminAdd()						
             {						
                return view('pageadmin.formAdd');						
            }						
                                

    public function getChiTietSanPham($id) {
        $sanpham = Product::find($id);
        $relatedProducts = $sanpham->relatedProducts();
        $newProducts = $sanpham->newProducts();
        return view('page.chitiet_sanpham', compact('sanpham', 'relatedProducts', 'newProducts'));
    }           
    public function getLienHe(){					
    	return view('page.lienhe');				
    }					
    public function getAbout(){					
    	return view('page.about');				
    }					
    public function getDangKy(){					
    	return view('page.dangky');				
    }					
    public function getDangNhap(){					
    	return view('page.dangnhap');				
    }					
    public function getThanhToan(){					
    	return view('page.thanhtoan');				
    }					
}