<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('id', 'desc')->simplePaginate(25);
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data['title'] = $request['title'];
        $data['com'] = ($request['com'] == 1)  ? 1 : 0;

        if (Todo::create($data))
            return redirect()->route('todos.index')->with('status', 'Todos was Createt');
        else
            return redirect()->back()->with('status', 'Sthing went rong while createt this iteam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with('todo', $todo);
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
        $todo = Todo::find($id);
        $request->validate([
            'title' => 'required',
        ]);

        $data['title'] = $request['title'];
        $data['com'] = ($request['com'] == 1)  ? 1 : 0;

        if ($todo->update($data))
            return redirect()->route('todos.index')->with('status', 'Todos was Updated');
        else
            return redirect()->back()->with('status', 'Something went rong while Updated this iteam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if ($todo->delete())
            return redirect()->route('todos.index')->with('status', 'Todos was Delete');
        else
            return redirect()->back()->with('status', 'Something went rong while Deleted this iteam');
    }


    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = Todo::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();

        return view('search', compact('todos'));
    }
}
