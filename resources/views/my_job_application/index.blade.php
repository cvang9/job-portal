<x-layout>
    <x-navigator class="mb-3" :links="[ 'My Applications' => '#' ]" />
    
    @forelse ($applications as $application)
        <x-job-card :job="$application->job" >
            <div class="flex justify-between align-items">
                <div>
                    Expected Salary:  <div style="display: inline;" class="text-green-500" > ${{ number_format($application->expected_salary) }} </div> <br/>
                    Applied {{ $application->created_at->diffForHumans() }}
                    
                </div>
                <div  >
                    <form action="{{ route('my-job-applications.destroy', [ 'my_job_application' => $application ]) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button  class=" border-2 border-blue-500 text-blue-500 py-1 px-1.5" type="submit" > Cancel Application </button>
                    </form>
                </div>
            </div>
        </x-job-card>
        @empty
        <div class=" text-white mt-4  text-3xl text-center">
            You does'nt have applied any job yet.
        </div>
    @endforelse
</x-layout>