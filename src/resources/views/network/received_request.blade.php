    <div class="flex md:gap-5 gap-2 px-5 mt-11 text-xs text-center text-sky-800 uppercase max-md:flex-wrap max-md:mt-10">
      <div class="shrink-0 w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] md:w-[300px]"></div>
      <div class="flex-auto">
        you have
        <span class="text-sky-800">{{Auth::user()->receivedFriendrequests()->count()}} new connections</span>
      </div>
      <div class="md:block hidden shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[301px]"></div>
    </div>
    @foreach($receivedRequests as $request)
    <div class="flex gap-5 justify-between px-8 py-6 mt-7 w-full bg-white rounded max-md:flex-wrap max-md:px-5 max-md:max-w-full">
      <div class="flex gap-4 text-xs items-center text-neutral-900">
        @if($request->sender->profile && $request->sender->profile->profile_image)
        <img src="{{ asset('storage/profile/' . $request->sender->profile->profile_image) }}" class="w-[50px] rounded-full" />
        @else
        <img src="{{ asset('storage/profile/unknown.png') }}" class="w-[50px]  rounded-full" />
        @endif
        <div class="flex flex-col self-start mt-2">
          <div class="text-sm "><strong>{{ $request->sender->name }}</strong> </div>
          @if($request->sender->profile && $request->sender->profile->title)
          <div class="mt-2">{{ $request->sender->profile->title }}</div>
          @else
          <div class="mt-2">Profile Title Not Set</div>
          @endif


          <div class="mt-2.5 text-sky-800">0 connections</div>
        </div>
      </div>
      <div class="flex gap-4 my-auto text-xs text-center uppercase whitespace-nowrap">
        <form action="{{ route('friend-requests.accept') }}" method="POST">
          @csrf
          <input type="hidden" value="{{$request->id}}" name="friendRequest_id">
          <button type="submit" class="justify-center px-6 py-3 text-white bg-sky-800 rounded max-md:px-5">
            Accept
          </button>
        </form>

        <form action="{{ route('friend-requests.decline') }}" method="POST">
          @csrf
          <input type="hidden" value="{{$request->id}}" name="friendRequest_id">

          <button type="submit" class="justify-center px-6 py-3 rounded border border-solid border-neutral-500 text-zinc-700 max-md:px-5">
            Decline
          </button>
        </form>
      </div>

    </div>
    @endforeach