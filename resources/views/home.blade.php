@extends('layouts.app')
@section('content')
    <div class="py-6 md:py-16">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-[50%] lg:w-[40%]">
                    <div class="bg-white rounded-lg p-6 md:p-8">
                        <h2 class="text-blue-800 mb-6 font-secondary">Notificar a suscriptores</h2>
                        <form method="POST" action="{{ route('send.notification.messages') }}" novalidate>
                            @csrf
                            <x-controls.select-input placeholder="Selecciona la categoría" name="categorie_name"
                                :list="$listCategories" />
                            <x-controls.textarea id="message" name="message" placeholder="Escribe el mensaje"
                                value="{{ old('message') }}" required autofocus />
                            <x-controls.btn-main label="Enviar" type="submit" />
                        </form>
                    </div>
                </div>
                <div class="md:w-[50%] lg:w-[60%] mt-4 md:mt-0 md:pl-[5%] lg:pl-[10%]">
                    <div class="bg-white rounded-lg p-6 md:p-8">
                        <h3 class="text-blue-800 mb-4 md:mb-6 font-base100">Historial de mensajes</h3>
                        @if (!$listMessagesNotification->isEmpty())
                            <div class="max-h-[500px] overflow-y-auto pl-2 pr-4">
                                <ol class="border-l border-neutral-300">
                                    @foreach ($listMessagesNotification as $messageNotification)
                                        <x-displays.card-timeline dateCreated="{{ $messageNotification->created_at }}"
                                            nameUser="{{ $messageNotification->name_user }}"
                                            typeMessage="{{ $messageNotification->name_channel }}"
                                            messageText="{{ $messageNotification->message }}" />
                                    @endforeach
                                </ol>
                            </div>
                        @else
                            <p class="parrafo text-blue-500">No hay historial de mensajes disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
