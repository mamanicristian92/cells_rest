<div>
    <div class="bg-white text-black text-xl p-3 pb-0">Usuarios</div>
    <div class="bg-white flex justify-between items-center">
        <div class="w-4/12 p-2 m-2">
            @include('livewire.users.search')
        </div>
        <div>
            <button type="button"
                wire:click="create()"
                class="text-white bg-[#1890ff] hover:bg-[#4fabff] focus:outline-none font-medium rounded-sm text-sm p-2 text-center m-2">
                Nuevo Usuario
            </button>
        </div>
    </div>
    <div class="w-full flex-row">
        <div class="w-full p-4">
            <div class="flex flex-row">
                @include('livewire.users.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <x-dialog-modal wire:model="modal_create">
        <x-slot name="title">Crear Usuario</x-slot>
        <x-slot name="content">
            @include('livewire.users.edit_view')
        </x-slot>
        <x-slot name="footer">
            <div class="w-full">
                <button type="button" wire:click="store()"
                    class="text-white bg-[#1890ff] hover:bg-[#4fabff] focus:outline-none font-medium text-sm p-2 text-center mr-8">
                        {{__('Save')}}
                </button>
                <button type="button" wire:click="closeModalCreate()"
                    class="text-gray-500 bg-transparent hover:bg-gray-200 focus:outline-none font-medium border border-gray-300 text-sm p-2 text-center">
                        {{__('Close')}}
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="modal_edit">
        <x-slot name="title">Editar Usuario {{$user_id??''}}</x-slot>
        <x-slot name="content">
            @include('livewire.users.edit_view')
        </x-slot>
        <x-slot name="footer">
            <div class="w-full">
                <button type="button" wire:click="update()"
                    class="text-white bg-[#1890ff] hover:bg-[#4fabff] focus:outline-none font-medium text-sm p-2 text-center mr-8">
                        {{__('Save')}}
                </button>
                <button type="button" wire:click="closeModalEdit()"
                    class="text-gray-500 bg-transparent hover:bg-gray-200 focus:outline-none font-medium border border-gray-300 text-sm p-2 text-center">
                        {{__('Close')}}
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="modal_view">
        <x-slot name="title">Venta</x-slot>
        <x-slot name="content">
            @include('livewire.users.edit_view')
        </x-slot>
        <x-slot name="footer">
            <button type="button" wire:click="closeModalView()"
                class="text-gray-500 bg-transparent hover:bg-gray-200 focus:outline-none font-medium border border-gray-300 text-sm p-2 text-center">
                    {{__('Close')}}
            </button>
        </x-slot>
    </x-dialog-modal>
</div>