@props(['name', 'placeholder' => 'Default...', 'type'=> 'text', 'value' => ""])

<div class="mb-4">
    <label class="block text-gray-700 " for="{{$name}}">{{$slot}}</label>
    <input
        id="{{$name}}"
        type="{{$type}}"
        name="{{$name}}"
        value="{{ old($name, $value) }}"

        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
        placeholder="{{$placeholder}}"
    />
    @error($name)
    <p class="text-red-500 text-sm my-1">{{$message}}</p>
    @enderror
</div>