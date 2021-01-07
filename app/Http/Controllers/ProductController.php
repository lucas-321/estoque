<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        /*$this->middleware('auth')->except([
            'index', 'show'
        ]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $products = Product::orderBy('created_at', 'desc')->paginate();
        return view('admin.pages.products.index', [
            'products' => $products,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'cost', 'valor', 'qtd', 'loc');

        if ($request->hasFile('image') && $request->image->isValid()){
           
            $imagePath = $request->image->store('products');
           
            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();

        if(!$product =  $this->repository->find($id))
            return redirect()->back();
        

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product =  $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function altera($id)
    {
        if(!$product = Product::find($id))
            return redirect()->back();

        return view('admin.pages.products.altera', [
            'product' => $product
        ]);
    }

    public function muda(Request $request, $id)
    {
        $n1 = $_GET['op1'];
        $n2 = $_GET['op2'];
        if(!$product =  $this->repository->find($id))
            return redirect()->back();


            $new_qtd = $product->qtd+$n1;
            $new_qtd = $new_qtd-$n2;

            $product->qtd=$new_qtd;
            //dd("Entrou na função, a variável é $n1 e o produto é $product->name a quantidade atualizada é $new_qtd o esperado é $product->qtd.");


            $product->update($request->all());

            return redirect()->route('products.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if(!$product =  $this->repository->find($id))
            return redirect()->back();

            $data = $request->all();

            if ($request->hasFile('image') && $request->image->isValid()){

                if($product->image && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }
           
                $imagePath = $request->image->store('products');
               
                $data['image'] = $imagePath;
            }

            $product->update($data);

            return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  $this->repository->where('id', $id)->first();

        if(!$product)
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }

    /** */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
