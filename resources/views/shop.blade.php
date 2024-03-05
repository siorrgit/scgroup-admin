<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
  <x-header />
  <main>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full">
          <h1 class="text-2xl font-bold title-font mb-2 text-gray-900">店舗一覧</h1>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-10">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-4 py-3 tracking-wider text-gray-900 text-m font-bold">無効</th>
                <th class="px-4 py-3 tracking-wider text-gray-900 text-m font-bold">エリア
                </th>
                <th class="px-4 py-3 tracking-wider text-gray-900 text-m font-bold">ID</th>
                <th class="px-4 py-3 tracking-wider text-gray-900 text-m font-bold">店舗名</th>
                <th class="px-4 py-3 tracking-wider text-gray-900 text-m font-bold">詳細</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($shops as $shop)
              <tr>
                  <td class="px-4 py-3 text-m"></td>
                  <td class="px-4 py-3 text-m">{{ $shop->area_id }}</td>
                  <td class="px-4 py-3 text-m">{{ $shop->shopID }}</td>
                  <td class="px-4 py-3 text-m text-gray-900">{{ $shop->name }}</td>
                  <td class="px-4 py-3"><a class="text-m text-blue-900" href={{'shop/' . $shop->id}}>詳細</a></td>
                  </tr>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</body>

</html>
