@php
  $pagemode = '';
  $url = '';
  if (Request::is('incomplete')) {
      $pagemode = 'incomplete';
      $url = url('/incomplete');
  } elseif (Request::is('complete')) {
      $pagemode = 'complete';
      $url = url('/complete');
  }

  $list = [];
  foreach ($shops as $shop) {
      $newObj = new stdClass();
      $newObj->name = $shop->name;
      $newObj->orders = [];
      $newObj->count = 0;

      foreach ($orders as $order) {
          if ($shop->id == $order->shop_id) {
              array_push($newObj->orders, $order);
              $newObj->count++;
          }
      }
      array_push($list, $newObj);
  }
@endphp
<x-app-layout>
  <section>
    <div class="container px-5 py-24 mx-auto">
      <h1 class="text-center w-full text-2xl font-bold title-font">処方せん{{ $pagemode == 'incomplete' ? '未' : '' }}完了一覧
      </h1>
      <form class="flex justify-center mt-10 gap-x-3 max-w-2xl mx-auto" method="get" action="{{ $url }}">
        @csrf
        <x-forms.text-input type="text" name="text" class="w-1/2" placeholder="例）受付番号、姓、名" />
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
                    @if ($pagemode == 'incomplete')
                      <th class="px-4 py-3 tracking-wider text-base font-bold"></th>
                      <th class="px-4 py-3 tracking-wider text-base font-bold"></th>
                    @endif
                    <th class="px-4 py-3 tracking-wider text-base font-bold">受付番号</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">姓</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">名</th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold">
                      @if ($pagemode == 'incomplete')
                        受取希望日
                      @else
                        受渡日
                      @endif
                    </th>
                    <th class="px-4 py-3 tracking-wider text-base font-bold"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($i->orders as $order)
                    <tr>
                      @if ($pagemode == 'incomplete')
                        <td class="px-4 py-3 text-base">
                          @if (!empty($order->user))
                            <a href="{{ '/user/' . $order->user->id . '#chat' }}"><img class="w-6"
                                src="/assets/img/global/icons/chat.svg" alt="" /></a>
                          @endif
                        </td>
                        <td class="px-4 py-3 text-base">
                          @if (!empty($order->user))
                            <img class="w-6" src="/assets/img/global/icons/paper-airplane.svg" alt="" />
                          @endif
                        </td>
                      @endif
                      <td class="px-4 py-3 text-base">{{ $order->number }}</td>
                      <td class="px-4 py-3 text-base">
                        {{ $order->user ? $order->user->last_name : $order->guest_last_name }}
                      </td>
                      <td class="px-4 py-3 text-base">
                        {{ $order->user ? $order->user->first_name : $order->guest_first_name }}
                      </td>
                      <td class="px-4 py-3 text-base">
                        @if ($pagemode == 'incomplete')
                          {{ $order->receiving_at ? \Carbon\Carbon::createFromTimeString($order->receiving_at)->format('Y/m/d') : '' }}
                        @elseif ($order->status == 'canceled')
                          キャンセル
                        @else
                          {{ $order->received_at ? \Carbon\Carbon::createFromTimeString($order->received_at)->format('Y/m/d') : '' }}
                        @endif
                      </td>
                      <td class="px-4 py-3"><a class="text-base text-blue-900" href={{ $url . '/' . $order->id }}>詳細</a>
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
