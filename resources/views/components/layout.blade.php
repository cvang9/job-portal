<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Job Portal</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl bg-zinc-800">
    
    {{-- {{ auth()->user()->name ?? 'Guest' }} --}}
   <nav class="auth text-2xl text-white">
    <div class="flex justify-between">
        <div> Welcome home
             {{-- <a href="{{ route('my-job-applications.index') }}" class="text-sm ms-3 mt-3 me-1 p-1 border-2 border-blue-400 text-blue-400" > My Applications </a> --}}
        </div>
        <div class="flex align-items">
            @if( auth()->user() != null )
            <div>
                <p> Hello, {{ auth()->user()->name }} <p>
            </div>
            <div>
                <a href="{{ route('my-job-applications.index') }}" class="text-sm ms-3 mt-3 me-1 p-1 border-2 border-blue-400 text-blue-400" > My Applications </a>
                <a href="{{ route('my-jobs.index') }}" class="text-sm ms-3 mt-3 me-1 p-1 border-2 border-blue-400 text-blue-400" > My Jobs </a>
            </div>
            <div>
                <form action="{{ route('auth.destroy')}}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ms-3 border border-2  border-red-500 text-red-500  py-1 px-1 text-sm"> Log out </button>
                </form>
            <div>
            @else
            <div>
                <p> Hello Guest <p>
            </div>
            <div>
                <a href="{{ route('auth.create') }}" class="ms-3 border border-2 border-sky-500 text-sky-500 text-sm  py-1 px-1"> Log in </a>
            <div>
            @endif
        </div>
    </div>
</nav>

@if (session('success'))
    <div role="alert"
      class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
      <p class="font-bold">Success!</p>
      <p>{{ session('success') }}</p>
    </div>
  @endif
  @if (session('error'))
    <div role="alert"
      class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
      <p class="font-bold">Error!</p>
      <p>{{ session('error') }}</p>
    </div>
  @endif

    <div> 
        <br/>
       {{ $slot  }}
    </div>

</body>

</html>