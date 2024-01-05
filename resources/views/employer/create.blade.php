<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="post" >
            @csrf
            <label for="company_name"> Company Name: </label> <br/>
            <x-text-input type="text" name="company_name" id="company_name" placeholder="Company_name" value="" />

            <button type="submit" class="mt-3 w-full border-2 border-sky-500 px-1.5 py-1 text-sky-500 " > Register </button>
        </form>
    </x-card>
</x-layout>