<x-filament::widget>
    <x-filament::card>
        {{-- Widget content --}}

        @php
            $setting = \App\Models\Setting::where('key', 'usd_to_bdt')->first();
        @endphp

        <form action="{{ route('settings') }}" method="POST">
            @csrf
            <label for="">1 USD = </label>
            <input type="number" step="0.01" name="usd_to_bdt"
                   value="{{ @$setting->value }}"
                   class="max-w-xs h-9 pl-9 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500">
            <span style="margin-right: 1rem"> BDT</span>
            <button type="submit" class="filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
                Save</button>
        </form>

    </x-filament::card>
</x-filament::widget>
