@extends('layouts.app')

@section('content')
<script src="{{ asset('js/network_script.js') }}" defer></script>

<div class="flex flex-col pb-20 ">

  <div class="flex flex-col self-center mt-11 max-w-full w-[852px] max-md:mt-10">
    <div class="flex gap-0 items-end max-w-full text-xs text-center uppercase whitespace-nowrap w-[481px] max-md:flex-wrap">
      <div id="receivedBtn" class="justify-center items-center px-16 py-4 text-white bg-sky-800 rounded max-md:px-5 cursor-pointer">
        Received
      </div>
      <div id="sentBtn" class="justify-center items-center px-16 py-4 rounded bg-white border border-solid border-neutral-200 text-neutral-900 max-md:px-5 cursor-pointer">
        Sent
      </div>
    </div>

    <div id="receivedContent">
      @include('network.received_request')
    </div>

    <div id="sentContent" class="hidden">
      @include('network.sent_request')
    </div>



    <div id="recent_connections">

      <div class="flex gap-5 px-5 mt-11 text-xs text-center uppercase text-neutral-900 max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[310px]"></div>
        <div class="flex-auto italic">recent connections</div>
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[312px]"></div>
      </div>


      <div class="grid grid-cols-2 gap-6 mt-4">
        @foreach($acceptedRequests as $request)
        <div class="flex flex-col flex-1 grow shrink-0 pt-5 pr-4 pb-3 pl-8 bg-white rounded basis-0 w-full max-md:pl-5 max-md:max-w-full">
          <div class="flex gap-4 text-neutral-900">
            @if($request->sender_id == auth()->user()->id)

            @if($request->receiver->profile && $request->receiver->profile->profile_image)
            <img src="{{ asset('storage/profile/' . $request->receiver->profile->profile_image) }}" class="w-[50px] rounded-full" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="w-[50px]  rounded-full" />
            @endif
            <div class="flex flex-col grow shrink-0 my-auto basis-0 w-fit">

              <div class="text-sm italic">{{ $request->receiver->name }}</div>

              @if($request->receiver->profile && $request->receiver->profile->title)
              <div class="mt-2.5 text-xs leading-4">{{ $request->receiver->profile->title }}</div>
              @else
              <div class="mt-2.5 text-xs leading-4">Profile Title Not Set</div>
              @endif
            </div>



            @else
            @if($request->sender->profile && $request->sender->profile->profile_image)
            <img src="{{ asset('storage/profile/' . $request->sender->profile->profile_image) }}" class="w-[50px] rounded-full" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="w-[50px]  rounded-full" />
            @endif
            <div class="flex flex-col grow shrink-0 my-auto basis-0 w-fit">
              <div class="text-sm italic">{{ $request->sender->name }}</div>
              @if($request->sender->profile && $request->sender->profile->title)
              <div class="mt-2.5 text-xs leading-4">{{ $request->sender->profile->title }}</div>
              @else
              <div class="mt-2.5 text-xs leading-4">Profile Title Not Set</div>
              @endif
            </div>
            @endif
          </div>
          <div class="self-end text-xs leading-4 text-right text-neutral-900 text-opacity-30">
            {{ $request->updated_at->format('d M, l') }}
          </div>
        </div>
        @endforeach

      </div>

    </div>





    <div id="suggested_users" class="hidden">
      <div class="flex gap-5 px-5 mt-11 text-xs text-center uppercase text-neutral-900 max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[310px]"></div>
        <div class="flex-auto italic">New suggestions for you</div>
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[312px]"></div>
      </div>

      @include('network.suggested_users')
    </div>


  </div>
</div>
@endsection