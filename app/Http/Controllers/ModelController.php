<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Model;
use App\Models\Maker;
 
class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{ 
    $makers = Maker::all();

    $query = Model::query();
    if ($request->has('maker_id') && $request->maker_id) {
        $query->where('maker_id', $request->maker_id);
    }

    $models = $query->paginate(10);

    return view('models.index', compact('models', 'makers'));
}

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.create');
 
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model  = new Model();
        $model->name = $request->input('name');
        $model->maker_id = $request->input('maker_id');
        $model->save();
 
        return redirect()->route('models.index')->with('success', "{$model->name} sikeresen létrehozva");
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Model::find($id);
        return view('models.show', compact('model'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Model::find($id);
        return view('models.edit', compact('model'));
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
        $model  = Model::find($id);
        $model->name = $request->input('name');
        $model->maker_id = $request->input('maker_id');
        $model->save();
 
        return redirect()->route('models.index')->with('success', "{$model->name} sikeresen módosítva");
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model  = Model::find($id);
        $model->delete();
 
        return redirect()->route('models.index')->with('success', "Sikeresen törölve");
    }
}