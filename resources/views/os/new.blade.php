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
                        <b>Creación de sistema operativo</b>
                    </div>

                    <form class="w-full mt-4" method="POST" action="{{ route('os-store') }}">
                    @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Nombre
                            </label>
                            <input required name="fullName" value="{{ old('fullName') }}" class="appearance-none block w-full bg-gray-200 border border-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="">
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <button class="bg-blue-500 w-full mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                         Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>