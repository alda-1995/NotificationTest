@props(['dateCreated' => '', 'nameUser' => '', 'typeMessage' => '', 'messageText' => '' ])
<li>
    <div class="flex-start flex items-center pt-1">
        <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300">
        </div>
        <p class="small text-gray-800">
            Fecha: <span class="text-neutral-500">{{ \Carbon\Carbon::parse()->format('d/m/Y H:i:s') }}</span>
        </p>
    </div>
    <div class="mb-6 ml-4 mt-2">
        <h4 class="mb-2 parrafo">Mensaje para: <span class="font-semibold text-blue-800">{{ $nameUser }}</h4>
        <p class="mb-2 text-gray-500 parrafo">Tipo de notificatión: <span class="uppercase font-bold text-blue-500">{{ $typeMessage }}</span></p>
        <p class="text-neutral-800 parrafo font-medium">{{ $messageText }}</p>
    </div>
</li>