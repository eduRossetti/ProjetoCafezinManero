<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Exibe todos os clientes.
     */
    public function index()
    {
        $clientes = Cliente::all(); // Pega todos os clientes
        return view('clientes.index', compact('clientes')); // Retorna a view com os clientes
    }

    /**
     * Exibe o formulário para criar um novo cliente.
     */
    public function create()
    {
        return view('clientes.create'); // Retorna a view de criação
    }

    /**
     * Salva um novo cliente no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|string|max:15|unique:clientes',
        ]);

        // Criação do cliente
        Cliente::create($request->all());

        // Redireciona para a lista de clientes
        return redirect()->route('clientes.index');
    }

    /**
     * Exibe os detalhes de um cliente.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id); // Encontra o cliente pelo ID
        return view('clientes.show', compact('cliente')); // Retorna a view com o cliente
    }

    /**
     * Exibe o formulário para editar um cliente.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id); // Encontra o cliente para editar
        return view('clientes.edit', compact('cliente')); // Retorna a view de edição
    }

    /**
     * Atualiza os dados de um cliente no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id,
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'required|string|max:15|unique:clientes,telefone,' . $id,
        ]);

        // Encontra o cliente e atualiza os dados
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        // Redireciona para a lista de clientes
        return redirect()->route('clientes.index');
    }

    /**
     * Deleta um cliente do banco de dados.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id); // Encontra o cliente para deletar
        $cliente->delete(); // Deleta o cliente

        // Redireciona para a lista de clientes
        return redirect()->route('clientes.index');
    }
}