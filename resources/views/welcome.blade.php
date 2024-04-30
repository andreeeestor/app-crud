<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="/cadastrar" method="POST">
        @csrf
        <input type="text" name="nome_produto" id="" placeholder="nome">
        <input type="number" name="preco_produto" id="" placeholder="preço" value="0">
        <input type="text" name="descricao_produto" id="" placeholder="descrição">
        <input type="number" name="quantidade_produto" id="" placeholder="quantidade" value="0.00">
        <button type="submit">Enviar</button>

    </form>
    
</body>
</html>