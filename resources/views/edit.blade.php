@extends('layouts.default')

<body>
  @section('content')
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
        <div class="todo">

          <form action="/todo/update" method="post" class="flex between mb-30"> 
            <input type="text" class="input-add" name="content">
            <input class="button-add" type="submit" value="追加">
          </form>

          @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
            <li>
              {{$error}}
            </li>
            @endforeach
          </ul>
          @endif

          <table>
            <tbody>
              <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
              </tr>
 
              @csrf
              <tr>
                <td>
                  {{$form->created_at}}
                </td>
                <td>
                 <input type="text" class="input-update" value="{{$form->content}}" name="content">
                </td>
                <td>
                  <input type="submit" class="button-update">更新</button>
                </td>
                <td> 
                     <button class="button-delete">削除</button>
                </td>
              </tr> 
            </tbody>
          </table>
        </div>
    </div>
  </div>
  @endsection


</body>