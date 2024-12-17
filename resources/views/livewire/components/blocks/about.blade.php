<div class="flex flex-col-reverse items-center justify-center max-w-screen-xl gap-12 px-6 py-12 mx-auto lg:flex-row">
    <div class="flex justify-center w-full lg:w-1/3 lg:justify-start">
        <img src="{{ Storage::url($blockData['about_image']) }}"
             alt="{{ $blockData['about_title'] }}"
             class="w-full max-w-sm lg:max-w-[300px] h-auto" />
    </div>
    <div class="w-full lg:w-2/3">
        <h3 class="mb-6 text-2xl font-bold text-gray-900 lg:text-4xl">
            {{ $blockData['about_title'] }}
        </h3>
        <p class="text-base leading-relaxed text-gray-600 lg:text-lg">
            {{ $blockData['about_description'] }}
        </p>
    </div>
</div>
