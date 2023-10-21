<?php

namespace Abir\Crud\Http\Controllers;

use Abir\Crud\Models\Crud;
use Abir\Crud\Requests\CrudRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $cruds = Crud::all();
        return view('crud::index', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrudRequest $request)
    {
        $errors = $request->session()->get('errors');
        if (isset($errors)) {
            return redirect()->route('user.create')->with('errors',$request->session()->get('errors'));
        } else {
            $crud = Crud::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crud=Crud::findOrFail($id);

        return view('crud::edit',compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $errors = $request->session()->get('errors');
        if (isset($errors)) {
            return redirect()->route('users.edit')->with('errors',$request->session()->get('errors'));
        } else {
            $crud = Crud::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $crud=Crud::findOrFail($id);

        if(!is_null($crud)){
            $crud->delete();
        }else{
            return redirect()->route('users.index')->with('errors','No Data Available');
        }

        return redirect()->route('users.index');
    }
}
