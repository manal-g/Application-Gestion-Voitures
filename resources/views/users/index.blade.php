<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Owners') }}
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
                        <a class=" bg-green-600 hover:bg-green-700 text-white rounded p-1 text-sm" href="/users/create">Create new user</a>
                    </div>

                    @if (count($users))
                        <table class="w-full border-collapse	 border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600">Id</th>
                                    <th class="border border-slate-600">Firstname</th>
                                    <th class="border border-slate-600">Lastname</th>
                                    <th class="border border-slate-600">Email</th>
                                    <th class="border border-slate-600">City</th>
                                    <th class="border border-slate-600">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border border-slate-700 p-2">{{ $user->id }}</td>
                                        <td class="border border-slate-700 p-2">{{ $user->firstname }}</td>
                                        <td class="border border-slate-700 p-2">{{ $user->lastname }}</td>
                                        <td class="border border-slate-700 p-2">{{ $user->email }}</td>
                                        <td class="border border-slate-700 p-2">{{ $user->city }}</td>
                                        <td class="border border-slate-700 p-2">
                                            <div class="flex space-x-1">
                                                <a class=" bg-blue-600 hover:bg-blue-700 text-white rounded p-1 text-sm" href="/users/{{ $user->id }}/edit">Edit</a>

                                                <form action="/users/{{ $user->id }}" method="POST">
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
                        <p>No user in the database yet, feel free to <a href="/users/create" class="text-blue-500 underline italic">create one</a></p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
