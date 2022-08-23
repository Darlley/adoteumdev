<form action="#" method="POST" class="mt-8">
    <div class="overflow-hidden sm:rounded-md">
        <div class="">
            <div class="grid grid-cols-6 gap-6" x-data="form()">

                @foreach($categories as $category)
                <div class="col-span-6 sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">{{ $category->name }}</label>
                    <select id="country" name="country" autocomplete="country-name"
                        class="mt-1 block w-full py-2 px-3 border rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" x-on:change="changeSkill">
                        <option>Selecionar</option>
                        @foreach ($category->skills as $skill)
                            <option value="{{ $skill->id }}" x-on:change="">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>
        </div>
        <div class="py-3 text-right">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-400 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 w-full md:w-max">Save</button>
        </div>
    </div>
</form>

@push('scripts')
<script>
    function form(){
        return {
            changeSkill(e){
                console.log(e.target.value)
            }
        }
    }
</script>
@endpush