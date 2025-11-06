@extends('layouts.app')

@section('title','View Todo')

@section('content')
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:start">
    <div>
      <h2 style="margin:0">{{ $todo->title }}</h2>
      <div class="small muted">
        Due: {{ $todo->due_date ? $todo->due_date->format('M d, Y') : '—' }}
      </div>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:start">
  <div>
    <h2 style="margin:0">{{ $todo->title }}</h2>
    <div class="small muted">
      Due: {{ $todo->due_date ? $todo->due_date->format('M d, Y') : '—' }}
    </div>
  </div>

  {{-- ✅ Status badge goes right here --}}
  <span class="badge {{ $todo->is_completed ? 'done' : 'pending' }}">
    {{ $todo->is_completed ? '✅ Done' : '⏳ Pending' }}
  </span>
</div>
  
  <div style="margin-top:12px">
    <p class="small">{{ $todo->description ?? 'No description provided.' }}</p>
  </div>

  {{-- 🌈 Progress Status Section (place this here) --}}
  <div style="margin-top:8px;font-size:14px;">
    @php
      $colors = [
        'Low' => '#7e57c2',
        'Medium' => '#9575cd',
        'High' => '#5e35b1',
        'Bad Signal' => '#d32f2f',
        'Completed' => '#43a047',
      ];
    @endphp

    <span>Progress Status:
      <span style="color:{{ $colors[$todo->progress] ?? '#7e22ce' }};font-weight:600;">
        {{ $todo->progress }}
      </span>
    </span>
  </div>

  <div style="margin-top:14px">
    <a href="{{ route('todos.edit', $todo) }}" class="btn">Edit</a>
    <a href="{{ route('todos.index') }}" class="small muted" style="margin-left:12px">Back</a>
  </div>
</div>
@endsection
