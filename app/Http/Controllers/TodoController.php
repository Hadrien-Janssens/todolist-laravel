<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $todos = User::find($id)->todos()->get();

        return view('users.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo;

        $validatedData = $request->validate([
            'name' => 'required | max:255'
        ]);

        $todo->name = $validatedData['name'];
        $todo->user_id = Auth::id();

        $todo->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        if ($request->input('is-check') === 'on') {
            $isCheck = true;
        } else {
            $isCheck = false;
        }
        // dd($id);
        $todo = Todo::findOrFail($id);
        $todo->is_check = $isCheck;
        $todo->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->back();
    }
}