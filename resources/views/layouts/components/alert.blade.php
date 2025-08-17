<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 4000)"
    class="fixed top-5 right-5 max-w-xs w-full border-l-4 rounded-lg shadow-lg p-4 mb-3 {{ $color }}"
    role="alert"
    x-transition
>
    <div class="flex items-start justify-between">
        <div class="flex items-center">
            <span class="mr-2 text-xl">{{ $icon }}</span>
            <div>
                <p class="font-bold capitalize">{{ $type }}</p>
                <p class="text-sm">{{ $message }}</p>
            </div>
        </div>
        <button @click="show = false" class="ml-3 font-bold text-lg">×</button>
    </div>
</div>
