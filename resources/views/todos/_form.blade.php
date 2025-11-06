@csrf

{{-- Title --}}
<div>
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" id="title"
         value="{{ old('title', $todo->title ?? '') }}"
         required
         style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;width:100%;">
</div>

{{-- Description --}}
<div>
  <label for="description" class="form-label">Description</label>
  <textarea name="description" id="description" rows="3"
            style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;width:100%;">{{ old('description', $todo->description ?? '') }}</textarea>
</div>

{{-- Due Date --}}
<div>
  <label for="due_date" class="form-label">Due Date</label>
  <input type="date" name="due_date" id="due_date"
         value="{{ old('due_date', isset($todo->due_date) ? \Carbon\Carbon::parse($todo->due_date)->format('Y-m-d') : '') }}"
         style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;width:100%;">
  <small style="color:#7e57c2;">Format: mm/dd/yyyy</small>
</div>

{{-- Progress Dropdown --}}
<div>
  <label for="progress" class="form-label">Progress</label>
  <select name="progress" id="progress"
          style="border:1px solid #d1c4e9;border-radius:8px;padding:8px;width:100%;">
    @php
      $progressOptions = ['Low', 'Medium', 'High', 'Bad Signal', 'Completed'];
    @endphp

    @foreach($progressOptions as $option)
      <option value="{{ $option }}" {{ old('progress', $todo->progress ?? 'Low') === $option ? 'selected' : '' }}>
        {{ $option }}
      </option>
    @endforeach
  </select>
</div>

{{-- Buttons --}}
<div style="display:flex;gap:10px;margin-top:12px">
  <button type="submit"
    style="background-color:#b388ff;color:white;border:none;padding:10px 20px;
           border-radius:8px;cursor:pointer;transition:background 0.2s;">
    {{ $buttonText ?? 'Save' }}
  </button>

  <a href="{{ route('todos.index') }}"
     style="background-color:#ede7f6;color:#5e35b1;border:none;padding:10px 20px;
            border-radius:8px;text-decoration:none;transition:background 0.2s;">
    Cancel
  </a>
</div>
