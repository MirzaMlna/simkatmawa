@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm w-full text-sm sm:text-base px-3 py-2 transition-all duration-200']) }}>
