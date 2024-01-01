<x-card class="mb-4" >
    <div>
        <div class="flex justify-between items-center">
            <h2 class="text-2xl mb-1 "> {{ $job->title }} </h2>
            <div class="text-green-400"> ${{ number_format($job->salary) }}</div>
        </div>
        
        <div class="flex justify-between mb-4 items-center " >
            <div class="flex space-x-4">
                <div class="company">Company Name</div>
                <div class="location"> {{ $job->location }}</div>
            </div>
            <div class="flex space-x-1">
                <x-tag > {{ Str::ucfirst($job->experience) }} </x-tag>
                <x-tag class="experience text-red-600 border rounded-1 border-red-500 border-3 px-2 py-1 text-xs"> {{ Str::ucfirst($job->category) }} </x-tag>
            </div>
        </div>

        <div>
            {{ $slot }}
        </div>

    </div>

</x-card>