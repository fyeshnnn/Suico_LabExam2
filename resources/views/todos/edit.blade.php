@extends('layouts.app')

@section('title', 'Edit Todo')

@section('content')
<div class="card">
  <h3>Edit Todo</h3>
  <div class="small muted" style="margin-bottom:8px">Edit task</div>

  {{-- Error message display --}}
  @if($errors->any())
    <div style="background:#fff4f8;padding:10px;border-radius:8px;margin-bottom:10px;color:#8a1f4a">
      <ul style="margin:0;padding-left:18px">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('todos.update', $todo) }}" method="POST" style="display:flex;flex-direction:column;gap:12px">
    @csrf
    @method('PUT')

    {{-- Title Field --}}
    <div>
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required
             class="form-control" style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;">
    </div>

    {{-- Description Field --}}
    <div>
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="3"
                class="form-control" style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;">{{ old('description', $todo->description) }}</textarea>
    </div>

    {{-- Due Date Field --}}
    <div>
      <label for="due_date" class="form-label">Due Date</label>
      <input type="date" name="due_date" id="due_date"
             value="{{ old('due_date', \Carbon\Carbon::parse($todo->due_date)->format('Y-m-d')) }}"
             class="form-control" style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;">
    </div>
{{-- Completion --}}
<div>
  <label style="font-weight:600; color:#5b21b6;">
    <input type="checkbox" name="is_completed" value="1" {{ $todo->is_completed ? 'checked' : '' }}>
    Mark as Done
  </label>
</div>

    {{-- Buttons --}}
    <div style="display:flex;gap:10px;margin-top:12px">
      <button type="submit"
        style="background-color:#b388ff;color:white;border:none;padding:10px 20px;
               border-radius:8px;cursor:pointer;transition:background 0.2s;">
        {{ $buttonText ?? 'Update' }}
      </button>

      <a href="{{ route('todos.index') }}"
         style="background-color:#ede7f6;color:#5e35b1;border:none;padding:10px 20px;
                border-radius:8px;text-decoration:none;transition:background 0.2s;">
        Cancel
      </a>
    </div>
  </form>
</div>
@endsection
