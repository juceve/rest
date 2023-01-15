<?php

namespace App\Http\Controllers;

use App\Models\Cartmenu;
use Illuminate\Http\Request;

/**
 * Class CartmenuController
 * @package App\Http\Controllers
 */
class CartmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartmenus = Cartmenu::paginate();

        return view('cartmenu.index', compact('cartmenus'))
            ->with('i', (request()->input('page', 1) - 1) * $cartmenus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartmenu = new Cartmenu();
        return view('cartmenu.create', compact('cartmenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cartmenu::$rules);

        $cartmenu = Cartmenu::create($request->all());

        return redirect()->route('cartmenus.index')
            ->with('success', 'Cartmenu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartmenu = Cartmenu::find($id);

        return view('cartmenu.show', compact('cartmenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cartmenu = Cartmenu::find($id);

        return view('cartmenu.edit', compact('cartmenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cartmenu $cartmenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartmenu $cartmenu)
    {
        request()->validate(Cartmenu::$rules);

        $cartmenu->update($request->all());

        return redirect()->route('cartmenus.index')
            ->with('success', 'Cartmenu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cartmenu = Cartmenu::find($id)->delete();

        return redirect()->route('cartmenus.index')
            ->with('success', 'Cartmenu deleted successfully');
    }
}
