<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="h-96 bg-cover bg-center"
    style="background-image: url('https://b.zmtcdn.com/web_assets/81f3ff974d82520780078ba1cfbd453a1583259680.png');">
    <div class="flex  text-white py-3 px-36 gap-4 items-center justify-between w-full">
       <div class="flex items-center space-x-6">
          <img
            src="https://www.foodfood.com/assets/images/logo/logo.png"
            class="w-16 h-16">
           </div>
          <div class="flex items-center gap-8">
          <a href="{{ route('insert') }}" class="text-white">Home</a>
    @auth
    <a href="" class="text-white hover:text-blue-800">{{ $user->name }}</a>
    <a href="{{ route('logout') }}" class="text-white hover:text-blue-800">Logout</a>
    <a href="{{ route('cart') }}" class="text-white hover:text-blue-800">Cart</a>
    @endauth
    @guest
    <a href="{{ route('signup') }}" class="text-white hover:text-blue-800">Reservation</a>
    <a href="{{ route('login') }}" class="text-white hover:text-blue-800">Login</a>
    @endguest
            
          </div>
    </div>
    <div class="flex items-center justify-center h-1/2 flex-col">
      <h2 class="text-4xl font-semibold mb-2 text-white">Welcome to Our Restaurant</h2>
        <p class="text-lg text-white">Experience the best dining in town</p>
      <div class="w-1/2 mx-auto mt-8">
        <form class="flex items-center">
          <input class="border rounded px-4 py-2 w-full" type="text" placeholder="Bariatu Housing colony,R" required>
        </form>
      </div>
    </div>
</div>
<h6 class="font-bold justify-between text-center text-3xl text-black mt-4">Special Menu</h6>
<div class="flex flex-wrap -mx-4 mt-5">
@foreach($foods as $item)
<div class="w-1/4 px-4 mb-4 ml-20">
    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col" style="height: 300px; object-fit: cover">
        <img src="{{ asset('storage/students/' . $item->image) }}" alt="{{ $item->name }}" class="w-32 h-32">
        <p class="text-lg font-semibold">Name-{{ $item->name }}</p>
        <p class="text-sm">Category-{{ $item->category }}</p>
        <p class="text-sm">Price-${{ $item->price }}</p>
        <p class="text-sm flex items-center">
            @if($item->isveg)
                <span title="Vegetarian" class="text-green-500 mr-1"><i class="bi bi-0-square-fill"></i></span>
            @else
                <span title="Non-Vegetarian" class="text-red-500 mr-1"><i class="bi bi-0-square-fill"></i></span>
            @endif
            {{ $item->isveg ? 'Vegetarian' : 'Non-Vegetarian' }}
        </p>
        <a href="{{route('addToCart',$item->id)}}" class="bg-blue-900 text-white rounded-md inline-block mt-2 mr-3 " size="5px"style="padding: 5px 10px;">Add to cart</a>

    </div>
</div>
    @endforeach
</div>
</body>
</html>
