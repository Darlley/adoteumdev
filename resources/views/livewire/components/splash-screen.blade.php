<div x-data="splash()" x-init="initSplash()">
    <div x-ref="slideContainer" class="absolute left-0 top-0 transform duration-1000 flex justify-center items-center h-screen w-full bg-gradient-to-tr from-primary-500 to-secundary-500">
        <div>
            <x-logo />
        </div>
    </div>

    <div class="flex flex-col min-h-screen justify-center items-center w-full">
        <div x-ref="logo" class="transform scale-0 duration-500">
            <img src="{{ asset('img/logo-adote-um-dev-gradient.svg') }}" alt="Logo" class="w-40">
        </div>
        <div x-ref="logoTitle" class="text-primary-500 mt-4 font-semibold transform scale-0 text-3xl duration-1000">
            <h1>AdoteUm.Dev</h1>
        </div>
    </div>
</div>

<script>
    function splash(){
        return {
            initSplash(){
                document.body.classList.add('overflow-hidden')

                this.animate(this.$refs.slideContainer, ['skew-x-12', 'left-full'], 'add', 1000, () => {
                    this.animate(this.$refs.slideContainer, ['skew-x-12'], 'remove', 900, () => {
                        this.animate(this.$refs.logo, ['scale-100'], 'add', 200, () => {
                            this.animate(this.$refs.logoTitle, ['scale-100'], 'add', 300, () => {
                                setTimeout(() => window.location.href = '/home', 2500)
                            })
                        })
                    })
                })
            },
            animate(element, classList, type, time, callback){
                setTimeout(() => {
                    if(type === 'add'){
                        element.classList.add(...classList)
                    }else{
                        element.classList.remove(...classList)
                    }

                    if(callback){
                        callback()
                    }
                }, time);
            }
        }
    }
</script>
