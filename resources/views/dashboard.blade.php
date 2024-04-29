<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php
                        $currentHour = date('H');
                        if ($currentHour >= 5 && $currentHour < 12) {
                            echo __("Selamat pagi!");
                        } elseif ($currentHour >= 12 && $currentHour < 18) {
                            echo __("Selamat siang!");
                        } elseif ($currentHour >= 18 || $currentHour < 5) {
                            echo __("Selamat malam!");
                        } else {
                            echo __("Selamat sore!");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
