<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @else

    @endif
    <form wire:submit.prevent="submit">
        {{-- In work, do what you enjoy. --}}
        <livewire:dropzone wire:model="photos" :rules="['image', 'mimes:png,jpeg,jpg,webp', 'max:10420']" :multiple="true" />
        <button class="btn btn-info bg-info" type="submit">Salvar</button>
    </form>
</div>