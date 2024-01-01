<x-layout>
<div>
    <x-navigator :links="[ 'Jobs' => '/jobs', $job->title => '#' ]" class="mb-4" />
    <x-job-card :job="$job" >
        <div class="description mb-4">
            <p class=" text-sm text-slate-300"> {!! nl2br( e($job->description)) !!}</p>
        </div>
    </x-job-card>
</div>
</x-layout>