<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Fuel;
 
 
class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuels = Fuel::all();
        return view('fuels.index', compact('fuels'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fuels.create');
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fuel  = new Fuel();
        $fuel->name = $request->input('name'); 
        $fuel->save();
 
        return redirect()->route('fuels.index')->with('success', "{$fuel->name} sikeresen létrehozva");
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuel = Fuel::find($id);
        return view('fuels.show', compact('fuel'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuel = Fuel::find($id);
        return view('fuels.edit', compact('fuel'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fuel  = Fuel::find($id);
        $fuel->name = $request->input('name');
        $fuel->save();
 
        return redirect()->route('fuels.index')->with('success', "{$fuel->name} sikeresen módosítva");
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuel  = Fuel::find($id);
        $fuel->delete();
 
        return redirect()->route('fuels.index')->with('success', "Sikeresen törölve");
    }
}