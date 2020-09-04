<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Profesor;
use App\Grado;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = __('messages.courses.title');
        $data["teachers"] = Profesor::all();
        $data["grados"] = Grado::all();
        return view('materia.crea') -> with("data", $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        $nombre = $request->input("name");
        $grado_id = $request->input("grado");
        $profesor_id = $request->input("teacher") == 0 ? null : $request->input("teacher");

        Materia::create(['nombre' => $nombre, 'profesor_id' => $profesor_id, 'grado_id' => $grado_id]);
        return back()->with('success','Item created successfully!');
    }
}

/*
class ProductController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        $listOfSizes = array("XS","S","M","L","XL");

        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["sizes"] = $listOfSizes;
        return view('product.show')->with("data",$data);
    }


    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('product.create')->with("data",$data);
    }


    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Product::create($request->only(["name","price"]));

        return back()->with('success','Item created successfully!');
    }
}*/