<div class="flex flex-col items-center justify-between max-w-screen-xl gap-12 px-8 py-16 mx-auto lg:flex-row">
    <div class="flex justify-center w-full lg:w-1/3 lg:justify-start">
        <img src="{{ Storage::url($blockData['about_image']) }}"
             alt="{{ $blockData['about_title'] }}"
             class="w-auto max-w-[400px] h-auto" />
    </div>
    <div class="w-full text-left lg:w-2/3">
        <h3 class="mb-4 text-2xl font-semibold text-gray-900">
            {{ $blockData['about_title'] }}
        </h3>
        <p class="text-base leading-relaxed text-gray-500">
            {!! nl2br(e($blockData['about_description'])) !!}
        </p>
    </div>
</div>
