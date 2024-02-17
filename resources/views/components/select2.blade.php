<div class="form-group mb-2">
    <select name="{{ $id }}" id="{{ $id }}" class="form-control" data-live-search="true" title="" {{ $attributes }}>
        <option ></option>
        @foreach ($options as $option)
            <option
                @php
                    $selected = $attributes['selectedId'] == (is_array($option) ? $option['id'] : $option->id);
                    
                    if(!is_array($option) && $option->is_default) {
                        $selected = true;
                    }
                @endphp
                {{ $selected ? 'selected' : '' }}
                value="{{ is_array($option) ? $option['id'] : $option->id }}">
            {{ is_array($option) ? $option['name'] : $option->name }}</option>
        @endforeach
    </select>
</div>

@error($id)
    <strong class="text-danger">{{ $message }}</strong>
@enderror
</div>
