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
    <div class="flex text-white py-3 px-36 gap-4 items-center justify-between w-full">
        <div class="flex items-center space-x-6">
            <img src="https://www.foodfood.com/assets/images/logo/logo.png" class="w-16 h-16">
        </div>

        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-white">Home</a>
            <a href="{{ route('insert') }}" class="text-white">Menu</a>
            <a href="#" class="text-white">Reservation</a>
            <a href="#" class="text-white">Contact</a>
        </div>
    </div>

    <div class="flex items-center justify-center h-1/2 flex-col">
        <h2 class="text-4xl font-semibold mb-2 text-white">Welcome to Our Restaurant</h2>
        <p class="text-lg text-white">Experience the best dining in town</p>
        <div class="w-1/2 mx-auto mt-8">
            <form class="flex items-center">
                <input class="border rounded px-4 py-2 w-full" type="text" placeholder="Bariatu Housing colony, R" required>
            </form>
        </div>
    </div>
</div>

<div class="flex-1 bg-slate-700 p-16">
    <div class="flex space-x-6">
        <div class="w-1/2 bg-white text-black shadow-md p-4 mb-8">
            <div class="w-64 mt-4">
                <a href="" class="block px-4 py-2 bg-red-500 text-white rounded mb-2">Insert food detail</a>
            </div>
            <div class="card-body">
                <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block text-black">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control w-full px-3 py-2 border rounded-lg">
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="block text-black">Price</label>
                        <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control w-full px-3 py-2 border rounded-lg">
                        @error('price')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="block text-black">Dish Image:</label>
                        <input type="file" id="image" name="image" value="{{ old('image') }}" class="form-control">
                        @error('image')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="block text-black">Category</label>
                        <input type="text" id="category" name="category" value="{{ old('category') }}" class="form-control">
                        @error('category')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                   <label for="isveg" class="block text-black">IsVeg</label>
                       <select id="isveg" name="isveg" class="form-control">
                       <option value="">Select Option</option>
                        <option value="1">Yes, it's Vegetarian</option>
                         <option value="0">No, it's Non-Vegetarian</option>
                </select>
                
                       @error('isveg')
                      <div class="text-red-500">{{ $message }}</div>
                            @enderror
                 </div>

                 
                    <div class="mb-3">
                        <input type="submit" name="create_menu" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600" value="Insert food">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
