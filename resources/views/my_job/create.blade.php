<x-layout>
    <x-navigator :links="[ 'My Jobs' => '/my-jobs', 'Create' => '#' ]" class="mb-4" />
    <x-card>
        <div>
            <form action="{{ route('my-jobs.store') }}" method="post" >
                @csrf
                <label for="title" class="text-xl" > Job Title </label>
                <x-text-input type="text" class="mb-4" name="title" placeholder="Enter job title..." value="" />
                @error('title')
                <p class="text-sm text-red-500" > {{ $message }} </p>
                @enderror
                
                <label for="location" class="text-xl" > Job Location </label>
                <x-text-input type="text" class="mb-4" id="location" name="location" placeholder="Enter job location..." value=""/>
                @error('location')
                <p class="text-sm text-red-500" > {{ $message }} </p>
                @enderror
                
                <label for="salary" class="text-xl" > Salary Amount </label>
                <x-text-input type="number" class="mb-4" id="salary" name="salary" placeholder="Enter job salary..." value=""/>
                @error('salary')
                <p class="text-sm text-red-500" > {{ $message }} </p>
                @enderror
                
                <label for="description" class="text-xl" > Description </label>
                <x-text-input type="text" class="mb-4" id="description" name="description" placeholder="Enter job description..." value=""/>
                @error('description')
                <p class="text-sm text-red-500" > {{ $message }} </p>
                @enderror
                
                <div class="flex justify-around align-items">
                    <div>
                        <label for="category" class="text-2xl mb-1 " > Category </label>
                        <x-radio-input  :flag="false" name="category" :options="\App\Models\Job::$category" />
                        @error('category')
                        <p class="text-sm text-red-500" > {{ $message }} </p>
                        @enderror
                    </div>
                    <div>
                        <label for="experience" class="text-2xl mb-1 " > Experience </label>
                        <x-radio-input :flag="false"  name="experience" :options="\App\Models\Job::$exp" />
                        @error('experience')
                        <p class="text-sm text-red-500" > {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                
                <button class="w-full border-2 border-sky-500 text-sky-500 py-1" > Submit </button>
            </form>
        </div>
    </x-card>
</x-layout>