<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffee = Coffee::all();
        return view('coffee', ['data' => $coffee]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('coffee.create', ['fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seal' => 'required|string|max:255',
            'fornecedores_id' => 'required|exists:fornecedores,id',
            'barcode' => 'required|string|max:255|unique:coffee',
            'price' => 'required|numeric|min:0',
        ]);

        $data = [
            'name' => $request->name,
            'seal' => $request->seal,
            'fornecedores_id' => $request->fornecedores_id,
            'barcode' => $request->barcode,
            'price' => $request->price,
        ];

        Coffee::create($data);
        return redirect('coffee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coffee $coffee)
    {
        return view('coffee.show', ['coffee' => $coffee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coffee = Coffee::find($id);
        if (!$coffee) {
            return redirect('coffee')->with('error', 'Coffee not found');
        }
        $fornecedores = Fornecedor::all();
        return view('coffee.edit', ['coffee' => $coffee, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coffee = Coffee::find($id);
        if (!$coffee) {
            return redirect('coffee')->with('error', 'Coffee not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'seal' => 'required|string|max:255',
            'fornecedores_id' => 'required|exists:fornecedores,id',
            'barcode' => 'required|string|max:255|unique:coffee,barcode,' . $id,
            'price' => 'required|numeric|min:0',
        ]);

        $data = [
            'name' => $request->name,
            'seal' => $request->seal,
            'fornecedores_id' => $request->fornecedores_id,
            'barcode' => $request->barcode,
            'price' => $request->price,
        ];

        $coffee->update($data);
        return redirect('coffee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coffee = Coffee::find($id);
        if (!$coffee) {
            return redirect('coffee')->with('error', 'Coffee not found');
        }
        $coffee->delete();
        return redirect('coffee');
    }

    /**
     * Search for coffee by various fields.
     */
    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Coffee::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("coffee.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        } else {
            $data = Coffee::all();
        }

        return view("coffee.list", ['data' => $data]);
    }
}