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
                        <b>Carga de vulnerabilidades</b>
                    </div>

                    <form enctype="multipart/form-data" class="w-full mt-4" method="POST" action="{{ route('store-import') }}">
                    @csrf
                    <input type="hidden" name="ticketTypeId" value="{{$ticketTypeId}}">
                        <div class="bg-white px-2">
                            <div >
                                <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                                    <div class="w-full p-3">
                                        <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-gray-700 bg-gray-100 flex justify-center items-center">
                                            <div class="absolute">
                                                <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-gray-700"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> </div>
                                            </div> <input name="file" type="file" id="import" class="h-full w-full opacity-0" name="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto">
                                                    <table class="min-w-full" style="font-size:12px" id="import-table">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="bg-green-600 w-full mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Importar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>