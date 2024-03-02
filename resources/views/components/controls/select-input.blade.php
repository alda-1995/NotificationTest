@props(['list' => [], 'id' => '', 'name' => '', 'placeholder' => '', 'default' => ''])
<div class="flex flex-col mb-4">
    <select id="{{ $id }}" name="{{ $name }}"
        class="btn-font bg-gray-50 border border-gray-300 @error($name) border-error @enderror
  text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option {{ $default == '' ? 'selected' : '' }} disabled>{{ $placeholder }}</option>
        @if (!empty($list))
            @foreach ($list as $item)
                <option {{ $default == $item['value'] ? 'selected' : '' }} value="{{ $item['value'] }}">
                    {{ $item['label'] }}
                </option>
            @endforeach
        @endif
    </select>
    @error($name)
        <span class="block text-red-400 mt-4 small" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
