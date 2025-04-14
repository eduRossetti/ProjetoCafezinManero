<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Exibe todos os cafés.
     */
    public function index()
    {
        $coffees = Coffee::with('fornecedor')->get(); // Pega todos os cafés, incluindo as informações do fornecedor
        return view('coffees.index', compact('coffees')); // Retorna a view com os cafés
    }

    /**
     * Exibe o formulário para criar um novo café.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all(); // Pega todos os fornecedores para selecionar no formulário
        return view('coffees.create', compact('fornecedores')); // Retorna a view de criação com fornecedores
    }

    /**
     * Salva um novo café no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'seal' => 'required|string|max:255',
            'fornecedores_id' => 'required|exists:fornecedores,id',
            'barcode' => 'required|string|max:255|unique:coffees',
            'price' => 'required|numeric|min:0',
        ]);

        // Criação do café
        Coffee::create($request->all());

        // Redireciona para a lista de cafés
        return redirect()->route('coffees.index');
    }

    /**
     * Exibe os detalhes de um café.
     */
    public function show($id)
    {
        $coffee = Coffee::with('fornecedor')->findOrFail($id); // Encontra o café com o fornecedor associado
        return view('coffees.show', compact('coffee')); // Retorna a view com o café
    }

    /**
     * Exibe o formulário para editar um café.
     */
    public function edit($id)
    {
        $coffee = Coffee::findOrFail($id); // Encontra o café para editar
        $fornecedores = Fornecedor::all(); // Pega todos os fornecedores
        return view('coffees.edit', compact('coffee', 'fornecedores')); // Retorna a view de edição
    }

    /**
     * Atualiza os dados de um café no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'seal' => 'required|string|max:255',
            'fornecedores_id' => 'required|exists:fornecedores,id',
            'barcode' => 'required|string|max:255|unique:coffees,barcode,' . $id,
            'price' => 'required|numeric|min:0',
        ]);

        // Encontra o café e atualiza os dados
        $coffee = Coffee::findOrFail($id);
        $coffee->update($request->all());

        // Redireciona para a lista de cafés
        return redirect()->route('coffees.index');
    }

    /**
     * Deleta um café do banco de dados.
     */
    public function destroy($id)
    {
        $coffee = Coffee::findOrFail($id); // Encontra o café para deletar
        $coffee->delete(); // Deleta o café

        // Redireciona para a lista de cafés
        return redirect()->route('coffees.index');
    }
}