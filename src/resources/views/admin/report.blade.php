@extends('layouts.app')

@section('content')
<div class="w-full">

    <div class="w-[50%] mx-auto">
    
        @foreach($projects as $project)
        @include('admin.card_project')
        @endforeach
    </div>
</div>
@endsection