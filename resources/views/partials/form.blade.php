@csrf()
<div class="box-border">
    <input type="text" name="title" id="" placeholder="Título" value='{{$task->title ?? old('title')}}'
        class="w-[390px] h-[45.84px] l-[443.65px]  top-[81.81px] border-none bg-white shadow-gray-400 shadow pl-2.5 outline-none text-base placeholder:font-bold placeholder:text-black" />

    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="absolute -mt-[30px] ml-[360px]"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7.47998 7.50375L2.32617 8.29666L6.88529 11.9638L5.69595 17.5141L9.85865 14.3425L15.0125 17.5141L13.6249 11.9638L17.4903 8.29666L12.2373 7.50375L9.85865 2.34995L7.47998 7.50375Z"
            fill="#FFA000" />
        <path
            d="M9.93799 13.7112L6.29971 15.9077L7.25766 11.7662L4.04514 8.97947L8.28335 8.62145L9.93799 4.71223L11.5926 8.62145L15.8308 8.97947L12.6183 11.7662L13.5763 15.9077M19.6143 7.76026L12.657 7.17001L9.93799 0.754639L7.21896 7.17001L0.261719 7.76026L5.53529 12.3371L3.95805 19.1396L9.93799 15.5303L15.9179 19.1396L14.331 12.3371L19.6143 7.76026Z"
            fill="#455A64" />
    </svg>
</div>
<div class="flex flex-col gap-y-2">
    <label for="" class="text-sm">Data de Vencimento</label>
    <input type="date" name="due_date" id="" value='{{ $task->due_date ?? old('due_date') }}'
        class="w-[392px] h-[45.84px] bg-white border-none shadow-gray-400 shadow pl-2.5 outline-none text-base placeholder:font-bold placeholder:text-black"  />
</div>

<div>
    <textarea name="description" id="" placeholder="Criar nota..."
        class="text-base w-[392px] h-[103.36px] bg-white border-none resize-none shadow-gray-400 shadow pt-2.5 pr-0 pb-0 pl-2.5 outline-none"> {{$task->description ?? old('description')}} </textarea>
</div>
