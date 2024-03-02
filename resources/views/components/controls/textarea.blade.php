<div class="flex flex-col mb-4">
    @if (isset($label))
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif
    <textarea
        class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
        focus:border-blue-500 btn-font max-h-[110px] min-h-[110px]
        @error($name) error-input @enderror"
        id="{{ $id }}" name="{{ $name }}" wrap="hard" placeholder="{{ $placeholder }}"
        @if ($required) required @endif @if ($autofocus) autofocus @endif>{{ old($name, $value) }}</textarea>
    @error($name)
        <span class="block text-red-400 mt-4 small" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
