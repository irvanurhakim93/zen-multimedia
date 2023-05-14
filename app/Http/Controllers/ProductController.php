<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\PostDummy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ini adalah fungsi index,dimana ketika sebuah controller di inisiasi 
        //maka index yang akan muncul,ini berasal dari folder resource/views
        $productsList = Products::all();

        //untuk menampilkan data beserta tampilan home versi blade bisa menggunakan kode dibawah berikut 
        //return view('home',compact('productsList'));
        
        //untuk menampilkan data dalam bentuk data JSON bisa menggunakan kode dibawah berikut
        //Menginisiasi ProductResource juga karena untuk menampilkan status beserta mengkaitkan pada model Products
        return new ProductResource(view('home',compact('productsList')), 'Products List',$productsList);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inputproductname' => 'required',
            'inputvariants' => 'required',
            'inputproductcategories' => 'required',
            'inputproductimages' => 'required'
        ]);

        $product = Products::create([
            'product_name' => $request->inputproductname,
            'variants' => $request->inputvariants,
            'product_categories' => $request->inputproductcategories,
            'product_images' => $request->inputproductimages,
        ]);


        if ($product) {
            return response()->json([
                'success' => true,
                'products' => $product
            ],201);
        }

        if ($product) {
            return response()->json([
                'success' => false,
            ],409);
        }



        // if ($request->hasFile('inputproductimages')) {
        //     $productimage = $request->file('inputproductimages');
        //     $inputproductname = rand(1000, 9999) . $productimage->getClientOriginalName();
        //     $path = public_path(). 'uploads/products';
        //     $productimage->move($path, $inputproductname);
        //     $product->product_image;
        // }

        // $product->save();

        if ($product) {
            return response()->json([
                'success' => true,
                'products' => $product
            ],201);
        }

        if ($product) {
            return response()->json([
                'success' => false,
            ],409);
        }

        // return redirect()->route('products.index')->with('status','Berhasil');
                   //mengvalidasi terlebih dahulu sebuah formulir penginputan
        
    }

    public function postmanstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'deskripsi'     => 'required'
        ]);

        $product = PostDummy::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);


        if ($product) {
            return response()->json([
                'success' => true,
                'products' => $product
            ],201);
        }

        if ($product) {
            return response()->json([
                'success' => false,
            ],409);
        }

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editproduct = Products::findOrFail($id);
        return view('edit',compact('editproduct'));
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
                //mengvalidasi terlebih dahulu sebuah formulir penginputan
                $this->validate($request,[
                    'editname' => 'required',
                    'editvariants' => 'required',
                    'editcategories' => 'required',
                    'editimages' => 'required'
                ]);
        
        
                //menginisiasi sebuah model products dan memproses sebuah penginputan
                $updateproduct = Products::find($id);
                $updateproduct->product_name = $request->editname;
                $updateproduct->variants = $request->editvariants;
                $updateproduct->product_categories = $request->editcategories;
        
                //update untuk upload image
                if ($request->hasFile('editimages')) {
                    $editproductimages = $request->file('editimages');
                    $editproductimagename = rand(1000,9999) . $editproductimages->getClientOriginalName();
                    $editproductimages->storeAs('public/uploads/products', $editproductimagename); 
                    // $editproductimages->move('uploads/products', $editproductimagename);
                    $updateproduct->product_images;
                }

                
        
                //setelah penginputan maka akan disimpan ke dalam database dan akan meredirect ke halaman product
        
                $updateproduct->updated_at = Carbon::now();
                $updateproduct->save();
                // return redirect()->route('products.index');
                return new ProductResource(true,'Data Berhasil Dihapus',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //menginisiasi sebuah model Product lalu mencari id mana yang akan dihapus
                Products::where('id',$id)->delete();

                //apabila proses penghapusan selsai,maka akan diarahkan ke halaman product sesuai routes
                return redirect()->route('products.index');
    }
}
