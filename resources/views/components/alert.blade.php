<div>

    @if ($errors->any())
        <div class="w-[80%] flex justify-center bg-red-400 mx-auto mt-5 mb-2.5 p-2.5 rounded-md text-white">
            <ul class="flex flex-col items-center">
                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
