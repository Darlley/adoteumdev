<div>
    <div class="flex justify-center items-center flex-col w-full p-4 h-screen">
        <div class="flex flex-col items-center justify-center">
            <div class="flex w-20 h-20"><img src="{{ $user->profile->avatar }}" alt="" class="w-full h-full"></div>
            <p>{{ $user->name }}</p>
        </div>
    </div>
</div>
