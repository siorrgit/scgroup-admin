<x-app-layout>
    <section>
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-center w-full text-2xl font-bold title-font">店舗一覧</h1>
          <div class="flex justify-end mt-10">
            <x-primary-button-link href="/shop/add" class="text-base">新規店舗追加</x-primary-button-link>
          </div>
          <div class="w-full mx-auto overflow-auto mt-5">
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-3 tracking-wider text-base font-bold">ステータス</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">エリア</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">ID</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">店舗名</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">詳細</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($shops as $shop)
                <tr>
                    <td class="px-4 py-3 text-base flex items-center">
                        @if (!$shop->is_active)
                            <span class="flex justify-center items-center w-12 rounded text-sm bg-red-300 px-2 py-1">無効</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-base">{{ $shop->area->name }}</td>
                    <td class="px-4 py-3 text-base">{{ $shop->id }}</td>
                    <td class="px-4 py-3 text-base">{{ $shop->name }}</td>
                    <td class="px-4 py-3"><a class="text-base text-blue-900" href={{'shop/' . $shop->id}}>詳細</a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
</x-app-layout>
