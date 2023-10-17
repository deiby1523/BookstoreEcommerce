<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('category.create') }}" style="float: right">Create new category</a>
                        <br><br>
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Nombre</th>
                                <th scope="col" class="px-6 py-4">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse ($categories as $category)

                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4">{{$category->nombre}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <form method="POST" action="{{ route('category.delete',$category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            </form></td>
                                    </tr>

                            @empty
                                <p>No categories</p>
                            @endforelse

                            <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
