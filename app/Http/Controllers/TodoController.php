<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from todos');
        return view('index',['items' => $items]);
    }

    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
       $param =[
           'content' => $request->content,
           'created_at' => $request->created_at,
           'updated_at' => $request->updated_at,
       ];
       DB::insert('insert into todos(content, created_at, updated_at) values (:content, :created_at, :updated_at)', $param);
       return redirect('/');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from todos where id = :id', $param);
        return view('edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::update('update todos set content=:content, created_at=:created_at, updated_at=:updated_at where id=:id', $param);
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
