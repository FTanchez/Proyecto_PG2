<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <b>Asignación de ticket No. {{$ticket->id }}</b>
                        <br>
                        @if($ticket->ticket_type_id == 1)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Vulnerabilidad
                            </span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800">
                                Línea base
                            </span>
                        @endif
                    </div>

                    <form class="w-full mt-4" method="POST" action="{{ route('ticket-start') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$ticket->id}}">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Plugin
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->idp }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Nombre plugin
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->plugin_name }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                IP
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->ip }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Puerto
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->port }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                DNS
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->dns }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                SO
                            </label>
                            <input required disabled name="ticket_id" value="{{ $ticket->operating_system_name }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>
                        
                        <button class="bg-blue-500 w-full mt-4 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Iniciar Análisis
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
