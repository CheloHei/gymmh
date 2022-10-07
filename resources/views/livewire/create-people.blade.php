<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear Nuevo persona
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar persona
        </x-slot>
        <x-slot name="content">


            <div class="mb-4">
                <x-jet-label value="Nombre y apellido" />
                <x-jet-input type="text" class="w-full @error('names') is-invalid @enderror"
                    wire:model.defer="names" />
                @error('names')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Inscripción fecha" />
                <x-jet-input type="date" class="w-full @error('inscription') is-invalid @enderror"
                    wire:model.defer="inscription" />
                @error('inscription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Nacimiento" />
                <x-jet-input type="date" class="w-full @error('born') is-invalid @enderror"
                    wire:model.defer="born" />
                @error('born')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Edad" />
                <x-jet-input type="text" class="w-full @error('age') is-invalid @enderror"
                    wire:model.defer="age" />
                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Celular" />
                <x-jet-input type="text" class="w-full @error('phone') is-invalid @enderror"
                    wire:model.defer="phone" />
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('open')">Cancelar</x-jet-danger-button>
            <x-jet-secondary-button wire:click="save">Crear</x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
