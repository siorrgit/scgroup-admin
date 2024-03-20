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
@endphp
<x-app-layout>
    <section>
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-center w-full text-2xl font-bold title-font">処方せん{{ $pagemode == 'incomplete' ? '未' : ''  }}完了一覧</h1>
          <form class="flex justify-center mt-10 gap-x-3 max-w-2xl mx-auto" method="get" action="{{ $url }}">
            @csrf
            <x-forms.text-input type="text" name="text" class="w-1/2" placeholder="例）受付番号、姓、名" />
            <x-primary-button class="text-base w-20">検索</x-primary-button>
          </form>
          <div class="w-full mx-auto overflow-auto mt-5">
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-3 tracking-wider text-base font-bold">受付番号</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">姓</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">名</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold">受取希望日</th>
                  <th class="px-4 py-3 tracking-wider text-base font-bold"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td class="px-4 py-3 text-base">{{ $order->number }}</td>
                    <td class="px-4 py-3 text-base">
                        {{-- {{ $order->user->last_name }} --}}
                        鈴木
                    </td>
                    <td class="px-4 py-3 text-base">
                        {{-- {{ $order->user->first_name }} --}}
                        太朗
                    </td>
                    <td class="px-4 py-3 text-base">{{ $order->receiving_at }}</td>
                    <td class="px-4 py-3"><a class="text-base text-blue-900" href={{ $url . '/' . $order->id}}>詳細</a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
</x-app-layout>
