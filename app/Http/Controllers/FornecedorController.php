<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Exibe todos os fornecedores.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all(); // Pega todos os fornecedores
        return view('fornecedores.index', compact('fornecedores')); // Retorna a view com os fornecedores
    }

    /**
     * Exibe o formulário para criar um novo fornecedor.
     */
    public function create()
    {
        return view('fornecedores.create'); // Retorna a view de criação
    }

    /**
     * Salva um novo fornecedor no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores',
            'email' => 'required|email|unique:fornecedores',
            'uf' => 'required|string|max:2',
            'cidade' => 'required|string|max:255',
        ]);

        // Criação do fornecedor
        Fornecedor::create($request->all());

        // Redireciona para a lista de fornecedores
        return redirect()->route('fornecedores.index');
    }

    /**
     * Exibe os detalhes de um fornecedor.
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::findOrFail($id); // Encontra o fornecedor pelo ID
        return view('fornecedores.show', compact('fornecedor')); // Retorna a view com o fornecedor
    }

    /**
     * Exibe o formulário para editar um fornecedor.
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id); // Encontra o fornecedor para editar
        return view('fornecedores.edit', compact('fornecedor')); // Retorna a view de edição
    }

    /**
     * Atualiza os dados de um fornecedor no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj,' . $id,
            'email' => 'required|email|unique:fornecedores,email,' . $id,
            'uf' => 'required|string|max:2',
            'cidade' => 'required|string|max:255',
        ]);

        // Encontra o fornecedor e atualiza os dados
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());

        // Redireciona para a lista de fornecedores
        return redirect()->route('fornecedores.index');
    }

    /**
     * Deleta um fornecedor do banco de dados.
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id); // Encontra o fornecedor para deletar
        $fornecedor->delete(); // Deleta o fornecedor

        // Redireciona para a lista de fornecedores
        return redirect()->route('fornecedores.index');
    }
}