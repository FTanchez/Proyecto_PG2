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

                    
                    <!-- Fixed sidebar -->
                    <div>
                            <h1 class="p-4 text-white font-semibold text-xl">Fixed Sidebar</h1>

                            <form>
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <input type="hidden" name="id" value="{{$ticket->id}}">
                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Plugin
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->idp }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>

                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Nombre plugin
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->plugin_name }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>

                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            IP
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->ip }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>

                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Puerto
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->port }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            DNS
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->dns }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>
                                    <div class="px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            SO
                                        </label>
                                        <input required disabled name="ticket_id" value="{{ $ticket->operating_system_name }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- Scroll wrapper -->
                        <div class="flex-1 flex overflow-hidden">
                            <!-- Scrollable container -->
                            <div class="px-6 py-4 flex-1 overflow-y-scroll">
                                <!-- Your content -->
                                @if($count === 0)
                                <div class="grid place-items-center h-screen">
                                    <button onclick="toggleModal()" class="bg-blue-500 w-1/2 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Agregar nueva solución
                                    </button>
                                </div>
                                <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
                                    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity">
                                            <div class="absolute inset-0 bg-gray-900 opacity-75" />
                                        </div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <form class="" method="POST" action="{{ route('ticket-solution') }}">
                                                @csrf
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <label>Plugin</label>
                                                    <input type="hidden" name="id" value="{{$ticket->plugin_id}}" />
                                                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}" />
                                                    <input name="idp" value="{{$ticket->idp}}" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                    <label>Nombre</label>
                                                    <input value="{{$ticket->plugin_name}}" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                    <label>Tipo</label>
                                                    @if($ticket->ticket_type_id === 1)
                                                    <input value="Vulnerabilidad" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                    @else
                                                    <input value="Línea Base" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                    @endif
                                                    <label>Solución</label>
                                                    <textarea name="solution" class="w-full bg-gray-100 p-2 mt-2 mb-3">
                                                </textarea>
                                                <label>Rollback</label>
                                                    <textarea name="rollback" class="w-full bg-gray-100 p-2 mt-2 mb-3">
                                                </textarea>
                                                </div>
                                                <div class="bg-gray-200 px-4 py-3 text-right">
                                                    <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
                                                    <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i class="fas fa-plus"></i> Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <table class="w-full min-w-full divide-y divide-gray-200 mt-4">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Solución
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Rollback
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Creación
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" style="font-size:14px">
                                        @foreach ($data as $db)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex w-10">
                                                <input learn-attr="{{json_encode($db)}}" onchange="onChangeLearn(this)" id="default-checkbox" type="radio" name="radios" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <p>&nbsp; {{ $db->plugin_learn_id }}</p>
                                                </div>
                                                
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="truncate w-96">{{ $db->solution }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="truncate w-96">{{ $db->rollback }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $db->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="grid grid-flow-col gap-3">
                                    <div class="col-span-4">
                                        <button onclick="toggleModal2()" class="w-full bg-blue-500 mt-4 text-white font-bold py-2 px-4 rounded">
                                            Nueva solución
                                        </button>
                                        <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal2">
                                            <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 transition-opacity">
                                                    <div class="absolute inset-0 bg-gray-900 opacity-75" />
                                                </div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                                <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                    <form class="" method="POST" action="{{ route('ticket-solution') }}">
                                                        @csrf
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <label>Plugin</label>
                                                            <input type="hidden" name="id" value="{{$ticket->plugin_id}}" />
                                                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}" />
                                                            <input name="idp" value="{{$ticket->idp}}" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                            <label>Nombre</label>
                                                            <input value="{{$ticket->plugin_name}}" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                            <label>Tipo</label>
                                                            @if($ticket->ticket_type_id === 1)
                                                            <input value="Vulnerabilidad" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                            @else
                                                            <input value="Línea Base" disabled type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                                                            @endif
                                                            <label>Solución</label>
                                                                <textarea name="solution" class="w-full bg-gray-100 p-2 mt-2 mb-3">
                                                            </textarea>
                                                <label>Rollback</label>
                                                    <textarea name="rollback" rows="4" class="w-full bg-gray-100 p-2 mt-2 mb-3">
                                                </textarea>
                                                        </div>
                                                        <div class="bg-gray-200 px-4 py-3 text-right">
                                                            <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal2()"><i class="fas fa-times"></i> Cancel</button>
                                                            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i class="fas fa-plus"></i> Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-4">
                                        <button ticket-id="{{$ticket->id}}" onclick="makeSol()" id="make-solution" class="w-full  bg-gray-500 mt-4 text-white font-bold py-2 px-4 rounded" disabled>
                                            <span id="make-label">Nada seleccionado ...</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>