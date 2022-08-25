<div class="grid grid-cols-6 gap-6" x-data='form()'>
    @foreach($categories as $category)
    <div class="col-span-6 sm:col-span-3">
        <label for="country" class="block text-sm font-medium text-gray-700">{{ $category->name }}</label>
        <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" x-on:change="changeSkill('{{ $category->name }}', $event)">
            <option>Selecionar</option>
            @foreach ($category->skills as $skill)
                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
            @endforeach
        </select>
    </div>
    @endforeach
</div>

@push('scripts')
<script>
    
    function form(){
        return {
            categorys: @this.categories,
            changeSkill(category, event){
                const cat = this.categorys.find((item) => item.name === category)
                const skill = cat.skills.find(item => item.id === parseInt(event.target.value))
                
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