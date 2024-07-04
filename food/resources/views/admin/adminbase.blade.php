<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        
</head>
<body>

<div class="flex items-center justify-between bg-gray-950 text-white py-3 px-4 fixed top-0 z-0 w-full">
    <div class="flex-items-center">
        <h1 class="text-2xl font-bold">Admin Panel</h1>
    </div>
    <div class="flex items-center space-x-6">
        <a href="" class="text-white hover:text-blue-800">Home</a>
        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-blue-800">Dashboard</a>
        <a href="{{ route('admin.manage-products') }}" class="text-white hover:text-blue-800">Manage Product</a>
        <a href="{{route('adminlogout')}}" class="text-white hover:text-blue-800">Logout</a>
    </div>
</div>

<div class="container mx-auto mt-16">
    @yield('content')
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
