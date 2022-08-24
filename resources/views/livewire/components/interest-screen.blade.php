<div class="max-w-6xl m-auto px-8">
    <div class="mt-8 flex flex-col items-center text-center gap-2">
        <div>
            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-white">
                <img src="{{ $user->profile->avatar }}" alt="">
            </span>
        </div>
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Personalizar perfil</h3>
            <p class="mt-1 text-sm text-gray-600">Bem vindo <strong>{{ $user->name }}</strong>! que tal
                personalizar seu perfil?</p>
        </div>
    </div>

    <form action="#" method="POST" class="mt-8">
        <div class="overflow-hidden sm:rounded-md">
            <div class="">
                <x-interests :categories="$categories" />
            </div>
            <div class="py-3 text-right">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-400 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 w-full md:w-max">Save</button>
            </div>
        </div>
    </form>
</div>