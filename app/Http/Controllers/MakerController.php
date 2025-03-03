<?php
 
namespace App\Http\Controllers;
 
use App\Models\Maker;
use Illuminate\Http\Request;
use App\Http\Requests\MakerRequest;
 
class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::all();
        return view('makers.index', compact('makers'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(view: 'makers.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakerRequest $request)
    {
      
        $maker  = new Maker();
        $maker->name = $request->input('name');
        $logo = $request['logo'];
        //$logo = $request->file('logo');
        //$path = $request->file('logo')->store(public_path('logos'));
        //File::move(public_path('logos'), $logo);
        $maker->logo = $logo;
        //$maker->create($request->all());
        $maker->save();

 
        return redirect()->route('makers.index')->with('success', "{$maker->name} sikeresen létrehozva");
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maker = Maker::find($id);
        return view('makers.show', compact('maker'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maker = Maker::find($id);
        return view('makers.edit', compact('maker'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MakerRequest $request, $id)
    {
        //$request->validate($this->getNameValidationRules());
        $maker  = Maker::find($id);
        $maker->name = $request->input('name');
        $maker->update($request->all());
        $maker->save();

        return redirect()->route('makers.index')->with('success', "{$maker->name} sikeresen módosítva");
    }   
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker  = Maker::find($id);
        $maker->delete();   

        return redirect()->route('makers.index')->with('success', "Sikeresen törölve");
    }

    public function fetchModels($entityId)
	{
		$entity = Maker::find($entityId);
		$result['data'] = $entity->models;
		$result['logo'] = $this->getLogo($entity);

		return response()->json($result);
	}
}