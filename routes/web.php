<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Produto;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/cadastrar', function(Request $informacoes) {
    Produto::create([
        "nome" => $informacoes->nome_produto,
        "descricao" => $informacoes->descricao_produto,
        "preco" => $informacoes->preco_produto,
        "quantidade" => $informacoes->quantidade_produto
    ]);
    echo "Cadastro realizado com sucesso!";
    
});

// Indo buscar uma informação
Route::get('mostrar-produto/{id}', function($id) {

});

