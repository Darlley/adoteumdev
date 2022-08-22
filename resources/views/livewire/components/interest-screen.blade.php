<div>

    <div class="mt-10 sm:mt-0 p-4">
        <div class="md:col-span-1">

            <div class="flex gap-4">
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
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="#" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            
                            @foreach($categories as $category)
                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">{{ $category->name }}</label>
                                <select id="country" name="country" autocomplete="country-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($category->skills as $skill)
                                        <option>{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
