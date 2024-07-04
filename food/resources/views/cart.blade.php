<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body class="font-sans bg-gray-100">

    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold">Foodie</h1>
            <div class="flex items-center space-x-6">
                <a href="#" class="hover:text-blue-800">Home</a>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-800">Dashboard</a>
                <a href="{{ route('admin.manage-products') }}" class="hover:text-blue-800">Manage Product</a>
                <a href="{{ route('adminlogout') }}" class="hover:text-blue-800">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Cart Items -->
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl font-semibold mb-4">MyCart</h1>
                @php
                    $total_price = $total_discount_price = 0;
                @endphp

                @forelse ($order->orderItem as $item)
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/students/' . $item->Food->image) }}" alt=""
                                class="w-20 h-20 object-cover rounded-lg">

                            <div>
                                <h1 class="text-xl font-semibold">{{ $item->Food->name }}</h1>
                                <p class="text-gray-500">Price: ${{ $item->Food->price * $item->qty }}</p>
                                <div class="flex items-center space-x-2 mt-2">
                                    <a href="{{ route('removeFromCart', $item->Food->id) }}"
                                        class="text-red-700 hover:underline">Remove</a>
                                    <span class="text-black">{{ $item->qty }}</span>
                                    <a href="{{ route('addToCart', $item->Food->id) }}"
                                        class="text-green-700 hover:underline">Add</a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="text-white bg-red-500 px-4 py-2 rounded"><i
                                class="bi bi-trash-fill"></i> Delete</a>
                    </div>
                    @php
                        $total_price += ($item->Food->price * $item->qty);
                        $total_discount_price += ($item->Food->discount_price * $item->qty);
                    @endphp
                @empty
                    <p>No items in the cart</p>
                @endforelse
            </div>

            <!-- Price Break Section -->
            <div class="md:ml-4">
                <h1 class="text-3xl font-semibold mb-2">Price Break</h1>
                <ul class="space-y-2">
                    <li class="flex justify-between items-center bg-white text-black p-2 rounded gap-5">
                        <span class="font-semibold">Total Amount</span>
                        <span class="font-semibold"> ${{ $total_price }}</span>
                        <span class="font-semibold">Discount</span>
                        <span class="font-semibold"> ${{ $total_price - $total_discount_price }}</span>
                        <span class="font-semibold">Tax(GST 18%)</span>
                        <span class="font-semibold"> ${{ $total_discount_price * 0.18 }}</span>
                    </li>
                </ul>

                <!-- Checkout Buttons -->
                <div class="flex justify-between items-center mt-6">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Go back</a>
                    <a href="#" class="bg-black text-white px-4 py-2 rounded">Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Toastr Script -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4"></script>
    <script>
        toastr.options = {
            "closeButton": true,
        }

        @if(session('error'))
            toastr.error("<?= session('error'); ?>")
        @endif
        @if(session('success'))
            toastr.success("<?= session('success'); ?>")
        @endif
    </script>
</body>

</html>
