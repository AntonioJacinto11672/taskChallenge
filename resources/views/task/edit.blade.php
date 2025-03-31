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
                        <a href={{ route('task.index') }} title="Página principal"><img src="/img/logo.svg"
                                alt="Logotipo" class="cursor-pointer" /></a>
                    </div>

                    <div class="text-gray-800 text-[1rem]   leading-[16,94px]   my-auto mx-5">Task</div>

                    <div class="relative">
                        Atualizar a tarefa {{ $task->title }}
                    </div>
                </div>

            </nav>


        </header>

        {{-- Formulário --}}

        <form action={{ route('task.update', $task->id) }} method="POST"
            class="flex flex-col gap-4 p-5 justify-center items-center content-center">
            {{--  {/* Formulário Para Criar Tarefas */} --}}
            @csrf
            @method('put')
            @if ($task->status == 'p')
                @include('partials.form', ['task' => $task])
            @endif

            @if ($task->status != 'p')
                <input type="hidden" name="title" id="" placeholder="Título"
                    value='{{ $task->title ?? old('title') }}'
                    class="w-[390px] h-[45.84px] l-[443.65px]  top-[81.81px] border-none bg-white shadow-gray-400 shadow pl-2.5 outline-none text-base placeholder:font-bold placeholder:text-black" />
            @endif


            <div class="flex flex-col gap-y-2">
                <label for="" class="text-sm">Status</label>
                <select name="status" id=""
                    class="w-[392px] h-[45.84px] bg-white border-none shadow-gray-400 shadow pl-2.5 outline-none text-base placeholder:font-bold placeholder:text-black ">
                    @if ($task->status == 'p')
                        <option value="p">Pendente</option>
                    @endif
                    <option value="a">Em andamento</option>
                    <option value="c">Concluído</option>
                </select>
            </div>

            <button type="submit"
                class="p-2.5 bg-yellow-500 w-[392px] text-gray-100 hover:shadow-sm cursor-pointer font-sans">Atualizar</button>


        </form>
    </div>
</body>

</html>
