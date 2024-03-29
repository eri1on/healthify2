@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="form-container">
    <h2>Recipe Edit</h2>
    <form  method="POST"  wire:submit.prevent="updateRecipe">
        <div class="form-group">
            <label for="title">Title:</label>    @error('title') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <input wire:model="title"type="text" id="title" name="title"  >
        </div>

        <div class="form-group">
            <label for="description">Description:</label>   @error('description') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <textarea wire:model="description"id="description" name="description" rows="4"  ></textarea>
        </div>

        <div class="form-group">
            <label for="image">Current Image:</label>
            @if ($currentImage)
                <img src="{{ asset('storage/' . $currentImage) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
            @else
                <p>No image selected.</p>
            @endif
        </div>

        <div class="form-group">
            <label for="image">New Image:</label>
            <input wire:model="image" type="file" id="image" name="image">
            @error('image') <span class="error" style="color:red">{{ $message }}</span> @enderror
        </div>
        
        <div class="form-group">
            <button type="submit">UPDATE</button>
        </div>
    </form>
</div>
