<div class="card-body">
    {{-- <x-app-layout> --}}
    @livewire('create-people')
    <hr>
    <label for="">Filtrar</label>
    <input type="text" class="form-control" placeholder="Busque por nombre o email" wire:model="search">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre y apellido</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Nacimiento</th>
                <th>Inscripción</th>
                <th>Medidas</th>


                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($peoples->count())
                @foreach ($peoples as $item)
                    <tr>
                        <td>{{ $item->id }}</td>

                        <td>{{ $item->names }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->born }}</td>
                        <td>{{ $item->inscription }}</td>
                        <td><button wire:click="seeMeasures({{ $item }})">Ver medidas</button></td>
                        <td><button wire:click="seePayments({{ $item }})">Ver pagos</button></td>


                        <td>
                            <div class="inline-flex">

                                <x-jet-secondary-button wire:click="edit({{ $item }})">
                                    Editar
                                </x-jet-secondary-button>
                                <x-jet-secondary-button wire:click="openMedidas({{ $item }})">
                                    Medidas
                                </x-jet-secondary-button>
                                <x-jet-danger-button wire:click="delete({{ $item }})">
                                    X
                                </x-jet-danger-button>
                            </div>
                        </td>


                    </tr>
                @endforeach
            @else
                <p>No existen personas</p>
            @endif
        </tbody>
    </table>
    @if ($peoples->hasPages())
        @if ($peoples)
            {{ $peoples->links() }}
        @endif
    @endif


    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Editar persona
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre y Apellido" />
                <x-jet-input type="text" class="w-full" wire:model.defer="people.names" />
                @error('people.names')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Edad" />
                <x-jet-input type="text" class="w-full" wire:model.defer="people.age" />
                @error('people.age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Telefono" />
                <x-jet-input type="text" class="w-full" wire:model.defer="people.phone" />
                @error('people.phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Nacimiento" />
                <x-jet-input type="date" class="w-full" wire:model.defer="people.born" />
                @error('people.born')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Inscripción" />
                <x-jet-input type="date" class="w-full" wire:model.defer="people.inscription" />
                @error('people.inscription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('open_edit')">Cancelar</x-jet-danger-button>
            <x-jet-secondary-button wire:click="update">Editar</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="open_medidas">
        <x-slot name="title">
            Medidas
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Peso" />
                <x-jet-input type="text" class="w-full" wire:model.defer="weight" />
                @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Cintura" />
                <x-jet-input type="text" class="w-full" wire:model.defer="waist" />
                @error('waist')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="hidden" name="" wire:model="people_id">
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('open_medidas')">Cancelar</x-jet-danger-button>
            <x-jet-secondary-button wire:click="saveMedidas">Guardar</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    @if ($measures)
        <x-jet-dialog-modal wire:model="open_measures">
            <x-slot name="title">
                Medidas registradas
            </x-slot>
            <x-slot name="content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Peso</th>
                            <th>Cintura</th>
                            <th>Fecha registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($measures as $med)
                        <tr>
                            <td>{{ $med->weight . 'cm'}}</td>
                            <td>{{ $med->waist . 'cm'}}</td>
                            <td>{{ $med->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$toggle('open_measures')">Cerrar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
    {{-- @if ($payments)
        <x-jet-dialog-modal wire:model="open_payments">
            <x-slot name="title">
                Medidas registradas
            </x-slot>
            <x-slot name="content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Peso</th>
                            <th>Cintura</th>
                            <th>Fecha registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $pay)
                        <tr>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$toggle('open_measures')">Cerrar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif --}}
    {{-- </x-app-layout> --}}
</div>
