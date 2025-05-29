<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen" x-data>
        <!-- Alpine store initialization -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('mobileMenu', { open: false });
            });
        </script>

        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            <x-alert type="success" :message="session('success')" />
            <x-alert type="error" :message="session('error')" />

            {{ $slot }}
        </main>
    </div>

    <!-- Script untuk menampilkan waktu secara real-time -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/timezone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/utc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            dayjs.extend(dayjs_plugin_relativeTime);
            dayjs.extend(dayjs_plugin_timezone);
            dayjs.extend(dayjs_plugin_utc);
            dayjs.locale('id');

            function updateRelativeTimes() {
                document.querySelectorAll('.waktu-relative').forEach(el => {
                    const waktu = el.getAttribute('data-waktu');
                    if (waktu) {
                        try {
                            const waktuObj = dayjs(waktu).tz("Asia/Jakarta");
                            el.textContent = waktuObj.fromNow();
                        } catch (error) {
                            console.error("Gagal parse waktu: ", waktu, error);
                            el.textContent = "Waktu tidak valid";
                        }
                    }
                });
            }

            updateRelativeTimes();
            setInterval(updateRelativeTimes, 60000); // perbarui setiap 1 menit
        });
    </script>

</body>

</html>