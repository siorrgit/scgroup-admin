<x-app-layout>
  <section>
    <div class="container px-5 py-24 mx-auto">
      <h1 class="text-center w-full text-2xl font-bold title-font text-gray-900">
        {{ $user->last_name . ' ' . $user->first_name }} さんの詳細情報</h1>

      <div class="flex justify-end mt-10">
        <x-danger-button class="text-m" type="button" onclick="modalOpen('delete')">無効化</x-danger-button>
      </div>

      <div class="max-w-[600px] mx-auto mt-10">

        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">登録店舗</div>
          <div class="w-4/6 text-base">{{ $user->shop_id }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">姓</div>
          <div class="w-4/6 text-base">{{ $user->last_name }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">名</div>
          <div class="w-4/6 text-base">{{ $user->first_name }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">姓(フリガナ)</div>
          <div class="w-4/6 text-base">{{ $user->last_kana }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">名(フリガナ)</div>
          <div class="w-4/6 text-base">{{ $user->first_kana }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">性別</div>
          <div class="w-4/6 text-base">{{ $user->gender === 'man' ? '男性' : '女性' }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">生年月日</div>
          <div class="w-4/6 text-base">
            {{ $user->birth_year . ' 年 ' . $user->birth_month . ' 月 ' . $user->birth_day . ' 日' }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">メールアドレス</div>
          <div class="w-4/6 text-base">{{ $user->email }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">携帯番号</div>
          <div class="w-4/6 text-base">{{ $user->phone }}</div>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full border-t">
          <div class="w-2/6 text-base">Push通知</div>
          <div class="w-4/6 text-base">{{ $user->notification ? '通知を許可' : '通知を許可しない' }}</div>
        </div>
        <details class="block p-2 w-full border-t" id="chat">
          <summary class="w-full text-base">
            チャット
          </summary>
          <div class="w-full text-base p-2 border">チャット</div>
        </details>

        </form>
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
        <div id="modal-delete" class="modal-i hidden p-10">
          <form method="" action="">
            @csrf
            <div class="text-2xl font-bold text-center">ユーザー無効化</div>
            <div class="text-center mt-5">このユーザーを無効化します。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-danger-button class="text-m min-w-[100px] justify-center">送信</x-danger-button>
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
</script>
