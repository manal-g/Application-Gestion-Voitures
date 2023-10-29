<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Edit') }}
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

                    <form action="/cars/{{ $car->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="w-full space-2">

                            <div class="py-2">
                                <label class="capitalize" for="vin">vin</label>
                                <input class="w-full rounded py-2" type="text" name="vin" value="{{ $car->vin }}" id="vin"
                                    placeholder="Please enter the vin">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="model">model</label>
                                <input class="w-full rounded py-2" type="text" name="model" value="{{ $car->model }}" id="model"
                                    placeholder="Please enter the model">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="brand">brand</label>
                                <input class="w-full rounded py-2" type="text" name="brand" value="{{ $car->brand }}" id="brand"
                                    placeholder="Please enter the brand">
                            </div>
                            <div class="py-2">
                                <label class="capitalize" for="color">color</label>
                                <input class="w-full rounded py-2" type="text" name="color" value="{{ $car->color }}" id="color"
                                    placeholder="Please enter the color">
                            </div>

                            <div class="py-2">
                                <label class="capitalize" for="owner">owner</label>
                                <!-- <input class="w-full rounded py-2" type="text" name="owner_id" id="owner" placeholder="Please enter the owner"> -->
                                <select class="w-full rounded py-2" name="owner_id" id="owner">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                                @endforeach
                                </select>
                                    
                            </div> 

                            <div class="text-right pt-2">
                                <button class="bg-blue-200 hover:bg-blue-400 p-3 rounded ">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
