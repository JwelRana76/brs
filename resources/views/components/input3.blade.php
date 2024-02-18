<div class="form-group mb-3 {{ $class }}">
    @if ($type != 'hidden')
    <label for="{{ $id }}">{{ ucwords(str_replace('_', ' ', $label == null ? $id:$label)) }}
        <strong> {{$attributes['required'] ? '*' : ''}}
        </strong>
    </label>
    @endif
    <input 
        value="{{ $attributes['value'] ?? old($id) }}" 
        id="{{ $id }}" 
        class="form-control" 
        type="{{ $type }}"
        name="{{ $id }}" 
        {{ $attributes }}
        placeholder="{{ $label }} লিখুন"
    />
    @error($id)
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
  </div>