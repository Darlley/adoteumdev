<div>
    <div class="max-w-6xl m-auto px-8">
        <div class="mt-8 flex flex-col items-center text-center gap-2">
            <div class="">
                <span class="flex rounded-full overflow-hidden bg-white">
                    <img src="{{ $avatar }}" alt="" class="flex h-12 w-12">
                </span>
            </div>
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Personalizar perfil</h3>
                <p class="mt-1 text-sm text-gray-600">Bem vindo <strong>{{ $user->name }}</strong>! que tal
                    personalizar seu perfil?</p>
            </div>
        </div>
    
        <div class="overflow-hidden sm:rounded-md mt-8" x-data="form({{ $categories }})">
            <div class="">
                <div class="grid grid-cols-6 gap-6" >

                    <template x-for='category in categories'>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium text-gray-700" x-text="category.name"></label>
                            <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" x-ref="selectionAlpine" x-on:change="changeSkill(category.name, $event)">
                                <option value="0">Selecionar</option>
                                <template x-for='skill in category.skills'>
                                    <option :value="skill['id']" x-text="skill.name"></option>
                                </template>
                            </select>
                            <div class="mt-2 space-y-2 rounded-md text-sm">
                                <template x-if='payload.hasOwnProperty(category.name)' x-for='skill in payload[category.name]'>
                                    <div class="flex border border-primary-500 rounded-md overflow-hidden font-bold">
                                        <div class="bg-gradient-to-l from-primary-500 to-secundary-500 text-white w-[80px] flex justify-center items-center">
                                            <span x-text="skill.name"></span>
                                        </div>
                                        <div class="flex-1 p-2 mx-2 gap-1 flex flex-col">
                                            <p class="text-primary-500">Qual o seu nível de conhecimento?</p>
                                            <div class="flex gap-1">
                                                <template x-for='i in 5'>
                                                    <button x-on:click='skill.level = i'>
                                                        <template x-if="skill.level < i">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                            </svg>
                                                        </template>
                                                        
                                                        <template x-if="skill.level >= i">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-primary-500">
                                                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                                            </svg>
                                                        </template>
                                                    </button>
                                                </template>
                                            </div>
                                        </div>

                                        <div class="flex items-center p-2">
                                            <button class="text-gray-500 hover:text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                </div>
            </div>
            <div class="py-3 text-right">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-400 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 w-full md:w-max">Save</button>
            </div>
        </div>
    </div>
    
</div>

@push('scripts')
<script>
        function form(categories){
            return {
                categories: categories,
                payload: {},
                changeSkill(selectedCategory, event){
                    const category = this.categories.find((item) => item.name === selectedCategory)
                    const skill = category.skills.find(item => item.id === parseInt(event.target.value))

                    if(this.payload.hasOwnProperty(selectedCategory)){
                        this.payload[selectedCategory].push({
                            ...skill,
                            level: 0
                        })
                    }else{
                        this.payload[selectedCategory] = [{
                            ...skill,
                            level: 0
                        }]
                    }

                    // $refs.selection.value = "" 
                }
            }
        }
</script>
@endpush