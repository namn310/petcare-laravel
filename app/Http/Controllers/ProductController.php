<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\ImageProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::all();
        $category = category::all();
        return view('Admin.Quanlysanpham', ['product' => $product, 'category' => $category]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = DB::table('categories')->select('name')->get();
        return view('Admin.Addsanpham')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->create($request);
        return redirect(route('admin.product'))->with('notice', 'Thêm thành công');
    }
    public function getCategory($id)
    {
        $categoryName = DB::table('categories')->select('name')->where('idCat', $id)->get();
        return $categoryName;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::find($id);
        $category = category::all();
        return view('Admin.FormChangeProduct', ['product' => $product, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = new product();
        $product->updateProduct($request, $id);
        return redirect(route('admin.product'))->with('notice', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);

        $imgProduct = ImageProduct::select()->where('idPro', $id)->get();
        foreach ($imgProduct as $result) {
            if (File::exists('assets/img-add-pro/' . $result->image)) {
                File::delete('assets/img-add.pro/' . $result->image);
            }
            $imgId = $result->id;
            // $imgElement = ImageProduct::find($imgId);
            DB::table('image_products')->where('id', $imgId)->delete();
            // dd($imgElement);
            // $imgElement->delete();
        }
        $product->delete();
        return redirect(route('admin.product'))->with('notice', 'Xóa thành công !');
    }
}
