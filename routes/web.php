<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Produto;


Route::get('/', function () {
    return view('welcome');
})->name("homepage");


Route::post('/cadastrar', function(Request $informacoes) {
    Produto::create([
        "nome" => $informacoes->nome_produto,
        "descricao" => $informacoes->descricao_produto,
        "preco" => $informacoes->preco_produto,
        "quantidade" => $informacoes->quantidade_produto
    ]);
    // echo "Cadastro realizado com sucesso!";
    session()->flash('mensagem', 'Cadastro realizado com sucesso!');
    return redirect()->route('lista.produtos');
    
});

// Indo buscar uma informação
Route::get('mostrar-produto/{id}', function($id) {
    $produto = Produto::findOrFail($id);
    $produto->nome;
    $produto->descricao;
    $produto->preco;
    $produto->quantidade;
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    return view('lista_produtos', ['produtos' => $produtos]);
})->name('lista.produtos');

Route::put('/produtos/{id}', function($id, Request $request) {
    $produto = Produto::findOrFail($id);
    $produto->update([
        "nome" => $request->nome,
        "descricao" => $request->descricao,
        "preco" => $request->preco,
        "quantidade" => $request->quantidade
    ]);
    return redirect()->route('lista.produtos')->with('mensagem', 'Produto atualizado com sucesso!');
})->name('produto.atualizar');

Route::delete('excluir-produto/{id}', function($id) {
    $produto = Produto::findOrFail($id);
    $produto->delete();
    return redirect()->route('lista.produtos')->with('mensagem', 'Produto excluído com sucesso!');
})->name('produto.excluir');
