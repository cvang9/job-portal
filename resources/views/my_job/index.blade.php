<x-layout>
    <x-navigator :links="[ 'My Jobs' => '#' ]" class="mb-4" />
        @forelse ($jobs as $job)
        <x-job-card :job="$job" >
            <a class="border border-1 border-sky-300 text-sm py-1 px-2 text-sky-300" href="{{ route('jobs.show', ['job' => $job]) }}" > Look out </a>
        </x-job-card>
        @empty
        <div>
             <p> You had not registered jobs yet ! </p>
             <a class="mt-3 border-2 border-blue-500 text-blue-500" href="{{ route('my-jobs.create') }}">Create now</a>
        </div>
        @endforelse
</x-layout>