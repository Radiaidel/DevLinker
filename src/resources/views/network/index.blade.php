@extends('layouts.app')

@section('content')

<div class="flex flex-col pb-20 ">

  <div class="flex flex-col self-center mt-11 max-w-full w-[852px] max-md:mt-10">
    <div class="flex gap-0 items-end max-w-full text-xs text-center uppercase whitespace-nowrap w-[481px] max-md:flex-wrap">
    <div id="receivedBtn" class="justify-center items-center px-16 py-4 text-white bg-sky-800 rounded max-md:px-5 cursor-pointer">
            Received
        </div>
        <!-- Bouton "Sent" -->
        <div id="sentBtn" class="justify-center items-center px-16 py-4  bg-white border border-solid border-neutral-200 text-neutral-900 max-md:px-5 cursor-pointer">
            Sent
        </div>
    </div>

    <div id="receivedContent" >
        @include('network.received_request')
    </div>

    <!-- Contenu des invitations envoyées (initialement caché) -->
    <div id="sentContent" class="hidden">
        @include('network.sent_request')
    </div>


    <script>
    // Fonction pour basculer entre les sections "Received" et "Sent"
    function toggleSection(section) {
        if (section === 'received') {
            document.getElementById('receivedBtn').classList.add('bg-sky-800', 'text-white','py-5');
            document.getElementById('receivedBtn').classList.remove('bg-white', 'text-neutral-900');
            document.getElementById('sentBtn').classList.remove('bg-sky-800', 'text-white','py-5');
            document.getElementById('sentBtn').classList.add('bg-white', 'text-neutral-900');
            document.getElementById('receivedContent').classList.remove('hidden');
            document.getElementById('sentContent').classList.add('hidden');
        } else if (section === 'sent') {
            document.getElementById('receivedBtn').classList.remove('bg-sky-800', 'text-white','py-5');
            document.getElementById('receivedBtn').classList.add('bg-white', 'text-neutral-900');
            document.getElementById('sentBtn').classList.add('bg-sky-800', 'text-white','py-5');
            document.getElementById('sentBtn').classList.remove('bg-white', 'text-neutral-900');
            document.getElementById('receivedContent').classList.add('hidden');
            document.getElementById('sentContent').classList.remove('hidden');
        }
    }

    // Écouteurs d'événements pour les boutons
    document.getElementById('receivedBtn').addEventListener('click', function () {
        toggleSection('received');
    });

    document.getElementById('sentBtn').addEventListener('click', function () {
        toggleSection('sent');
    });

    // Par défaut, afficher la section "Received"
    toggleSection('received');
</script>





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
          <!-- Si l'utilisateur est l'expéditeur -->
          <!-- Image de profil du destinataire -->
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
            <!-- Nom de l'utilisateur et titre du profil -->
            <div class="text-sm italic">{{ $request->sender->name }}</div>
            @if($request->sender->profile && $request->sender->profile->title)
            <div class="mt-2.5 text-xs leading-4">{{ $request->sender->profile->title }}</div>
            @else
            <div class="mt-2.5 text-xs leading-4">Profile Title Not Set</div>
            @endif
          </div>
          @endif
        </div>
        <!-- Date -->
        <div class="self-end text-xs leading-4 text-right text-neutral-900 text-opacity-30">
          {{ $request->updated_at->format('d M, l') }}
        </div>
      </div>
      @endforeach

    </div>


  </div>
</div>
@endsection