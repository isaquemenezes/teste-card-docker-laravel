<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PedidosStoreRequest;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoController extends Controller
{
    public function index()
    {
    
        $produtos = Produto::whereHas('pedidos', function ($query) {
            $query->where('status', 1);
        })->get();
      
        return view('pedidos.index', compact('produtos'));
    }

    public function create() 
    {

        $produtos = Produto::with('imagens')->get(); 
        $produtos = $produtos->map(function ($produto) {
            
            if ($produto->imagens->isNotEmpty()) {
              
                $produto->primeira_imagem = $produto->imagens->first()->caminho_imagem;
            } 
            return $produto;
        });

        return view('pedidos.create', compact('produtos'));

    }

    public function adicionarProduto(Request $request, Produto $produto)
    {
                      
        try {

                if (!$produto) {
                    return redirect()->back()->withErrors('Produto não encontrado.');
                }             
               
                $pedido = Pedido::create([
                    'produto_id' => $produto->id,
                    'quantidade' => $request->quantidade,
                    'numero_pedido' => 1,
                    'status' => 0
                ]);
                
          
                if ($pedido) {
                
                    return redirect()->back()
                            ->with('success', 'Produto ('. $produto->descricao .') adicionado ao pedido com sucesso!');

                }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function finalizarPedido(Request $request)
    {
        $pedido = Pedido::where('status', 0)
                    ->update(['status' => 1]);               

        return redirect()->route('pedidos.index')
                ->with('success', 'Pedido finalizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
       
        $pedido->delete();
        
        return redirect()->route('pedidos.index')
                ->with('success', 'Pedido excluído com sucesso!');
    }

}
