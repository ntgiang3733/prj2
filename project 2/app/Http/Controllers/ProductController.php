<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Http\Request\StoreProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::where('status',1)->paginate(5);
        return view('admin.pages.product.list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        return view('admin.pages.product.add',compact('category','producttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RStoreProductRequest $request)
    {
        if($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getMimeType();
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if($file_size <= 1048576) {
                    $file_name = date('D-m-yyyy').'_'.rand().'_'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)) {
                        $data = $request->all();
                        $data['slug'] = utf8tourl($request->name);
                        $data['image'] = $file_name;
                        Products::create($data);
                        return redirect()->route('product.index')->with('thongbao','Da them thanh cong san pham moi');
                    }
                }else {
                    return back()->with('error' , 'Ban khong the upload anh qua 1Mb');
                }
            } else {
                return back()->with('error' , 'File anh khong dung dinh dang');
            }
        } else {
            return back()->with('error' , 'Ban chua them anh minh hoa cho san pham');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
