<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class productsController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'store'])->paginate();
        //SELECT * FROM products
        //SELECT * FROM categories WHERE id in (*)
        //SELECT * FROM store WHERE id IN (*)

        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();

        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.products.create', compact('product', 'categories', 'tags'));

    }

    public function store(Request $request)
    {
        
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        
        Product::create($data);

        return Redirect::route('dashboard.product.index')
            ->with('success', 'product created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $tags = implode(',', $product->tags()->pluck('name')->toArray());
        return view('dashboard.products.edit', compact('product', 'tags'));
        // $product = Product::findOrFail($id);


        // $tags = implode(',', $product->tags()->pluck('name')->toArray());

        // return view('dashboard.products.edit', compact('product', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->except('tags'));

        $tags = json_decode($request->post('tags'));// explode() exchng the sting to array 
        $tag_ids = [];

        $saved_tags = Tag::all();

        foreach ( $tags as $t_name ) {
            $slug = Str::slug($t_name->value);
            $tag = $saved_tags->where('slug', $slug)->first();

            if (!$tag) {
                $tag = Tag::create([
                    'name' => $t_name->value,
                    'slug' => $slug,
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $product->tags()->sync($tag_ids);

        return Redirect()->route('dashboard.products.index')
            ->with('success', 'Product update');
    }

    public function destroy($id)
    {
        //
    }
    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return null;    
        }

        return $request->file('image')->store('uploads', [
            'disk' => 'uploads'
        ]);
    }
}
