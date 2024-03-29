<x-layout>
    <x-navigator class="mb-4" :links="[ 'jobs' => route('jobs.index'), $job->title => route('jobs.show', [ 'job' => $job]), 'Apply' => '#' ]" />
    <x-job-card :job="$job" />

    <x-card>
        <h2 class="text-3xl mb-4 text-center"> Your Job Application </h2>
        <div class="form">
            <form action="{{ route('jobs.application.store', ['job' => $job ]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <x-text-input type="number" name="expected_salary" placeholder="Your Expected Salary" value="" />
                @error('expected_salary')
                   <p class="text-sm text-red-500"> {{ $message }} </p>
                @enderror
                <div class="mt-4">
                    <label for="cv" > Upload your resume:  </label>
                    <input type="file" name="cv" />
                    @error('cv')
                   <p class="text-sm text-red-500"> {{ $message }} </p>
                @enderror
                </div>
                <button style="margin-left: 48%" type="submit" class="mt-4 border border-blue-500 py-1 px-4 text-blue-500 "> Apply </button>
            </form>
        </div>
    </x-card>
</x-layout>