<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row w-full justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">{{ $project->name }}</h1>
                        <p>{{ $project->description }}</p>
                        <br>

                        @foreach ($hours as $hour)
                            <p>Hours: {{ $hour->hours }}</p>
                        @endforeach

                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold">Add Logs</h1>
                        <form method="post" class="flex flex-col" action="/projects/{{$project->id}}/logs">
                            @csrf
                            <textarea id="logs" name="logs"></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold">Add Hours</h1>
                        <form method="post" class="flex flex-col" action="/projects/{{$project->id}}/hours">
                            @csrf
                            <input type="number" placeholder="Hours" min="0" id="hours" name="hours">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="/projects/{{ $project->id }}/edit">
          <button class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mr-8">
               <h1 class="text-1xl">Edit Project</h1>
          </button>
        </a>
    </div><br>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl">Project Logs</h1>
    </div><br>
    @foreach ($logs as $log)
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mr-8 flex flex-row">
            <h1>{{ $log->description }}</h1>
            <a href="/projects/{{ $project->id }}/{{ $log->id }}/edit" class="ml-auto">
                <button class="p-2 bg-neutral-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mr-8">
                    <h1 class="text-1xl">Edit log</h1>
                </button>
            </a>
        </div><br>
    </div>
    @endforeach

</x-app-layout>
