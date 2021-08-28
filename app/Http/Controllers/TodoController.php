<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from todos');
        return view('index',['items' => $items]);
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }


    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
       $param =[
           'content' => $request->content,
       ];
       DB::insert('insert into todos(content) values (:content)', $param);
       return redirect('/');
    }

    public function edit(Request $request)
    {
        $form = Todo::find($request->id);
        return view('edit', ['form' => $form]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from todos where id = :id', $param);
        return view('delete', ['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from todos where id=:id', $param);
        return redirect('/');
    }
}
