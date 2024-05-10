@php
  $list = [];
  foreach ($shops as $shop) {
      $newObj = new stdClass();
      $newObj->name = $shop->name;
      $newObj->users = [];
      $newObj->count = 0;

      foreach ($users as $user) {
          if ($shop->id == $user->shop_id) {
              array_push($newObj->users, $user);
              $newObj->count++;
          }
      }
      array_push($list, $newObj);
  }
@endphp
<x-app-layout>
  <section>
    <div class="container px-5 py-24 mx-auto">
      <h1 class="text-center w-full text-2xl font-bold title-font">ユーザー一覧
      </h1>
      <form class="flex justify-center mt-10 gap-x-3 max-w-2xl mx-auto" method="get" action="">
        @csrf
        <x-forms.text-input type="text" name="text" class="w-1/2" placeholder="例）姓、名" />
        <x-primary-button class="text-base w-20">検索</x-primary-button>
      </form>

      <div class="w-full mx-auto overflow-auto mt-5">

        @foreach ($list as $i)
          <details>
            <summary class=" text-lg font-bold cursor-pointer hover:text-keyBlue mt-2">
              {{ $i->name . ' (' . $i->count . ')' }}</summary>
            <div class=" px-5 my-5">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="px-4 py-3 tracking-wider text-base font-bold">ステータス</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">登録日</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">姓</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">名</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($i->users as $user)
                    <tr>
                      <td class="px-4 py-3 text-base flex items-center">
                        @if (!empty($user->deleted_at))
                          <span class="flex justify-center items-center w-12 rounded text-sm bg-red-300 px-2 py-1">無効</span>
                        @endif
                      </td>
                      <td class="px-4 py-3 text-base">{{ \Carbon\Carbon::createFromTimeString($user->created_at)->format('Y/m/d') }}</td>
                      <td class="px-4 py-3 text-base">{{ $user->last_name }}</td>
                      <td class="px-4 py-3 text-base">{{ $user->first_name }}</td>
                      <td class="px-4 py-3"><a class="text-base text-blue-900" href={{ '/user/' . $user->id }}>詳細</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </details>
        @endforeach
      </div>
    </div>
  </section>
</x-app-layout>
