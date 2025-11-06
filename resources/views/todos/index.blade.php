@extends('layouts.app')

@section('title', 'All Todos')

@section('content')
<div style="background-color: #f9f5ff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 6px rgba(0,0,0,0.08);">
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <div>
      <h2 style="margin:0; color:#6b21a8;">Your Todos</h2>
      <div style="font-size:13px; color:#6b7280;">Manage your tasks efficiently.</div>
    </div>
    <div style="font-size:14px; color:#6b7280;">
      Total: {{ method_exists($todos, 'total') ? $todos->total() : $todos->count() }}
    </div>
  </div>

  @if($todos->count())
    @foreach($todos as $todo)
      <div style="display:flex; justify-content:space-between; align-items:center; background-color:#ede9fe; border-radius:10px; padding:14px 18px; margin-bottom:10px;">
        <div>
          <div style="font-weight:600; color:#5b21b6;">{{ $todo->title }}</div>
          <div style="font-size:13px; color:#6b7280;">
            {{ $todo->description ? Str::limit($todo->description, 80) : 'No description' }}
          </div>
          <div style="font-size:13px; color:#6b7280;">
            Due: {{ $todo->due_date ? $todo->due_date->format('M d, Y') : '—' }}
          </div>
        </div>
        <div style="font-size:13px; color:#6b7280;">
  Progress: <strong style="color:#7e22ce;">{{ $todo->progress }}</strong>
</div>
        <div style="display:flex; gap:8px; align-items:center;">
          <span style="
            background-color: {{ $todo->is_completed ? '#c4b5fd' : '#ddd6fe' }};
            color: {{ $todo->is_completed ? '#4c1d95' : '#6b21a8' }};
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 12px;
          ">
            {{ $todo->is_completed ? 'Done' : 'Pending' }}
          </span>

          <a href="{{ route('todos.show', $todo) }}" style="font-size:13px; text-decoration:none; color:#7e22ce;">View</a>
          <a href="{{ route('todos.edit', $todo) }}" style="font-size:13px; text-decoration:none; color:#7e22ce;">Edit</a>

          <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Delete this todo?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="
              font-size:13px; 
              color:white; 
              background-color:#a855f7; 
              border:none; 
              border-radius:6px; 
              padding:4px 10px; 
              cursor:pointer;
            ">Delete</button>
          </form>
        </div>
      </div>
    @endforeach

    @if(method_exists($todos, 'links'))
      <div style="margin-top:20px;">
        {{ $todos->links() }}
      </div>
    @endif
  @else
    <div style="font-size:14px; color:#6b7280;">
      No todos yet. <a href="{{ route('todos.create') }}" style="color:#7e22ce;">Create one</a>.
    </div>
  @endif
</div>
@endsection
