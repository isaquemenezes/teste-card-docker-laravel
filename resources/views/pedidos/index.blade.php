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
            <h3 class="border-bottom pb-2 mb-0">Todos os Pedidos</h3>

          <div class="d-flex justify-content-between">
            <a href="{{ route('pedidos.create') }}" class="btn btn-success">Novo Pedido</a>
          
          </div>

        </div>     

        
        @if($produtos->isEmpty())
            <strong class="d-block mt-2"> Sem Pedidos </strong>
        @else
            @foreach($produtos as $produto)
                @if(!$produto->pedidos->isEmpty())
                    <div class="d-flex text-body-secondary pt-3">                     
                        
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark"><b>Descrição: </b>  {{ $produto->descricao }}</strong>

                                <div class="d-flex justify-content-between">
                                                                        
                                    <button 
                                        type="button" 
                                        class="btn btn-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#confirmDeleteModal" 
                                        data-order-id="{{ $produto->pedidos->first()->id }}"
                                    >
                                        Excluir
                                    </button>

                                </div>

                            </div>

                            <span class="d-block"><b>Valor:</b> {{ $produto->valor_venda }} </span>
                            <span class="d-block"><b>Quantidade:</b> {{ $produto->pedidos->first()->quantidade }} </span>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

      </div>
    </main>

    <!-- modal exclusão -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir este pedido?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form id="deleteForm" action="" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    
    <!-- script js   -->
    <script>
      var deleteModal = document.getElementById('confirmDeleteModal');
      deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var productId = button.getAttribute('data-order-id');
        var form = deleteModal.querySelector('#deleteForm');
        var actionUrl = '{{ route("pedidos.destroy", ":id") }}'.replace(':id', productId);
        form.setAttribute('action', actionUrl);
      });
      </script>



   @extends("layouts.footer")
