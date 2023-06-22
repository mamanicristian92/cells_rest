<div class="w-full">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-blue-100">
            <tr>
                @foreach ($fields as $field)
                    <th scope="col" class="px-2 py-4 text-center">
                        {{ __($field) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td scope="row" class="px-2 py-2 font-normal text-gray-500 whitespace-nowrap text-center">
                        {{ $user->id }}
                    </td>
                    <td scope="row" class="px-2 py-2 font-normal text-gray-900 whitespace-nowrap text-center">
                        {{ $user->name??'' }}
                    </td>
                    <td scope="row" class="px-2 py-2 font-normal text-gray-900 whitespace-nowrap text-center">
                        {{ $user->user_type->name??'' }}
                    </td>
                    <td scope="row" class="px-2 py-2 font-normal text-gray-900 whitespace-nowrap text-center">
                        {{ $user->country->name??'' }}
                    </td>
                    <td scope="row" class="px-2 py-2 font-normal text-gray-900 whitespace-nowrap text-center">
                        {{ $user->email??'' }}
                    </td>
                    <td class="py-2 text-center">
                        <button data-tooltip-target="tooltip-view" type="button" wire:click="view({{$user->id}})"
                            class="focus:bg-blue-400 text-white bg-blue-500 hover:bg-blue-400 focus:outline-none font-normal rounded-none text-sm px-1.5 py-1.5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </button>
                        <div id="tooltip-view" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{__('View')}}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-edit" type="button" wire:click="edit({{$user->id}})"
                            class="focus:bg-blue-400 text-white bg-blue-500 hover:bg-blue-400 focus:outline-none font-normal rounded-none text-sm px-1.5 py-1.5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <div id="tooltip-edit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{__('Edit')}}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-delete" type="button" wire:click="delete({{$user->id}})"
                            class="focus:bg-blue-400 text-white bg-blue-500 hover:bg-blue-400 focus:outline-none font-normal rounded-none text-sm px-1.5 py-1.5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                        <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{__('Delete')}}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mr-6 my-2">
        {{ $users->links() }}
    </div>
</div>
