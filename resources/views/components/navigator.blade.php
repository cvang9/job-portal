<nav {{ $attributes }}>
    <ul class="flex space-x-2 text-white">
        <li> <a href="/"> Home </a> </li>

        @foreach ($links as $label => $link )
             
            <li> &#10132; </li>

            <li>  <a href="{{ $link }}" > {{ $label }} </a>
                 
        @endforeach
    </ul>
</nav>