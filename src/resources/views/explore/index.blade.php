@extends('layouts.app')

@section('content')
<div class="flex flex-col w-2/3 m-auto">
    <div class="grid grid-cols-3 gap-4">
        @include('feed.projects')
</div>
</div>

@endsection