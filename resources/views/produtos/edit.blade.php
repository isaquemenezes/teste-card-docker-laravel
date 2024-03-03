<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>      

    <!-- Bootstrap CSS do CDN -->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
      <div class="container-fluid">
       
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('produtos.create')}}">Cadastrar Produto</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Novo Pedido</a>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

        </div>
      </div>
    </nav>

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


       <!-- Bootstrap JS do CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
