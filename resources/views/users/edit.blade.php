<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="bg-red-200 rounded p-5 flex flex-col">
                            @foreach ($errors->all() as $error)
                                <span class="text-sm">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif

                    <form action="/users/{{ $user->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="w-full space-2">

                            <div class="py-2">
                                <label class="capitalize" for="firstname">firstname</label>
                                <input class="w-full rounded py-2" type="text" name="firstname" value="{{ $user->firstname }}" id="firstname"
                                    placeholder="Please enter the firstname">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="lastname">lastname</label>
                                <input class="w-full rounded py-2" type="text" name="lastname" value="{{ $user->lastname }}" id="lastname"
                                    placeholder="Please enter the lastname">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="email">email</label>
                                <input class="w-full rounded py-2" type="email" name="email" value="{{ $user->email }}" id="email"
                                    placeholder="Please enter the email">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="city">city</label>
                                <input class="w-full rounded py-2" type="text" name="city" value="{{ $user->city }}" id="city"
                                    placeholder="Please enter the city">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="zip_code">zip code</label>
                                <input class="w-full rounded py-2" type="text" name="zip_code" value="{{ $user->zip_code }}" id="zip_code"
                                    placeholder="Please enter the zip code">
                            </div>

                            <div class="text-right pt-2">
                                <button class="bg-blue-200 hover:bg-blue-400 p-3 rounded ">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
