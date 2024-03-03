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
              <a class="nav-link" href="{{ route('produtos.index') }}">Lista de Produtos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('pedidos.index') }}">Lista de Pedidos</a>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

        </div>
      </div>
    </nav>

    <main class="container">     
        <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">     
    </div>    
     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">

       @if(session('success'))
           <div class="alert alert-success" role="alert">
               {{ session('success') }}
           </div>
       @endif 

       <div class="d-flex justify-content-between">
         <h3 class="border-bottom pb-2 mb-0">Produtos Disponíveis</h3>

       </div>      

       @if($produtos->isEmpty())
            <strong class="d-block mt-2"> Sem Produtos </strong>
        @else
            @foreach($produtos as $produto)
                <div class="d-flex text-body-secondary pt-3">            
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark"><b>Descrição: </b>  {{ $produto->descricao }}</strong>
                            <div class="d-flex justify-content-between">

                                <form id="pedidoForm" action="{{ route('adicionar-produto-pedido', $produto->id ) }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success" id="adicionar-produto-pedido">Add +</button>
                                    </div>
                            </div>

                        </div>
                        <span class="d-block"><b>Valor:</b> {{ $produto->valor_venda }} </span>
                        <span class="d-block"><b>Estoque:</b> {{ $produto->estoque }} </span> <br>
                        <span class="d-block"><b>Quantidade:</b>  <input type="number" name="quantidade" value="1" min="1" style="width: 80px;"></span> 
                                </form>
                        
                    </div>
                </div>              
            @endforeach
        @endif

        <form id="finalizarPedidoForm" action="{{ route('finalizar-pedido') }}" method="POST" class="mt-5">
            @csrf            
            <button type="submit" class="btn btn-primary" id="finalizar-pedido">
                Finalizar Pedido
            </button>
        </form>

     </div>
   </main>

    <!-- Bootstrap JS do CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
