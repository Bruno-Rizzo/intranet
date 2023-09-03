<div>
    <div class="card mt-3">
        <div class="card-header">
            Livewire
        </div>
        <div class="card-body">
            <div class="form-group">
                <form wire:submit.prevent="uploadImage">
                    <label>Imagem</label>
                    <div class="custom-file">
                        <input type="file" class="form-control-file" wire:model="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if ($image)
                        <img src="{{$image->temporaryUrl()}}" width="80px">
                    @endif

                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
