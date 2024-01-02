<x-layout>
<div class="mt-4 mb-4">

    <x-navigator :links="[ 'Jobs' => '/jobs']" class="mb-4" />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="get" >
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="search" class="text-xl" > Search </label>
                    <x-text-input name="search" placeholder="Search for any text" value="{{ request('search') }}" type="text" />
                </div>
                
                <div>
                    <label for="search" class="text-xl" > Salary Range </label>
                    <div class="flex space-x-4">
                        
                        <x-text-input name="min_salary" placeholder="From" value="{{ request('min_salary') }}" type="number" />
                        <x-text-input name="max_salary" placeholder="To" value="{{ request('max_salary') }}" type="number" />
                        
                    </div>
                </div>

                <div>
                    <div for="experience" class="text-xl mb-2" > Experience </div>
                    <x-radio-input name="experience" :options="\App\Models\Job::$exp" />
                </div>

                <div>
                    <div for="category" class="text-xl mb-2" > Experience </div>
                    <x-radio-input name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <button class="btn w-full border-2 border-lime-400 text-lime-400 py-1" > Filter </button>
        </form>

    </x-card>
    
    @foreach ($jobs as $job)
    <x-job-card :job="$job" >
        <a class="border border-1 border-sky-300 text-sm py-1 px-2 text-sky-300" href="{{ route('jobs.show', ['job' => $job]) }}" > Look out </a>
    </x-job-card>
    @endforeach
     
    @if($jobs->count() > 0 && !( request('min_salary') || request('max_salary')) )
      <div>
          {{ $jobs->links() }}
      </div>
    @endif

</div>
</x-layout>