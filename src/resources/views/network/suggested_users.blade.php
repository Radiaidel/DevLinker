<div class="flex flex-col  pt-7 pb-4 mt-5 w-full bg-white rounded">
            <div class="flex gap-5 px-5 uppercase">
                <div class="flex-auto text-xs text-neutral-900">Suggested for YOU</div>
                <div class="text-xs text-right text-sky-800">See all</div>
            </div>
            <div class="shrink-0 mt-4 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
            @foreach($suggestedUsers as $user)
            <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-3 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    @if($user->profile && $user->profile->profile_image)
                    <img src="{{ asset('storage/profile/' . $user->profile->profile_image) }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                    @else
                    <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                    @endif
                    <div class="my-auto text-sm">{{ $user->name }}</div>
                </div>
                <div class="my-auto text-xs text-right text-sky-800 uppercase">FOLLOW</div>
            </div>
            @endforeach
        </div>