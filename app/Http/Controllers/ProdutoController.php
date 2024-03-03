<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoStoreRequest;
use App\Models\Produto;
use App\Models\Imagem;

use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::with('imagens')->get(); 
        $produtos = $produtos->map(function ($produto) {
            
            if ($produto->imagens->isNotEmpty()) {
              
                $produto->primeira_imagem = $produto->imagens->first()->caminho_imagem;
            } 
            return $produto;
        });

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(ProdutoStoreRequest $request)
    {
         
        try {           

            $validated = $request->validated();
            // dd($validated);
                                
            //  // Upload da imagem
            // if ($request->hasFile('imagem')) {
            //     $imagem = $request->file('imagem');
            //     $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            //     $caminhoImagem = 'imagens/produtos/';
            //     $imagem->storeAs($caminhoImagem, $nomeImagem);
            //     $validated['imagens'] = $caminhoImagem . $nomeImagem; // Atualizando o campo 'imagens' com o caminho da imagem
            // }
            // Upload da imagem
            // if ($request->hasFile('imagem')) {
            //     $imagem = $request->file('imagem');
            //     $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            //     $caminhoImagem = 'imagens/produtos/';              
            //     $imagem->storeAs('public/' . $caminhoImagem, $nomeImagem);               
            //     $validated['imagens'] = 'storage/' . $caminhoImagem . $nomeImagem;
            // }

            $produto = Produto::create($validated);

            if ($produto) {           
                // Upload das imagens
                if ($request->hasFile('imagens')) {
                    $imagens = [];
                    foreach ($request->file('imagens') as $imagem) {
                        $nomeImagem = time() . '_' . $imagem->getClientOriginalName();
                        // $caminhoImagem = 'imagens/produtos/';
                        $caminhoImagem = '';
                        $imagem->storeAs('public/' . $caminhoImagem, $nomeImagem);
                        // $imagens[] = 'storage/' . $caminhoImagem . $nomeImagem;
                        // Crie uma nova imagem na tabela 'imagens'
                        Imagem::create([
                            'produto_id' => $produto->id,
                            'caminho_imagem' => 'storage/' . $caminhoImagem . $nomeImagem,
                        ]);

                    }
                    
                }
            }
           
            return redirect()
                    ->route('produtos.index')
                    ->with('success', 'Produto adicionado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                    ->back()
                    ->withErrors($e->getMessage());
        }
       
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(ProdutoStoreRequest $request, Produto $produto)
    {
        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }



}
