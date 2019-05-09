@if (session('success'))
    <div class="radius success callout">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="radius alert callout">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="radius warning callout">
        {{ session('warning') }}
    </div>
@endif
