<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
      $todos = Todo::with('category')->get();
      return response()->json($todos);
    }

    public function show($id)
    {

    }

    public function update(Request $r)
    {
      $item = Todo::find($r->get('id'))->update($r->all());
      return response()->json($item);
    }

    public function store(Request $r)
    {
      $todo = Todo::create($r->all());
      $todo->category = $todo->category;
      return response()->json($todo);
    }

    public function delete($id, Request $r)
    {
      $todo = Todo::find($r->get('id'));
      $todo->delete();
      return response()->json($r->get('id'));
    }
}
