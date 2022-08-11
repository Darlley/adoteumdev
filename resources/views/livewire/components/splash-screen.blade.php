<div x-data="splash()" x-init="initSplash()">
    <div x-ref="slideContainer" class="absolute left-0 top-0 transform duration-1000 flex justify-center items-center h-screen w-full bg-gradient-to-tr from-blue-500 to-blue-500">
        <div>
            <x-logo />
        </div>
    </div>
</div>

<script>
    function splash(){
        return {
            initSplash(){
                this.animate(this.$refs.slideContainer, ['skew-x-12', 'left-full'], 'add', () => {
                    this.animate(this.$refs.slideContainer, ['skew-x-12'], 'remove')
                })
            },
            animate(element, classList, type, callback){
                setTimeout(() => {
                    if(type === 'add'){
                        this.$refs.slideContainer.classList.add(...classList)
                    }else{
                        this.$refs.slideContainer.classList.remove(...classList)
                    }

                    if(callback){
                        callback()
                    }
                }, 1000);
            }
        }
    }
</script>
