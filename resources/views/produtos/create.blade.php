@extends("layouts.head")
@extends("layouts.navbar")
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card mt-5">
                    <div class="card-header">Adicionar Produto</div>

                    <div class="card-body">                     

                        <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" require>
                            </div>

                            <div class="form-group mt-2">
                                <label for="valor_venda">Valor de Venda</label>
                                <input type="number" class="form-control" id="valor_venda" name="valor_venda" step="0.01" require>
                            </div>

                            <div class="form-group mt-2">
                                <label for="estoque">Estoque</label>
                                <input type="number" class="form-control" id="estoque" name="estoque" require>
                            </div>

                            <div class="form-group mt-2">
                                <label for="imagem">Uplaod Imagens</label>
                                <input type="file" class="form-control" id="imagem" name="imagens[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Adicionar Produto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends("layouts.footer")