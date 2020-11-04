<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
        /**
     * @var \App\Repositories\ProductRepository.
     *
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->productRepository->allProduct();

        return view('productIndex', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = $this->productRepository->allCategory();
        return view('productCreate', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'      =>  'required|min:3|max:255',
            'category'          =>  'uuid|exists:categories,id',
            'product_quantity'  =>  'required',
            'product_price'     =>  'required',
            'product_status'    =>  'required',
            'image'             =>  'required|image|max:2048'
        ]);

        $this->productRepository->save($request->all());

        return redirect('Product')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('ProductView', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::all();
        return view('productEdit', compact(['data','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'product_name'      =>  'required|min:3|max:255',
                'category'          =>  'uuid|exists:categories,id',
                'product_quantity'  =>  'required',
                'product_price'     =>  'required',
                'product_status'    =>  'required',
                'image'             =>  'required|image|max:2048'
            ]);
        }
        else
        {
            $request->validate([
                'product_name'      =>  'required|min:3|max:255',
                'category'          =>  'uuid|exists:categories,id',
                'product_quantity'  =>  'required',
                'product_price'     =>  'required',
                'product_status'    =>  'required'
            ]);
        }

        $this->productRepository->update($id, $request->all());

        return redirect('Product')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect('Product')->with('success', 'Data is successfully deleted');
    }
}
