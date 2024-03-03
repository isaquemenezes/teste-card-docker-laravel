@extends("layouts.head")
@extends("layouts.navbar")

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
   
   @extends("layouts.footer")