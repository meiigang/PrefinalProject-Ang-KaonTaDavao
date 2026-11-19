<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kaon Ta Davao</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-100 font-sans text-slate-900">
        <main class="mx-auto flex min-h-screen max-w-5xl items-center px-6 py-12">
            <section class="grid w-full overflow-hidden rounded-3xl border border-white bg-white shadow-2xl md:grid-cols-2">
                <div class="flex flex-col justify-center p-8 md:p-12">
                    <span class="mb-4 w-fit rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-800">
                        Tailwind CSS v3
                    </span>
                    <h1 class="text-4xl font-bold tracking-tight text-slate-950 md:text-5xl">
                        Kaon Ta Davao
                    </h1>
                    <p class="mt-5 max-w-md text-lg leading-8 text-slate-600">
                        Discover good food and local flavors around Davao City.
                    </p>
                    <button class="mt-8 w-fit rounded-lg bg-amber-500 px-5 py-3 font-semibold text-slate-950 shadow-lg transition hover:bg-amber-400 focus:outline-none focus:ring-4 focus:ring-amber-300">
                        Explore restaurants
                    </button>
                </div>
                <div class="min-h-72 bg-gradient-to-br from-amber-400 via-orange-400 to-red-500 md:min-h-full">
                    <div class="flex h-full min-h-72 items-center justify-center p-8 md:min-h-full">
                        <div class="rounded-2xl border border-white/40 bg-white/20 p-8 text-center text-white backdrop-blur-sm">
                            <p class="text-6xl">🍲</p>
                            <p class="mt-3 font-semibold">Davao Food Guide</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
