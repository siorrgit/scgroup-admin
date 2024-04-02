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
        @if (!empty($order->user))
          <x-primary-button type="button" onclick="modalOpen('request')" class="text-m">来店依頼</x-primary-button>
          <x-primary-button type="button" onclick="modalOpen('apppay')" class="text-m">事前登録決済実行</x-primary-button>
        @endif
        <x-primary-button type="button" onclick="modalOpen('shoppay')" class="text-m">店頭決済完了</x-primary-button>
        <x-danger-button type="button" onclick="modalOpen('cancel')" class="text-m">キャンセル</x-danger-button>
      </div>
    @endif

    @if ($pagemode == 'complete')
      <div class="flex justify-end gap-x-3 max-w-[600px] mx-auto mt-10">
        <x-primary-button type="button" onclick="modalOpen('prevstatus')" class="text-m">未完了に戻す</x-primary-button>
      </div>
    @endif

    <div class="max-w-[600px] mx-auto mt-10">

      <div class=" text-lg text-center font-bold mt-14 mb-10">
        {{ $order->status == 'incomplete_sent'
            ? '未完了'
            : ($order->status === 'incomplete_notified'
                ? '未完了（来店依頼済み）'
                : ($order->status == 'complete_apppayed'
                    ? '事前登録決済済み'
                    : ($order->status == 'complete_shoppayed'
                        ? '店頭決済済み'
                        : 'キャンセル'))) }}
      </div>

      @if (!empty($order->user))
        <div class="flex items-center justify-end w-full mb-2">
          <a href="{{ '/user/' . $order->user->id . '#chat' }}"><img class="w-8 h-8"
              src="/assets/img/global/icons/mail.svg" alt="" /></a>
        </div>
      @else
        <div class="flex items-center gap-x-5 w-full mb-2">
          <img class="w-8 h-8" src="/assets/img/global/icons/avatar.svg" alt="" />
          <div class="font-bold">[ゲストユーザー]</div>
        </div>
      @endif
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">名前</div>
        <div class="w-4/6 text-base">
          {{ $order->user ? $order->user->last_name : $order->guest_last_name }}
          {{ $order->user ? $order->user->first_name : $order->guest_first_name }}
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">名前（フリガナ）</div>
        <div class="w-4/6 text-base">
          {{ $order->user ? $order->user->last_kana : $order->guest_last_kana }}
          {{ $order->user ? $order->user->first_kana : $order->guest_first_kana }}
        </div>
      </div>
      @if ($order->user)
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">性別</div>
          <div class="w-4/6 text-base">
            {{ $order->user->gender == 'man' ? '男性' : '女性' }}
          </div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">生年月日</div>
          <div class="w-4/6 text-base">
            {{ $order->user->birth_year . '年 ' . $order->user->birth_month . '月 ' . $order->user->birth_day . '日' }}
          </div>
        </div>
      @endif
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">メールアドレス</div>
        <div class="w-4/6 text-base">
          {{ $order->user ? $order->user->email : $order->guest_email }}
        </div>
      </div>
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">携帯番号</div>
        <div class="w-4/6 text-base">
          {{ $order->user ? $order->user->phone : $order->guest_phone }}
        </div>
      </div>
      @if ($order->user)
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">Push通知</div>
          <div class="w-4/6 text-base">
            {{ $order->user->notification == '1' ? '許可する' : '許可しない' }}
          </div>
        </div>
      @endif
      <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
        <div class="w-2/6 text-base">お受け取り希望日</div>
        <div class="w-4/6 text-base">
          {{ \Carbon\Carbon::createFromTimeString($order->receiving_at)->format('Y/m/d') }}
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
  {{-- Modals --}}
  <div id="modal" class="hidden justify-center items-center w-[100vw] h-[100vh] fixed top-0 left-0 z-10">
    <div id="modal-overlay" class="block w-full h-full bg-[rgba(0,0,0,.5)] absolute top-0 left-0"></div>

    <div id="modal-content"
      class="modal-content block w-[80vw] max-w-[600px] aspect-video bg-white rounded-md relative">
      <button id="modal-close"
        class="w-[30px] h-[30px] rounded-full bg-black absolute top-[-15px] right-[-15px] cursor-pointer"
        type="button">
        <i class="block w-[20px] h-[1px] bg-white absolute top-0 right-0 bottom-0 left-0 m-auto rotate-45"></i>
        <i class="block w-[20px] h-[1px] bg-white absolute top-0 right-0 bottom-0 left-0 m-auto -rotate-45"></i>
      </button>
      <div id="modal-body">
        @if(!empty($order->user))
        <div id="modal-request" class="modal-i hidden p-10">
          <div class="text-2xl font-bold text-center">来店依頼</div>
          <div class="text-center mt-5">
            {{ $order->user->last_name . ' ' . $order->user->first_name }}さんへ以下の内容で来店依頼通知を送ります<br />送信しますか？<br />
            <div class="block rounded-md bg-gray-100 p-5 text-base mt-3">お薬のお渡し準備が完了いたしました。<br />ご来店お待ちしております。</div>
          </div>
          <div class="flex justify-center w-full mt-20">
            <form method="post" action="{{ url('/order/notify/' . $order->id) }}">
              @csrf
              @method('put')
              <x-primary-button class="text-m min-w-[100px]">送信</x-primary-button>
            </form>
          </div>
        </div>
        <div id="modal-apppay" class="modal-i hidden p-10">
          <div class="text-2xl font-bold text-center">事前登録決済実行</div>
          <div class="text-center mt-5">
            {{ $order->user->last_name . ' ' . $order->user->first_name }}さんへの請求金額を入力してください。
          </div>
          <div class="flex justify-center flex-wrap w-full mt-10">
            <form id="apppayForm" method="" action="" class="flex flex-col justify-center">
              @csrf
              <div class="flex justify-center items-center gap-x-3 w-full">
                <x-forms.text-input id="priceInput" name="price" pattern="^[0-9]+$" class="w-[200px]" required />
                <span class="text-base font-bold">円</span>
              </div>
              <x-primary-button class="text-m min-w-[100px] mt-10">確認</x-primary-button>
            </form>
          </div>
        </div>
        <div id="modal-apppay-confirm" class="modal-i hidden p-10">
            <div class="text-2xl font-bold text-center">事前登録決済実行</div>
            <div class="text-center mt-5 text-lg font-bold">
                {{ $order->user->last_name . ' ' . $order->user->first_name }}さんへ
                <br />
                {{ \Carbon\Carbon::now()->format('m月d日') }}付けで
                <br />
                <span id="priceSpan"></span>円の決済を実行します。
            </div>
            <div class="flex justify-center flex-wrap w-full mt-10">
                <x-primary-button type="button" class="text-m min-w-[100px] mt-10"
                onclick="apppay()">決済実行</x-primary-button>
            </div>
        </div>
        @endif
        <div id="modal-shoppay" class="modal-i hidden p-10">
          <form method="" action="">
            @csrf
            <div class="text-2xl font-bold text-center">店頭決済</div>
            <div class="text-center mt-5">店頭決済完了として送信します。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-primary-button class="text-m min-w-[100px]">送信</x-primary-button>
            </div>
          </form>
        </div>
        <div id="modal-cancel" class="modal-i hidden p-10">
          <form method="" action="">
            @csrf
            <div class="text-2xl font-bold text-center">キャンセル</div>
            <div class="text-center mt-5">この処方せん依頼をキャンセルとして完了させます。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-danger-button class="text-m min-w-[100px] justify-center">送信</x-danger-button>
            </div>
          </form>
        </div>
        <div id="modal-prevstatus" class="modal-i hidden p-10">
          <form method="" action="">
            @csrf
            <div class="text-2xl font-bold text-center">未完了へ戻す</div>
            <div class="text-center mt-5">この処方せん依頼を未完了へ変更します。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-primary-button class="text-m min-w-[100px]">送信</x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>


<script>
  const modal = document.getElementById('modal')
  const modalOverlay = document.getElementById('modal-overlay')
  const modalCloseBtn = document.getElementById('modal-close')

  const modalOpen = (type) => {
    closeModal()
    if (type === 'apppay') {
      apppayClear()
    }
    const targetModal = document.getElementById(`modal-${type}`)

    targetModal.classList.remove('hidden')
    targetModal.classList.add('block')
    modal.classList.remove('hidden')
    modal.classList.add('flex')
  }

  const closeModal = () => {
    const modalItems = document.querySelectorAll('.modal-i')
    modalItems.forEach(i => {
      i.classList.remove('block')
      i.classList.add('hidden')
    });
    modal.classList.remove('flex')
    modal.classList.add('hidden')
  }
  modalOverlay.addEventListener('click', closeModal)
  modalCloseBtn.addEventListener('click', closeModal)

  // 事前決済
  const apppayForm = document.getElementById('apppayForm')
  const priceInput = document.getElementById('priceInput')
  const priceSpan = document.getElementById('priceSpan')

  apppayForm.addEventListener('submit', (e) => {
    e.preventDefault();
    priceSpan.innerHTML = priceInput.value
    modalOpen('apppay-confirm')
  })

  const apppay = () => {
    apppayForm.submit()
  }

  const apppayClear = () => {
    priceInput.value = ''
    priceSpan.innerHTML = ''
  }
</script>
