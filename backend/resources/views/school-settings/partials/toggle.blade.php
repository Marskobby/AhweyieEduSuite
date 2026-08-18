<div class="flex items-center justify-between border-b border-gray-100 pb-4">

    <div class="pr-6">
        <div class="font-medium text-gray-800">
            {{ $label }}
        </div>

        <div class="text-sm text-gray-500 mt-1">
            {{ $description }}
        </div>
    </div>

    <label class="relative inline-flex items-center cursor-pointer">

        <input
            type="checkbox"
            name="{{ $name }}"
            value="1"
            class="sr-only peer"
            @checked($checked)
        >

        <div class="w-11 h-6 bg-gray-300 rounded-full
                    peer peer-checked:bg-gray-900
                    peer-focus:ring-2 peer-focus:ring-gray-300
                    after:content-['']
                    after:absolute
                    after:top-[2px]
                    after:left-[2px]
                    after:bg-white
                    after:border-gray-300
                    after:border
                    after:rounded-full
                    after:h-5
                    after:w-5
                    after:transition-all
                    peer-checked:after:translate-x-full
                    peer-checked:after:border-white">
        </div>

    </label>

</div>