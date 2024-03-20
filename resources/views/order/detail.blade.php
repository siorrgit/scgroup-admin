@php
  $pagemode = '';
  if (Request::is('incomplete/*')) {
      $pagemode = 'incomplete';
  } elseif (Request::is('complete/*')) {
      $pagemode = 'complete';
  }
@endphp

<x-app-layout>
  <section>
    @if ($pagemode == 'incomplete')
      <div class="flex justify-center gap-x-3 max-w-[600px] mx-auto mt-10">
        <form method="" action="">
            @csrf
            <x-primary-button class="text-m">来店依頼</x-primary-button>
        </form>
        <form method="" action="">
            @csrf
            <x-primary-button class="text-m">事前登録決済実行</x-primary-button>
        </form>
        <form method="" action="">
            @csrf
            <x-primary-button class="text-m">店頭決済完了</x-primary-button>
        </form>
        <form method="" action="">
            @csrf
            <x-danger-button class="text-m">キャンセル</x-danger-button>
        </form>
      </div>
    @endif
    @if ($pagemode == 'complete')
      <div class="flex justify-end gap-x-3 max-w-[600px] mx-auto mt-10">
        <form method="" action="">
            @csrf
            <x-primary-button class="text-m">未完了に戻す</x-primary-button>
        </form>
      </div>
    @endif

    <div class="max-w-[600px] mx-auto mt-10">

      <div class=" text-lg text-center font-bold mt-14">
        {{ $order->status == 'incomplete' ? '未完了'
        : ($order->status == 'apppayed' ? '事前登録決済済み'
        : ($order->status == 'shoppayed' ? '店頭決済済み'
        : 'キャンセル')) }}
        <br />
        (来店依頼済み)
      </div>

      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t mt-10">
        <div class="w-2/6 text-base">名前</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->last_name }}　{{ $order->user->first_name }} --}}
          山田　太朗
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">名前（フリガナ）</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->last_kana }}　{{ $order->user->first_kana }} --}}
          ヤマダ　タロウ
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">性別</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->gender == 'man' ? '男性' : '女性' }} --}}
          男性
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">メールアドレス</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->email }} --}}
          test@test.com
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">携帯番号</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->phone }} --}}
          090-1234-5678
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">Push通知</div>
        <div class="w-4/6 text-base">
          {{-- {{ $order->user->notification == '1' ? '許可する' : '許可しない' }} --}}
          許可する
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">お受け取り希望日</div>
        <div class="w-4/6 text-base">
          {{ \Carbon\Carbon::createFromTimeString($order->receiving_at)->format('Y/m/d') }}
          {{-- {{ $order->receiving_at->format('Y/m/d') }} --}}
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">受付番号</div>
        <div class="w-4/6 text-base">
          {{ $order->number }}
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">薬剤師に伝えたいこと</div>
        <div class="w-4/6 text-base">
          {{ $order->message }}
        </div>
      </div>
      <div class="flex justify-start items-start gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">処方せん</div>
        <div class="flex flex-col gap-y-5 w-4/6 text-base">
          @for ($i = 0; $i < 5; $i++)
            <div class="w-full border">
              <a href="/assets/img/recipe/sample.jpg" target="_blank"><img class="w-full"
                  src="/assets/img/recipe/sample.jpg" alt="" /></a>
            </div>
          @endfor
        </div>
      </div>
    </div>
    </div>
  </section>
</x-app-layout>
