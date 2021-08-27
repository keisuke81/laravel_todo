@extends('layouts.default')

<body>
  @section('content')
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
        <div class="todo">
          <form action="/todo/create" method="post" class="flex between mb-30">
            @csrf
            <input type="text" class="input-add" name="content">
            <input class="button-add" type="submit" value="追加">
          </form>
          <table>
            <tbody>
              <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
              </tr>
              
              @foreach ($items as $item)

              @csrf
              <tr>
                <td>
                  {{$item->created_at}}
                </td>
                <td>
                  <input type="text" class="input-update" value="" name="content">
                </td>
                <td>
                  <button class="button-update">更新</button>
                </td>
                <td>
                  <button class="button-delete">削除</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
  @endsection


</body>
