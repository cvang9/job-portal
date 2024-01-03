<x-layout>
<div>
    <x-navigator :links="[ 'Jobs' => '/jobs', $job->title => '#' ]" class="mb-4" />
    <x-job-card :job="$job" >
        <div class="description mb-4">
            <p class=" text-sm text-slate-300"> {!! nl2br( e($job->description)) !!}</p>
        </div>
    </x-job-card>

    <h2 class="text-2xl mb-4 text-sky-400" > More {{ $job->employer->company_name }} Jobs </h2>
    
    @foreach ($job->employer->jobs as $otherJobs )
        <x-card class="mb-4">
            <div class="flex justify-between">
                <a href={{ route('jobs.show', [ 'job' => $otherJobs ]) }}>{{ $otherJobs->title }}</a>
                <div class="text-green-400"> ${{ $otherJobs->salary }} </div>
            </div>
            <div class="flex space-x-1 mt-4">
                <x-tag > {{ Str::ucfirst($otherJobs->experience) }} </x-tag>
                <x-tag class="experience text-red-600 border rounded-1 border-red-500 border-3 px-2 py-1 text-xs"> {{ Str::ucfirst($otherJobs->category) }} </x-tag>
            </div>
        </x-card>
    @endforeach

</div>
</x-layout>