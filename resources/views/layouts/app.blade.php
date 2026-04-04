<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nexolio IT' }}</title>

    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen bg-[#efefed] text-[#060616] antialiased transition-colors duration-300 dark:bg-[#070b14] dark:text-white">
    @include('partials.header')

    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    <a href="https://wa.me/8801978675507" target="_blank" rel="noopener noreferrer" class="whatsapp-float"
        aria-label="Chat on WhatsApp">
        <span class="whatsapp-float__pulse"></span>
        <span class="whatsapp-float__icon">
            <i class="fa-brands fa-whatsapp"></i>
        </span>
    </a>
</body>

</html>