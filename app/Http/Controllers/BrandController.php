<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Brand::all();
        return view('admin.Brand.all_brand',compact('data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        return view('admin.Brand.add_brand');
    }

    public function create(BrandRequest $request)
    {
        Brand::create($request->all());
        return Redirect()->route('ALL_BRAND')->with('message','Add New Brand Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('admin.Brand.update_brand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $brand_id)
    {
        $entity2 = Brand::find($brand_id);
        $entity2->update($request->all());
        return Redirect()->route('ALL_BRAND')->with('message','Update Brand Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        Brand::find($brand_id)->delete();
        return Redirect()->route('ALL_BRAND')->with('message','Delete Brand Successfully!');
    }
}
