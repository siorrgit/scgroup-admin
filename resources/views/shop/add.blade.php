<x-app-layout>
  <section>
    <div class="container px-5 py-24 mx-auto">
      <h1 class="text-center w-full text-2xl font-bold title-font text-gray-900">新規店舗追加</h1>
      <form class="max-w-[600px] mx-auto mt-10">
        @csrf

        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="aria" class="w-32" :value="__('エリア：')" />
          <select name="aria" class="w-full rounded border border-gray-300 text-gray-700 text-sm">
            <option name="aria" value="">選択してください</option>
            <option name="aria" value="1">東京</option>
            <option name="aria" value="2">埼玉</option>
          </select>
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="name" class="w-32" :value="__('店舗名：')" />
          <x-forms.text-input type="text" id="name" name="name" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="id" class="w-32" :value="__('ID：')" />
          <x-forms.text-input type="text" id="id" name="id" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="password" class="w-32" :value="__('パスワード：')" />
          <x-forms.text-input type="password" id="password" name="password" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="postcode" class="w-32" :value="__('郵便番号：')" />
          <x-forms.text-input type="text" id="postcode" name="postcode" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="address" class="w-32" :value="__('住所：')" />
          <x-forms.text-input type="text" id="address" name="address" />
        </div>
        <div class="flex justify-start items-center gap-x-5 p-2 w-full">
          <x-forms.label for="tel" class="w-32" :value="__('電話番号：')" />
          <x-forms.text-input type="text" id="tel" name="tel" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="holiday" class="w-32" :value="__('定休日：')" />
          <x-forms.textarea id="holiday" name="holiday" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="hours" class="w-32" :value="__('営業時間：')" />
          <x-forms.textarea id="hours" name="hours" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 w-full">
          <x-forms.label for="note" class="w-32" :value="__('備考：')" />
          <x-forms.textarea id="note" name="note" />
        </div>
        <div class="flex justify-start items-start gap-x-5 p-2 pt-4 w-full">
          <x-forms.label for="note" class="w-32" :value="__('事前決済：')" />
          <div class="flex justify-start gap-x-5 w-full">
            <label for="payable" class="flex items-center justify-center gap-x-2 text-sm">
              <input type="radio" name="payable" id="payable" value="1" class="w-3 h-3" />可
            </label>
            <label for="non-payable" class="flex items-center justify-center gap-x-2 text-sm">
              <input type="radio" name="payable" id="non-payable" value="0" class="w-3 h-3" />不可
            </label>
          </div>
        </div>

        <div class="flex justify-center mt-10">
          <x-primary-button class="text-m w-32">登録</x-primary-button>
        </div>

      </form>
    </div>
  </section>
</x-app-layout>
