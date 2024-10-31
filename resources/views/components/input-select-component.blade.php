@props(['name', 'options', 'value' => ''])

<div class="mb-4">
    <label class="block text-gray-700" for="{{$name}}"
        >{{$slot}}</label>
    <select
        id="{{$name}}"
        name="{{$name}}"
        value="{{ old($name, $value) }}"
        class="w-full px-4 py-2 border rounded focus:outline-none text-black  @error($name) border-red-500 @enderror">
        @forelse ($options as $option)
            <option value="{{ $option }}" {{ (old($name, $value) == $option) ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @empty
        @endforelse
    </select>
    @error($name)
    <p class="text-red-500 text-sm my-1">{{$message}}</p>
    @enderror
</div>