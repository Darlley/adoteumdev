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
    
        <form action="#" method="POST" class="mt-8" x-data="form({{ $categories }})">
            <div class="overflow-hidden sm:rounded-md">
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
                                                <p x-text="skill.name" class="text-primary-500"></p>
                                                <div class="text-gray-400 flex gap-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                    </svg>

                                                </div>
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
        </form>
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