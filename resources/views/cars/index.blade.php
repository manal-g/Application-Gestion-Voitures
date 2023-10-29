<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <div class="bg-blue-400 text-white p-2 mb-3 rounded ">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="text-right py-3">
                        <a class=" bg-green-600 hover:bg-green-700 text-white rounded p-1 text-sm" href="/cars/create">Create new car</a>
                    </div>

                    @if (count($cars))
                        <table class="w-full border-collapse	 border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600">VIN</th>
                                    <th class="border border-slate-600">Brand</th>
                                    <th class="border border-slate-600">Model</th>
                                    <th class="border border-slate-600">Color</th>
                                    <th class="border border-slate-600">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="border border-slate-700 p-2">{{ $car->vin }}</td>
                                        <td class="border border-slate-700 p-2">{{ $car->brand }}</td>
                                        <td class="border border-slate-700 p-2">{{ $car->model }}</td>
                                        <td class="border border-slate-700 p-2">{{ $car->color }}</td>
                                        <td class="border border-slate-700 p-2">
                                            <div class="flex space-x-1">
                                                <a class=" bg-blue-600 hover:bg-blue-700 text-white rounded p-1 text-sm" href="/cars/{{ $car->id }}/edit">Edit</a>

                                                <form action="/cars/{{ $car->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                        class=" bg-red-600 hover:bg-red-700 text-white rounded p-1 text-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No car in the database yet, feel free to <a href="/cars/create" class="text-blue-500 underline italic">create one</a></p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
