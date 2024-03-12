<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a href="/" class="flex w-52 title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <x-application-logo />
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a href="/shop" class="mr-5 font-bold hover:text-blue-600">店舗一覧</a>
        <a class="mr-5 font-bold hover:text-blue-600">処方せん（未完了）一覧</a>
        <a class="mr-5 font-bold hover:text-blue-600">処方せん（完了）一覧</a>
        <a class="mr-5 font-bold hover:text-blue-600">ユーザー一覧</a>
      </nav>
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a
      class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 cursor-pointer"
      :href="route('logout')"
      onclick="event.preventDefault();
                  this.closest('form').submit();"
                  >ログアウト
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
    </form>

    </div>
  </header>
