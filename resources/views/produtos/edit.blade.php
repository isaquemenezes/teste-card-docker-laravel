@extends("layouts.head")
@extends("layouts.navbar")

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card mt-5">
                    <div class="card-header">Editar Produto</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('produtos.update', $produto->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao"value="{{ $produto->descricao }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="valor_venda">Valor de Venda</label>
                                <input type="number" class="form-control" id="valor_venda" name="valor_venda" step="0.01" value="{{ $produto->valor_venda }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="estoque">Estoque</label>
                                <input type="number" class="form-control" id="estoque" name="estoque" value="{{ $produto->estoque }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Editar Produto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends("layouts.footer")