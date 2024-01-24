<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row">
                    <div class="flex flex-col">
                        <form method="post" action="/projects/store">
                            @csrf
                            <label for="name">Project name:</label>
                            <input type="text" id="name" name="name"><br><br>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description"></textarea><br><br>

                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
