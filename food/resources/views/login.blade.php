<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="flex items-center justify-between bg-gray-950 text-white py-3 px-4 fixed top-0 z-0 w-full">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Food Channel</h1>
    </div>
    <div class="flex items-center space-x-6">
        <a href="#" class="text-white hover:text-blue-800">Logout</a>
    </div>
</div>

<div class="bg-white p-8 rounded shadow-md w-96 mt-20">
    <h2 class="text-2xl font-semibold mb-6 text-black">Login</h2>
    <form action="" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-2 w-full border rounded-md">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="mt-1 p-2 w-full border rounded-md">
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Login</button>
    </form>
    <a href="{{ route('signup') }}" class="text-black">Not registerd yet?</a>
</div>
<script>

    toastr.options ={
        "closeButton": true,
    }
    @if(session('error'))
    toastr.error("<?=session('error');?>")
    @endif
    @if(session('success'))
    toastr.success("<?=session('success');?>")
    @endif
</script>

</body>
</html>
