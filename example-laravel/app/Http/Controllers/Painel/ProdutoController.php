<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{

    private $produto;
    private $numberPag = 4;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listar Produtos';
        $aba2 = 'active';
        $produtos = $this->produto->paginate($this->numberPag);
        return view('painel.products.productList', compact('title','produtos', 'aba2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Produtos';
        $aba2 = 'active';
        $categorys = ['Escolha uma categoria ...','eletronicos', 'moveis', 'limpeza', 'banho', 'ferramentas', 'roupas', 'instrumentos', 'eletrodomesticos', 'brinquedos', 'alimentos'];

        return view('painel.products.create-edit', compact('title','categorys', 'aba2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $dataForm = $request->all();

        $dataForm['active'] =  !isset($dataForm['active']) ? 0 : 1 ;

        $insert = $this->produto->create($dataForm);
        if ( $insert )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->produto->find($id);
        $title = 'Excluir Produto';
        $aba2 = 'active';

        return view('painel.products.show', compact('title','product', 'aba2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Produto';
        $aba2 = 'active';
        $product = $this->produto->find($id);

        $categorys = ['Escolha uma categoria ...', 'eletronicos', 'moveis', 'limpeza', 'banho', 'ferramentas', 'roupas', 'instrumentos', 'eletrodomesticos', 'brinquedos', 'alimentos'];

        return view('painel.products.create-edit', compact('title','categorys', 'product', 'aba2'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $product = $this->produto->find($id);
        $dataForm['active'] =  !isset($dataForm['active']) ? 0 : 1 ;

        if($dataForm['category'] == "0")
            return redirect()->route('produtos.edit', $id);

        $update = $product->update($dataForm);
        if ( $update )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->produto->find($id);

        $delete = $product->delete();

        if ( $delete )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

}
