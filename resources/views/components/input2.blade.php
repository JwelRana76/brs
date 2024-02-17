<div class="form-group mb-3 {{ $class }}">
    <input 
        value="{{ $attributes['value'] ?? old($id) }}" 
        id="{{ $id }}" 
        class="form-control" 
        type="{{ $type }}"
        name="{{ $name == '' ? $id:$name }}" 
        {{ $attributes }}
    />
    @error($id)
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
  </div>