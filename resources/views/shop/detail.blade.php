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
        <div class="flex justify-end mt-10">
          <x-danger-button class="text-m">無効化</x-danger-button>
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
          <x-forms.text-input type="password" id="password" name="password" value="{{ $shop ? $shop->password : '' }}"
            required />
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
          <x-forms.label for="holiday" class="w-32" :value="__('定休日：')" />
          <x-forms.textarea id="holiday" name="holiday" value="{{ $shop ? $shop->holiday : '' }}" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="hours" class="w-32" :value="__('営業時間：')" />
          <x-forms.textarea id="hours" name="hours" value="{{ $shop ? $shop->hours : '' }}" />
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
</x-app-layout>
