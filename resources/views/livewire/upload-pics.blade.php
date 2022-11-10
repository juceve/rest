<div class="row">
    <div class="col-12 col-md-6 form-group">
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="formFile" class="form-label">Icono de la empresa</label>
                <input class="form-control" type="file" id="formFile" wire:model="photo">
            </div>
            @error('photo') <p class="fs-6 text-danger">{{ $message }}</p> @enderror
            
        </form>
    </div>
    <div class="col-12 col-md-6">
        @if ($photo)
        {{-- <label>Vista previa:</label> --}}
        <img src="{{ $photo->temporaryUrl() }}" width="200px">
        {{-- <button type="submit" class="btn btn-info btn-sm">Save Photo</button> --}}
        @endif
    </div>

</div>