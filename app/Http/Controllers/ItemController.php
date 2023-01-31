<?php

namespace App\Http\Controllers;

use App\Models\Catitem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:items.index')->only('index');
        $this->middleware('can:items.edit')->only('edit','update');
        $this->middleware('can:items.create')->only('create','store');
        $this->middleware('can:items.destroy')->only('destroy');
    }

    public function index()
    {
        $items = Item::all();

        return view('item.index', compact('items'))
            ->with('i', 0);
    }

    public function create()
    {
        $item = new Item();
        $categorias = Catitem::all()->pluck('nombre', 'id');
        return view('item.create', compact('item', 'categorias'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            request()->validate(Item::$rules);

            $item = Item::create($request->all());

            $file = $request->file('imagen');
            if ($file) {
                $extension =  $file->clientExtension();
                $path = $file->storeAs(
                    'img/productos',
                    $item->id . ".$extension"
                );
                $item->imagen = $path;
                $item->save();
            } else {
                $item->imagen = 'img/noImagen.jpg';
                $item->save();
            }

            DB::commit();
            return redirect()->route('items.create')
                ->with('success', 'Item creado correctamente.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('items.index')
                ->with('error', 'Ocurrio un error.');
        }
    }

    public function show($id)
    {
        $item = Item::find($id);

        return view('item.show', compact('item'));
    }


    public function edit($id)
    {
        $item = Item::find($id);
        $categorias = Catitem::all()->pluck('nombre', 'id');
        return view('item.edit', compact('item','categorias'));
    }


    public function update(Request $request, Item $item)
    {
        request()->validate(Item::$rules);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully');
    }


    public function destroy($id)
    {
        $item = Item::find($id)->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully');
    }
}
