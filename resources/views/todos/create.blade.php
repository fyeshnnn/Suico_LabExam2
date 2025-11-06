@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')
<div class="card">
  <h3 style="color:#7e22ce; margin-top:0;">Create Task</h3>
  <div class="small muted" style="margin-bottom:12px;">Add a new task</div>

  @if($errors->any())
    <div style="background:#fce7f3;padding:10px 14px;border-radius:8px;margin-bottom:14px;color:#9d174d;">
      <ul style="margin:0;padding-left:18px;">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('todos.store') }}" method="POST" style="display:flex; flex-direction:column; gap:14px;">
    @csrf

    {{-- Title --}}
    <div>
      <label for="title" style="font-weight:600; color:#5b21b6;">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter todo title" 
        style="width:100%;padding:10px;border:1px solid #d6bcfa;border-radius:8px;background:#faf5ff;">
    </div>

    {{-- Description --}}
    <div>
      <label for="description" style="font-weight:600; color:#5b21b6;">Description</label>
      <textarea name="description" id="description" rows="3" placeholder="Add some details (optional)" 
        style="width:100%;padding:10px;border:1px solid #d6bcfa;border-radius:8px;background:#faf5ff;">{{ old('description') }}</textarea>
    </div>

    {{-- Due Date --}}
    <div>
      <label for="due_date" style="font-weight:600; color:#5b21b6;">Due Date</label>
      <input type="date" name="due_date" id="due_date" 
        value="{{ old('due_date') }}" 
        style="width:100%;padding:10px;border:1px solid #d6bcfa;border-radius:8px;background:#faf5ff;"
        pattern="\d{4}-\d{2}-\d{2}"
        onfocus="this.showPicker()">
    </div>

    {{-- Progress --}}
    <div>
      <label for="progress" style="font-weight:600; color:#5b21b6;">Progress Status</label>
      <select name="progress" id="progress"
        style="width:100%;padding:10px;border:1px solid #d6bcfa;border-radius:8px;background:#faf5ff;">
        <option value="Low" {{ old('progress') == 'Low' ? 'selected' : '' }}>Low</option>
        <option value="Moderate" {{ old('progress') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
        <option value="High" {{ old('progress') == 'High' ? 'selected' : '' }}>High</option>
      </select>
    </div>

    {{-- Buttons --}}
    <div style="display:flex; gap:10px; margin-top:10px;">
      <button type="submit" 
        style="background:linear-gradient(135deg,#9b7fe1,#7f63d8);
               color:#fff;
               border:none;
               padding:10px 18px;
               border-radius:8px;
               cursor:pointer;
               font-weight:600;
               transition:background 0.3s ease;">
        Create
      </button>

      <a href="{{ route('todos.index') }}" 
        style="background:#e9d8fd;
               color:#5b21b6;
               padding:10px 18px;
               border-radius:8px;
               text-decoration:none;
               font-weight:600;
               transition:background 0.3s ease;">
        Cancel
      </a>
    </div>
  </form>
</div>
@endsection
