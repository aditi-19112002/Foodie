@extends('admin.adminbase')

@section('content')
    <div class="flex-1 bg-gray-700 p-4">
        <div class="w-full flex justify-between items-center mb-4">
            <h2 class="text-white font-semibold text-2xl">Manage Products</h2>
        </div>

        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Image</th>
                    <th class="px-6 py-3 text-left">Category</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Is Veg</th>
                    <th class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('storage/students/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32"></td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->isveg }}</td>
                        <td class="action-buttons">
                        <form action="{{ route('admin.delete-product', ['id' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                          @method('DELETE')
                         <button type="submit" class="p-2 bg-red-500 text-white rounded">X</button>
                         </form>

              <a href="" class="p-2 bg-yellow-500 text-white rounded">Edit</a>
             <a href="" class="p-2 bg-green-500 text-white rounded">View</a>
             </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px; /* Added margin-top for spacing */
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .action-buttons a {
        display: inline-block;
        margin: 2px;
        padding: 8px;
        text-decoration: none;
        color: white;
        border-radius: 4px;
    }

    .action-buttons a.bg-red-500 { background-color: #ff0000; }
    .action-buttons a.bg-yellow-500 { background-color: #ffd700; }
    .action-buttons a.bg-green-500 { background-color: #00ff00; }
</style>
