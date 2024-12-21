<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="">
                        <div>
                            <label for="name" class="text-sm font-medium text-gray-600 dark:text-gray-400">Name</label>
                            <div class="mb-3">
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="shadow-sm border border-gray-300 white:border-gray-700 rounded-lg w-1/2 focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-100" 
                                    placeholder="Enter your name"
                                >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
