@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm','style' => 'border-radius: 2px; height: 45px; padding-left:10px;']) !!}>
