<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Luxe Interior — Premium Design Studio')</title>
    <meta name="description" content="@yield('description', 'Studio desain interior premium untuk hunian, komersial, dan hospitality di Indonesia.')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- Styles -->
   <script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    display: ['Cormorant Garamond', 'serif'],
                }
            }
        }
    }
</script>
    
    @stack('styles')
</head>
<body class="bg-stone-50 text-stone-800">
    @include('partials.navbar')
    
    <main>@yield('content')</main>
    
    @include('partials.footer')
    
    @stack('scripts')
</body>
</html>