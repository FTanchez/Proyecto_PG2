<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div>
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                            Ticket #{{$vulnerabilities->ticket->id}}
                            <br>
                            @if($vulnerabilities->ticket->ticket_type_id == 1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Vulnerabilidad
                                        </span>
                                    @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800">
                                            Línea base
                                        </span>
                                    @endif
                            <h5>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400 mt-4">
                                    Plugin: {{$vulnerabilities->ticket->idp}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Analista: {{$vulnerabilities->ticket->user_email}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Fecha: {{$vulnerabilities->ticket->created_at}}
                                </p>
                    </div>

                    <div class="flow-root">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white py-6">
                            Historial de ticket
                        </h5>
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @if($learn !== null)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="font-bold text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Este ticket se solucionó el {{$learn->created_at}}, a través de:
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{$learn->solution}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Solucionado
                                        </span>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @foreach($vulnerabilities->log as $log)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="font-bold text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{$log->user_name}}
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{$log->user_email}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{$log->ticket_log_created}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800">
                                            {{$log->ticket_log_state}}
                                        </span>

                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>