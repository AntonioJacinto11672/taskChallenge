<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manenger</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 m-0 p-0  opacity-[1px]">
    <div>
        <header
            class="flex justify-between items-center bg-white p-4 shadow-md sticky top-0  h-[40px] gap-0 box-content">
            {{-- {/* Cabecalho Inicio */} --}}
            <nav>
                <div class="flex items-center ">
                    <div class="logo my-auto mx-5 ">
                        <img src="/img/logo.svg" alt="Logotipo" class="cursor-pointer" />
                    </div>

                    <div class="text-gray-800 text-[1rem]   leading-[16,94px]   my-auto mx-5">Task</div>

                    <div class="relative">
                        <input type="text" name="" id="" placeholder="Pesquisar notas"
                            class="flex md:w-[530.17px] sm:w-[100%]  text-left border-1 border-gray-300 rounded-sm opacity-[0px] h-[30px]  pl-5 shadow-md m-auto placeholder:text-gray-400 outline-none  placeholder:text-left " />
                        <span class="absolute flex top-2.5  md:start-[31.7rem]  sm:start-[11.5rem] ">
                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.8914 13.8464L7.47727 9.12144C7.12695 9.42144 6.72407 9.65894 6.26864 9.83393C5.81321 10.0089 5.32859 10.0964 4.81477 10.0964C3.54191 10.0964 2.46477 9.62469 1.58334 8.68119C0.701445 7.73719 0.260498 6.58394 0.260498 5.22144C0.260498 3.85894 0.701445 2.70569 1.58334 1.76169C2.46477 0.818186 3.54191 0.346436 4.81477 0.346436C6.08764 0.346436 7.16501 0.818186 8.04691 1.76169C8.92834 2.70569 9.36905 3.85894 9.36905 5.22144C9.36905 5.77144 9.28731 6.29019 9.12382 6.77769C8.96033 7.26519 8.73846 7.69644 8.4582 8.07144L12.8723 12.7964L11.8914 13.8464ZM4.81477 8.59644C5.6906 8.59644 6.43516 8.26844 7.04847 7.61244C7.66131 6.95594 7.96773 6.15894 7.96773 5.22144C7.96773 4.28394 7.66131 3.48694 7.04847 2.83044C6.43516 2.17444 5.6906 1.84644 4.81477 1.84644C3.93895 1.84644 3.19439 2.17444 2.58108 2.83044C1.96823 3.48694 1.66181 4.28394 1.66181 5.22144C1.66181 6.15894 1.96823 6.95594 2.58108 7.61244C3.19439 8.26844 3.93895 8.59644 4.81477 8.59644Z"
                                    fill="#9E9E9E" />
                            </svg>
                        </span>
                    </div>
                </div>

            </nav>

            <img src="/img/remove.svg" alt="Remover" class="w-[1.2rem] h-[1.2rem] mx-[20px] my-auto cursor-pointer " />

        </header>


        {{-- Formulário --}}

      <x-alert/>

        <form action={{ route('task.store') }} method="post" onSubmit=""
            class="flex flex-col gap-4 p-5 justify-center items-center content-center">
            {{--  {/* Formulário Para Criar Tarefas */} --}}

           @include('partials.form')
            <button type="submit" class="p-2.5 bg-yellow-500 w-[392px] text-gray-100 hover:shadow-sm cursor-pointer font-sans">Guardar</button>

        </form>

        {{-- main --}}
        <div class="flex flex-wrap">
            {{-- Tasks --}}

            @foreach ($tasks->items() as $task)
                <div
                    class="card flex flex-col gap-2 bg-white w-[390px] h-[437.59px] shadow-gray-400 shadow mx-auto my-10 rounded-lg">
                    <div class="card-header flex justify-between border-b">
                        <h1 class="p-5 text-sm font-bold leading-[17.19px] text-left "> {{ $task->title }} </h1>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="my-auto mx-5 cursor-pointer">
                            <path
                                d="M7.47998 7.50375L2.32617 8.29666L6.88529 11.9638L5.69595 17.5141L9.85865 14.3425L15.0125 17.5141L13.6249 11.9638L17.4903 8.29666L12.2373 7.50375L9.85865 2.34995L7.47998 7.50375Z"
                                fill="#FFA000" />
                            <path
                                d="M9.93799 13.7112L6.29971 15.9077L7.25766 11.7662L4.04514 8.97947L8.28335 8.62145L9.93799 4.71223L11.5926 8.62145L15.8308 8.97947L12.6183 11.7662L13.5763 15.9077M19.6143 7.76026L12.657 7.17001L9.93799 0.754639L7.21896 7.17001L0.261719 7.76026L5.53529 12.3371L3.95805 19.1396L9.93799 15.5303L15.9179 19.1396L14.331 12.3371L19.6143 7.76026Z"
                                fill="#455A64" />
                        </svg>
                    </div>
                    <div class="card-body flex-1 px-5 ">
                        <p
                            class=" w-[327.98px]  h-[ 29.07px] left-[128.28px] top-[282.45px] font-normal not-italic text-sm leading-4">
                            {{ $task->description }}</p>
                    </div>
                    <div class="card-footer p-2 flex justify-between items-center border-t">
                        <div class="flex gap-2 items-center">

                            <span class="cursor-pointer pl-2.5">
                                <a href={{ route('task.edit', $task->id)  }}>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-[1.2rem] h-[1.2rem] my-auto cursor-pointer">
                                        <path
                                            d="M13.9443 9.16667L14.8321 10.0544L6.25656 18.6111H5.38767V17.7422L13.9443 9.16667ZM17.3443 3.5C17.1082 3.5 16.8627 3.59444 16.6832 3.77389L14.9549 5.50222L18.4966 9.04389L20.2249 7.31556C20.5932 6.94722 20.5932 6.33333 20.2249 5.98389L18.0149 3.77389C17.826 3.585 17.5899 3.5 17.3443 3.5ZM13.9443 6.51278L3.49878 16.9583V20.5H7.04045L17.486 10.0544L13.9443 6.51278Z"
                                            fill="#51646E" />
                                    </svg>
                                </a>
                            </span>
                            @if ($task->status == 'p')
                                <p class="text-xs font-normal leading-4 text-red-600"> pendente </p>
                            @endif
                            @if ($task->status == 'a')
                                <p class="text-xs font-normal leading-4 text-yellow-600">Em Andamento </p>
                            @endif
                            @if ($task->status == 'c')
                                <p class="text-xs font-normal leading-4 text-green-600"> Concluido </p>
                            @endif
                        </div>
                        <div class="flex gap-2 items-center">
                            <p class="text-xs font-normal leading-4"> data vencimento: {{ $task->due_date }} </p>

                            </p>
                            <form action={{ route('task.destroy', $task->id) }} method="post"
                                class="flex items-center">
                                @csrf()
                                @method('DELETE')
                                @if ($task->status == 'p')
                                    <button type="submit"><img src="/img/remove.svg" alt="Remover"
                                            class="text-red-500" />
                                    </button>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach

            {{-- end Task --}}

        </div>

        <x-pagination :paginator="$tasks" :appends="$filters"/>


    </div>
</body>

</html>
