<x-app-layout>
  <section>
    <div class="container px-5 py-24 mx-auto">
      <h1 class="text-center w-full text-2xl font-bold title-font text-gray-900">
        @if ($shop)
          {{ $shop->name }}店：店舗詳細
        @else
          店舗新規登録
        @endif
      </h1>

      @if ($shop)
        @if(session('status') == 'shop-deleted')
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="block w-full max-w-[600px] bg-keyBlue rounded-md text-sm text-white font-bold text-center mt-10 mx-auto p-3">{{ __('店舗を無効化しました。') }}</div>
        @elseif (session('status') == 'shop-activated')
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="block w-full max-w-[600px] bg-keyBlue rounded-md text-sm text-white font-bold text-center mt-10 mx-auto p-3">{{ __('店舗を有効化しました。') }}</div>
        @endif

        <div class="flex justify-end mt-10">
            @if ($shop->is_active)
                <x-danger-button class="text-m" type="button" onclick="modalOpen('delete')">無効化</x-danger-button>
            @else
                <x-primary-button class="text-m" type="button" onclick="modalOpen('activate')">有効化</x-primary-button>
            @endif
        </div>
      @endif

      <form class="max-w-[600px] mx-auto mt-10" method="post"
        action="{{ $shop ? '/shop/' . $shop->id : url('/shop/add') }}">
        @if ($shop)
          @method('PUT')
        @else
          @method('POST')
        @endif
        @csrf


        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="area_id" class="w-32" :value="__('エリア：')" />
          <select name="area_id" class="w-full rounded border border-gray-300 text-gray-700 text-sm" required>
            <option name="area_id" value="">選択してください</option>
            @foreach ($areas as $area)
              <option name="area_id" value="{{ $area->id }}" @if ($shop && $area->id == $shop->area_id) selected @endif>
                {{ $area->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="name" class="w-32" :value="__('店舗名：')" />
          <x-forms.text-input type="text" id="name" name="name" value="{{ $shop ? $shop->name : '' }}"
            required />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="id" class="w-32" :value="__('ID：')" />
          <x-forms.text-input type="text" id="id" name="id" value="{{ $shop ? $shop->id : '' }}"
            disabled="{{ $shop ? true : false }}" required />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="password" class="w-32" :value="__('パスワード：')" />
          <x-forms.text-input type="password" id="password" name="password" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="postcode" class="w-32" :value="__('郵便番号：')" />
          <x-forms.text-input type="text" id="postcode" name="postcode" value="{{ $shop ? $shop->postcode : '' }}"
            required maxlength="7" pattern="[0-9]{7}" placeholder="ハイフン(-)を除いて入力してください。" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="address" class="w-32" :value="__('住所：')" />
          <x-forms.text-input type="text" id="address" name="address" value="{{ $shop ? $shop->address : '' }}"
            required />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="lat" class="w-32" :value="__('緯度：')" />
          <x-forms.text-input type="text" id="lat" name="lat" value="{{ $shop ? $shop->lat : '' }}"
            required />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="lng" class="w-32" :value="__('軽度：')" />
          <x-forms.text-input type="text" id="lng" name="lng" value="{{ $shop ? $shop->lng : '' }}"
            required />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="tel" class="w-32" :value="__('電話番号：')" />
          <x-forms.text-input type="text" id="tel" name="tel" value="{{ $shop ? $shop->tel : '' }}"
            required />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="hours" class="w-32" :value="__('営業時間：')" />
          <x-forms.textarea id="hours" name="hours" value="{{ $shop ? $shop->hours : '' }}" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="holiday" class="w-32" :value="__('定休日：')" />
          <x-forms.textarea id="holiday" name="holiday" value="{{ $shop ? $shop->holiday : '' }}" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="note" class="w-32" :value="__('備考：')" />
          <x-forms.textarea id="note" name="note" value="{{ $shop ? $shop->note : '' }}" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 pt-4 w-full">
          <x-forms.label for="note" class="w-32" :value="__('事前決済：')" />
          <div class="flex justify-start gap-x-5 w-full">
            <label for="payable" class="flex items-center justify-center gap-x-2 text-sm">
              <input type="radio" name="payable" id="payable" value="1" class="w-3 h-3"
                @if ($shop && $shop->payable == 1) checked @elseif (empty($shop)) checked @endif />可
            </label>
            <label for="non-payable" class="flex items-center justify-center gap-x-2 text-sm">
              <input type="radio" name="payable" id="non-payable" value="0" class="w-3 h-3"
                @if ($shop && $shop->payable == 0) checked @endif />不可
            </label>
          </div>
        </div>

        <div class="flex justify-center mt-10">
          <x-primary-button class="text-m w-32" type="submit">登録</x-primary-button>
        </div>

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
      @if ($shop)
      <div id="modal-body">
        <div id="modal-delete" class="modal-i hidden p-10">
          <form method="post" action="{{ url('/shop/destroy/' . $shop->id) }}">
            @csrf
            @method('PUT')
            <div class="text-2xl font-bold text-center">店舗無効化</div>
            <div class="text-center mt-5">この店舗を無効化します。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-danger-button class="text-m min-w-[100px] justify-center">送信</x-danger-button>
            </div>
          </form>
        </div>
        <div id="modal-activate" class="modal-i hidden p-10">
          <form method="post" action="{{ url('/shop/activate/' . $shop->id) }}">
            @csrf
            @method('PUT')
            <div class="text-2xl font-bold text-center">店舗有効化</div>
            <div class="text-center mt-5">この店舗を有効化します。<br />本当によろしいですか？</div>
            <div class="flex justify-center w-full mt-20">
              <x-primary-button class="text-m min-w-[100px] justify-center">送信</x-primary-button>
            </div>
          </form>
        </div>
      </div>
      @endif
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
