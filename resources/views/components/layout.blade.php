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
        <div> Welcome home </div>
        <div class="flex align-items">
            @if( auth()->user() != null )
            <div>
                <p> Hello, {{ auth()->user()->name }} <p>
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

    <div> 
        <br/>
       {{ $slot  }}
    </div>

</body>

</html>