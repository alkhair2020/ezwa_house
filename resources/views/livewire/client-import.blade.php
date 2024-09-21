<div>
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        <input type="file" wire:model="file">
        @error('file') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Import Clients</button>
    </form>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>