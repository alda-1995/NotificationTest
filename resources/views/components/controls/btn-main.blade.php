@props(['type' => 'button', 'id' => '', 'label' => ''])
<button id="{{$id}}" type="{{ $type }}"
    class="text-white bg-blue-700 hover:bg-blue-800 btn-font
    focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">
    {{ $label }}
</button>
