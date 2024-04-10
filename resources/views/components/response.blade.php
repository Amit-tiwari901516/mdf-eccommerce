{{-- Response Success --}}
<div class="my-3">
    @if (session('success'))
        <div style="background: #088F8F; margin: 5px; padding: 5px 10px; color:white;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('storage'))
        <script>
            localStorage.clear();
        </script>
    @endif

    {{-- Response Error --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div style="background: #FF5733; padding: 5px 10px; color:white;">{{ $error }}</div>
        @endforeach
    @endif

</div>
{{-- ajax response --}}
<div id="ajax-error"></div>
