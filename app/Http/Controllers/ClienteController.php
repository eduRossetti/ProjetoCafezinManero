<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', ['data' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:255|unique:clientes',
            'email' => 'required|email|max:255|unique:clientes',
            'telefone' => 'required|string|max:255|unique:clientes',
        ]);

        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ];

        Cliente::create($data);
        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return redirect('clientes')->with('error', 'Cliente not found');
        }
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return redirect('clientes')->with('error', 'Cliente not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:255|unique:clientes,cpf,' . $id,
            'email' => 'required|email|max:255|unique:clientes,email,' . $id,
            'telefone' => 'required|string|max:255|unique:clientes,telefone,' . $id,
        ]);

        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ];

        $cliente->update($data);
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return redirect('clientes')->with('error', 'Cliente not found');
        }
        $cliente->delete();
        return redirect('clientes');
    }

    /**
     * Search for cliente by various fields.
     */
    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Cliente::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("clientes.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        } else {
            $data = Cliente::all();
        }

        return view("clientes.list", ['data' => $data]);
    }
}