<form wire:submit.prevent="uploadDoc" enctype="multipart/form-data">
  
    <div class="form-group">
        <input type="file" class="form-control" wire:model="doc">
        @error('doc') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <button type="submit" class="btn btn-primary">Upload</button>
</form>