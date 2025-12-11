@extends('layouts.app')

@section('title', 'Edit Game Subscription')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-edit mr-2"></i>Edit Game Subscription: {{ $gameSubscription->name }}
            </h6>
            <a href="{{ route('game-subscriptions.admin.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('game-subscriptions.update', $gameSubscription) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Current Image Preview -->
                @if($gameSubscription->image_url)
                <div class="form-group">
                    <label class="font-weight-bold">Current Image:</label>
                    <div class="border rounded p-2 mt-1">
                        <img src="{{ $gameSubscription->image_url }}" 
                             alt="{{ $gameSubscription->name }}" 
                             class="img-fluid rounded" 
                             style="max-height: 150px;">
                        <div class="mt-2">
                            <small class="text-muted">Current image URL: {{ $gameSubscription->image_url }}</small>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Subscription Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $gameSubscription->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category" class="font-weight-bold">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" 
                                    id="category" 
                                    name="category" 
                                    required>
                                <option value="">-- Select Category --</option>
                                <option value="MMORPG" {{ old('category', $gameSubscription->category) == 'MMORPG' ? 'selected' : '' }}>MMORPG</option>
                                <option value="FPS" {{ old('category', $gameSubscription->category) == 'FPS' ? 'selected' : '' }}>First Person Shooter</option>
                                <option value="MOBA" {{ old('category', $gameSubscription->category) == 'MOBA' ? 'selected' : '' }}>MOBA</option>
                                <option value="Battle Royale" {{ old('category', $gameSubscription->category) == 'Battle Royale' ? 'selected' : '' }}>Battle Royale</option>
                                <option value="Sports" {{ old('category', $gameSubscription->category) == 'Sports' ? 'selected' : '' }}>Sports</option>
                                <option value="Racing" {{ old('category', $gameSubscription->category) == 'Racing' ? 'selected' : '' }}>Racing</option>
                                <option value="Strategy" {{ old('category', $gameSubscription->category) == 'Strategy' ? 'selected' : '' }}>Strategy</option>
                                <option value="Simulation" {{ old('category', $gameSubscription->category) == 'Simulation' ? 'selected' : '' }}>Simulation</option>
                                <option value="Adventure" {{ old('category', $gameSubscription->category) == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                                <option value="Other" {{ old('category', $gameSubscription->category) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Price ($) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" 
                                       step="0.01" 
                                       min="0" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price', $gameSubscription->price) }}" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="form-group">
                            <label for="duration_days" class="font-weight-bold">Duration (Days) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" 
                                       min="1" 
                                       class="form-control @error('duration_days') is-invalid @enderror" 
                                       id="duration_days" 
                                       name="duration_days" 
                                       value="{{ old('duration_days', $gameSubscription->duration_days) }}" 
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text">days</span>
                                </div>
                                @error('duration_days')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Max Players -->
                        <div class="form-group">
                            <label for="max_players" class="font-weight-bold">Maximum Players</label>
                            <div class="input-group">
                                <input type="number" 
                                       min="1" 
                                       class="form-control @error('max_players') is-invalid @enderror" 
                                       id="max_players" 
                                       name="max_players" 
                                       value="{{ old('max_players', $gameSubscription->max_players) }}" 
                                       placeholder="Leave empty for unlimited">
                                <div class="input-group-append">
                                    <span class="input-group-text">players</span>
                                </div>
                                @error('max_players')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image URL -->
                        <div class="form-group">
                            <label for="image_url" class="font-weight-bold">Image URL</label>
                            <input type="url" 
                                   class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" 
                                   name="image_url" 
                                   value="{{ old('image_url', $gameSubscription->image_url) }}" 
                                   placeholder="https://example.com/game-image.jpg">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            <!-- New Image Preview -->
                            <div class="mt-2" id="image-preview-container" style="display: none;">
                                <label class="font-weight-bold">New Image Preview:</label>
                                <div class="border rounded p-2 mt-1">
                                    <img id="image-preview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>

                        <!-- Status Switches -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="is_featured" 
                                               name="is_featured" 
                                               value="1"
                                               {{ old('is_featured', $gameSubscription->is_featured) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_featured">
                                            Featured Subscription
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', $gameSubscription->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Active Status
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description (Full Width) -->
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4">{{ old('description', $gameSubscription->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-group mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i>Update Subscription
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg ml-2" onclick="resetForm()">
                                <i class="fas fa-undo mr-2"></i>Reset Changes
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('game-subscriptions.admin.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times mr-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Delete Form -->
            <div class="mt-4 pt-3 border-top">
                <div class="alert alert-danger">
                    <h5 class="alert-heading">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Danger Zone
                    </h5>
                    <p class="mb-2">Once you delete this subscription, there is no going back. Please be certain.</p>
                    <form action="{{ route('game-subscriptions.destroy', $gameSubscription) }}" 
                          method="POST" 
                          class="d-inline"
                          onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-2"></i>Delete This Subscription
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image URL preview
    document.getElementById('image_url').addEventListener('input', function() {
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');
        const url = this.value;
        const currentImage = '{{ $gameSubscription->image_url }}';
        
        if (url && url !== currentImage) {
            previewImage.src = url;
            previewContainer.style.display = 'block';
            
            previewImage.onload = function() {
                previewImage.style.display = 'block';
            };
            
            previewImage.onerror = function() {
                previewImage.style.display = 'none';
                previewContainer.innerHTML = '<div class="alert alert-warning mt-2">⚠️ Cannot load image from this URL</div>';
            };
        } else {
            previewContainer.style.display = 'none';
        }
    });
    
    // Reset form to original values
    function resetForm() {
        if (confirm('Are you sure you want to reset all changes?')) {
            // Store original values
            const originalValues = {
                name: '{{ $gameSubscription->name }}',
                category: '{{ $gameSubscription->category }}',
                price: '{{ $gameSubscription->price }}',
                duration_days: '{{ $gameSubscription->duration_days }}',
                max_players: '{{ $gameSubscription->max_players }}',
                image_url: '{{ $gameSubscription->image_url }}',
                description: `{{ $gameSubscription->description }}`,
                is_featured: {{ $gameSubscription->is_featured ? 'true' : 'false' }},
                is_active: {{ $gameSubscription->is_active ? 'true' : 'false' }}
            };
            
            // Reset form fields
            document.getElementById('name').value = originalValues.name;
            document.getElementById('category').value = originalValues.category;
            document.getElementById('price').value = originalValues.price;
            document.getElementById('duration_days').value = originalValues.duration_days;
            document.getElementById('max_players').value = originalValues.max_players;
            document.getElementById('image_url').value = originalValues.image_url;
            document.getElementById('description').value = originalValues.description.replace(/&quot;/g, '"');
            document.getElementById('is_featured').checked = originalValues.is_featured;
            document.getElementById('is_active').checked = originalValues.is_active;
            
            // Hide new image preview
            document.getElementById('image-preview-container').style.display = 'none';
            
            // Show success message
            alert('Form has been reset to original values!');
        }
    }
    
    // Delete confirmation
    function confirmDelete() {
        const subscriptionName = '{{ $gameSubscription->name }}';
        return confirm(`⚠️ WARNING: You are about to delete "${subscriptionName}".\n\nThis action cannot be undone. Are you absolutely sure?`);
    }
    
    // Initialize image preview if editing URL
    document.addEventListener('DOMContentLoaded', function() {
        const imageUrlInput = document.getElementById('image_url');
        if (imageUrlInput.value && imageUrlInput.value !== '{{ $gameSubscription->image_url }}') {
            imageUrlInput.dispatchEvent(new Event('input'));
        }
    });
</script>
@endpush

<style>
    .form-control:focus, .custom-control-input:focus ~ .custom-control-label::before {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .custom-switch .custom-control-label::before {
        border-color: #adb5bd;
    }
    
    .custom-switch .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
@endsection