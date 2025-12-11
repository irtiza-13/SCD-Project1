@extends('layouts.app')

@section('title', 'Add New Game Subscription')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-plus-circle mr-2"></i>Add New Game Subscription
            </h6>
            <a href="{{ route('game-subscriptions.admin.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('game-subscriptions.store') }}" method="POST">
                @csrf
                
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
                                   value="{{ old('name') }}" 
                                   placeholder="e.g., Premium Gaming Pass"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Enter a descriptive name for the subscription</small>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category" class="font-weight-bold">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" 
                                    id="category" 
                                    name="category" 
                                    required>
                                <option value="">-- Select Category --</option>
                                <option value="MMORPG" {{ old('category') == 'MMORPG' ? 'selected' : '' }}>MMORPG</option>
                                <option value="FPS" {{ old('category') == 'FPS' ? 'selected' : '' }}>First Person Shooter</option>
                                <option value="MOBA" {{ old('category') == 'MOBA' ? 'selected' : '' }}>MOBA</option>
                                <option value="Battle Royale" {{ old('category') == 'Battle Royale' ? 'selected' : '' }}>Battle Royale</option>
                                <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                                <option value="Racing" {{ old('category') == 'Racing' ? 'selected' : '' }}>Racing</option>
                                <option value="Strategy" {{ old('category') == 'Strategy' ? 'selected' : '' }}>Strategy</option>
                                <option value="Simulation" {{ old('category') == 'Simulation' ? 'selected' : '' }}>Simulation</option>
                                <option value="Adventure" {{ old('category') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                                <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
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
                                       value="{{ old('price') }}" 
                                       placeholder="0.00"
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Enter the subscription price in USD</small>
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
                                       value="{{ old('duration_days', '30') }}" 
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text">days</span>
                                </div>
                                @error('duration_days')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">How many days does this subscription last?</small>
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
                                       value="{{ old('max_players') }}" 
                                       placeholder="Leave empty for unlimited">
                                <div class="input-group-append">
                                    <span class="input-group-text">players</span>
                                </div>
                                @error('max_players')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Maximum number of players allowed. Leave empty for unlimited.</small>
                        </div>

                        <!-- Image URL -->
                        <div class="form-group">
                            <label for="image_url" class="font-weight-bold">Image URL</label>
                            <input type="url" 
                                   class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" 
                                   name="image_url" 
                                   value="{{ old('image_url') }}" 
                                   placeholder="https://example.com/game-image.jpg">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Enter a direct link to the game image</small>
                            
                            <!-- Image Preview -->
                            <div class="mt-2" id="image-preview-container" style="display: none;">
                                <label class="font-weight-bold">Image Preview:</label>
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
                                               {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_featured">
                                            Featured Subscription
                                        </label>
                                        <small class="form-text text-muted d-block">Show this subscription as featured</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Active Status
                                        </label>
                                        <small class="form-text text-muted d-block">Show this subscription on website</small>
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
                              rows="4" 
                              placeholder="Describe the subscription features, benefits, and what users will get...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Describe the subscription in detail. This will be shown to users.</small>
                </div>

                <!-- Form Actions -->
                <div class="form-group mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-save mr-2"></i>Create Subscription
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg ml-2">
                                <i class="fas fa-redo mr-2"></i>Reset Form
                            </button>
                        </div>
                        <a href="{{ route('game-subscriptions.admin.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image URL preview
    document.getElementById('image_url').addEventListener('change', function() {
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');
        const url = this.value;
        
        if (url) {
            previewImage.src = url;
            previewContainer.style.display = 'block';
            
            // Check if image loads successfully
            previewImage.onload = function() {
                previewImage.style.display = 'block';
            };
            
            previewImage.onerror = function() {
                previewImage.style.display = 'none';
                previewContainer.innerHTML = '<div class="alert alert-warning mt-2">Image not found or URL is invalid</div>';
            };
        } else {
            previewContainer.style.display = 'none';
        }
    });
    
    // Set default duration to 30 if empty
    document.getElementById('duration_days').addEventListener('blur', function() {
        if (!this.value || this.value < 1) {
            this.value = 30;
        }
    });
    
    // Set default price validation
    document.getElementById('price').addEventListener('blur', function() {
        if (!this.value || this.value < 0) {
            this.value = 0;
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
</style>
@endsection