@extends('admin.adminbase')

@section('content')
    <div class="flex-1">

        <div class="flex space-x-4 mt-6 ml-6">
            <div class="w-1/4 bg-blue-300 p-10 text-white text-2xl">
                <h2>Total Food</h2>
                <p class="text-4xl font-bold">{{ $totalFood }}</p>
            </div>

            <div class="w-1/4 bg-green-300 p-10 text-white text-2xl">
                <h2>Total Vegetarian</h2>
                <p class="text-4xl font-bold">{{ $totalVeg }}</p>
            </div>
            <div class="w-1/4 bg-yellow-400 p-10 text-white text-2xl">
                <h2>Total Orders</h2>
                <p class="text-4xl font-bold">10</p>
            </div>
        </div>

    </div>
@endsection
