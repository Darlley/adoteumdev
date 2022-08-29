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
                                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" x-on:change="changeSkill(category.name, $event)">
                                    <option>Selecionar</option>
                                    <template x-for='skill in category.skills'>
                                        <option value="skill.id" x-text="skill.name"></option>
                                    </template>
                                </select>
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
                    console.log(typeof this.categories)
                    const category = this.categories.find((item) => item.name === selectedCategory)
                    const skill = category.skills.find(item => item.id === parseInt(event.target.value))
                    console.log(category.skills)
                    
                    if(this.payload.hasOwnProperty(category)){
                        this.payload[category].push({
                            ...skill,
                            level: 0
                        })
                    }else{
                        this.payload[category] = [{
                            ...skill,
                            level: 0
                        }]
                    }
                }
            }
        }
</script>
@endpush