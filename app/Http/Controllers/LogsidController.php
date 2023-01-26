<?php

namespace App\Http\Controllers;

use App\Models\Logsid;
use Illuminate\Http\Request;

/**
 * Class LogsidController
 * @package App\Http\Controllers
 */
class LogsidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logsids = Logsid::paginate();

        return view('logsid.index', compact('logsids'))
            ->with('i', (request()->input('page', 1) - 1) * $logsids->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logsid = new Logsid();
        return view('logsid.create', compact('logsid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Logsid::$rules);

        $logsid = Logsid::create($request->all());

        return redirect()->route('logsids.index')
            ->with('success', 'Logsid created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logsid = Logsid::find($id);

        return view('logsid.show', compact('logsid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logsid = Logsid::find($id);

        return view('logsid.edit', compact('logsid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Logsid $logsid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logsid $logsid)
    {
        request()->validate(Logsid::$rules);

        $logsid->update($request->all());

        return redirect()->route('logsids.index')
            ->with('success', 'Logsid updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $logsid = Logsid::find($id)->delete();

        return redirect()->route('logsids.index')
            ->with('success', 'Logsid deleted successfully');
    }
}
