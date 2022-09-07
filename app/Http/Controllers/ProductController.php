<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
      $request->validate([
          'name' => 'required',
          'slug' => 'required',
          'price' => 'required'
      ]);

      return Product::create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }


    /**
     * Search for a name
     *
     * @param string $name
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
