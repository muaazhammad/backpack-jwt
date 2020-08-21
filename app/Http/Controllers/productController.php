<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class productController extends Controller
{


    protected $user;

    public function __construct()
    {
//        $this->user = JWTAuth::parseToken()->authenticate();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


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

        {
            $this->validate($request, [
                'title' => 'required',
                'price' => 'required|integer',
            ]);

            $product = new Product();
            $product->title = $request->title;
            $product->price = $request->price;



            if ($product->save())
                return response()->json([
                    'success' => true,
                    'product' => $product
                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, product could not be added'
                ], 500);
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

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


        //

        $product = Product::find($id);
        $product->update($request->all());
        echo "update done";
        return $request;
//
//        if (!$product) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
//            ], 400);
//        }
//
//
//
//        $updated=   $product->fill($request->all())->save();
//
//
//
//        if ($updated) {
//            return response()->json([
//                'success' => true
//            ]);
//        } else {
//            return response()->json([
//                'success' => false,
//                'message' => 'Sorry, product could not be updated'
//            ], 500);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        if (is_null($product)){
            return response()->json("not foujnd" , 404);
        }
        $product->delete();
         return response()->json("item is deleted " , 204);

    }
}
