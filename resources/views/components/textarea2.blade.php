<div class="form-group mb-1 {{ $class }}">
    <textarea
        id="{{ $id }}" 
        class="form-control" 
        cols="10"
        rows="{{ $row ?? 3 }}"
        name="{{ $name == '' ? $id:$name }}" 
        {{ $attributes }}
    >
    {{ $value }}
    </textarea>
    @error($id)
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
  </div>