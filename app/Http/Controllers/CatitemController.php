<?php

namespace App\Http\Controllers;

use App\Models\Catitem;
use Illuminate\Http\Request;

/**
 * Class CatitemController
 * @package App\Http\Controllers
 */
class CatitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catitems = Catitem::paginate();

        return view('catitem.index', compact('catitems'))
            ->with('i', (request()->input('page', 1) - 1) * $catitems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catitem = new Catitem();
        return view('catitem.create', compact('catitem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Catitem::$rules);

        $catitem = Catitem::create($request->all());

        return redirect()->route('catitems.index')
            ->with('success', 'Catitem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catitem = Catitem::find($id);

        return view('catitem.show', compact('catitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catitem = Catitem::find($id);

        return view('catitem.edit', compact('catitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Catitem $catitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catitem $catitem)
    {
        request()->validate(Catitem::$rules);

        $catitem->update($request->all());

        return redirect()->route('catitems.index')
            ->with('success', 'Catitem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $catitem = Catitem::find($id)->delete();

        return redirect()->route('catitems.index')
            ->with('success', 'Catitem deleted successfully');
    }
}
