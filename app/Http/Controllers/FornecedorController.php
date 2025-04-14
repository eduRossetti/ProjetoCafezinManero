<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores', ['data' => $fornecedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255|unique:fornecedores',
            'email' => 'required|email|max:255|unique:fornecedores',
            'uf' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'uf' => $request->uf,
            'cidade' => $request->cidade,
        ];

        Fornecedor::create($data);
        return redirect('fornecedores');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedores.show', ['fornecedor' => $fornecedor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return redirect('fornecedores')->with('error', 'Fornecedor not found');
        }
        return view('fornecedores.form', ['fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return redirect('fornecedores')->with('error', 'Fornecedor not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255|unique:fornecedores,cnpj,' . $id,
            'email' => 'required|email|max:255|unique:fornecedores,email,' . $id,
            'uf' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'uf' => $request->uf,
            'cidade' => $request->cidade,
        ];

        $fornecedor->update($data);
        return redirect('fornecedores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return redirect('fornecedores')->with('error', 'Fornecedor not found');
        }
        $fornecedor->delete();
        return redirect('fornecedores');
    }

    /**
     * Search for fornecedor by various fields.
     */
    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Fornecedor::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("fornecedores.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        } else {
            $data = Fornecedor::all();
        }

        return view("fornecedores.list", ['data' => $data]);
    }
}