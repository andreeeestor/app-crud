<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <ul>
        @foreach ($produtos as $produto)
            <li>
                {{ $produto->nome }} - {{ $produto->descricao }} - R$ {{ $produto->preco }}

                <!-- Botão de Atualizar -->
                <button class="btn-atualizar" data-produto="{{ $produto->id }}">Atualizar</button>

                <!-- Formulário de atualização (oculto por padrão) -->
                <form action="{{ route('produto.atualizar', ['id' => $produto->id]) }}" method="POST" class="form-atualizar" style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="nome" value="{{ $produto->nome }}">
                    <input type="text" name="descricao" value="{{ $produto->descricao }}">
                    <input type="text" name="preco" value="{{ $produto->preco }}">
                    <input type="text" name="quantidade" value="{{ $produto->quantidade }}">
                    <button type="submit">Salvar</button>
                </form>

                <!-- Botão de Excluir -->
                <form action="{{ route('produto.excluir', ['id' => $produto->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('homepage') }}">Voltar</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botoesAtualizar = document.querySelectorAll('.btn-atualizar');

            botoesAtualizar.forEach(function(botao) {
                botao.addEventListener('click', function() {
                    const formularioAtualizar = this.nextElementSibling;
                    formularioAtualizar.style.display = formularioAtualizar.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
    </script>
</body>
</html>
