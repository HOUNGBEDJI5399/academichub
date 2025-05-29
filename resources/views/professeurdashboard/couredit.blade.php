
@extends('layouts.app2')

@section('content')


<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6e8efb, #4473e6);
    }
    
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(78, 115, 223, 0.25);
    }
    
    .card-header {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        font-weight: 600;
        letter-spacing: 0.5px;
        padding: 1.25rem 1.5rem;
        font-size: 1.1rem;
        border-bottom: none;
    }
    
    /* Form styling */
    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        transition: all 0.3s;
        border: 2px solid #e9ecef;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #5a5c69;
    }
    
    /* Button styling */
    .btn-primary {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #3a5fd9, #1a3ba8);
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.6);
    }
    
    /* File input styling */
    .file-upload {
        position: relative;
        overflow: hidden;
        margin-top: 10px;
        border: 2px dashed #4e73df;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s;
        background-color: rgba(78, 115, 223, 0.05);
    }
    
    .file-upload:hover {
        background-color: rgba(78, 115, 223, 0.1);
    }
    
    .file-upload i {
        font-size: 48px;
        color: #4e73df;
        margin-bottom: 15px;
    }
    
    .file-upload-text {
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 5px;
    }
    
    .file-upload input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: pointer;
        display: block;
    }
    
    /* Error styling */
    .invalid-feedback {
        color: #e74a3b;
        font-weight: 500;
    }
    
    /* Form group spacing */
    .form-group {
        margin-bottom: 25px;
    }
    
    /* Card body padding */
    .card-body {
        padding: 30px;
    }
    
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
</style>

<div class="container py-5 animate-fade-in">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i> Modifier le cours
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('courupdate', $cour->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom_cours">
                                <i class="fas fa-pencil-alt me-2"></i>Nom du cour
                            </label>
                            <input type="text" class="form-control @error('nom_cour') is-invalid @enderror" 
                                id="nom_cour" name="nom_cour" value="{{ old('nom_cour', $cour->nom_cour) }}" 
                                required>
                            @error('nom_cour')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categorie">
                                <i class="fas fa-layer-group me-2"></i>Catégorie
                            </label>
                            <select class="form-select @error('categorie') is-invalid @enderror" 
                                id="categorie" name="categorie" required>
                                <option value="">Sélectionner une catégorie</option>
                                <option value="L1" {{ old('categorie', $cour->categorie) == 'L1' ? 'selected' : '' }}>Licence 1</option>
                                <option value="L2" {{ old('categorie', $cour->categorie) == 'L2' ? 'selected' : '' }}>Licence 2</option>
                                <option value="L3" {{ old('categorie', $cour->categorie) == 'L3' ? 'selected' : '' }}>Licence 3</option>
                            </select>
                            @error('categorie')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>
                                <i class="fas fa-file-upload me-2"></i>fichier
                            </label>
                            <div class="file-upload">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p class="file-upload-text">Glissez-déposez vos fichiers ici</p>
                                <p class="text-muted">ou cliquez pour sélectionner des fichiers</p>
                                <input type="file" class="@error('fichier') is-invalid @enderror" 
                                    id="fichier" name="fichier" multiple>
                            </div>
                            <small class="form-text text-muted mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Vous pouvez ajouter de nouveaux fichiers (les anciens seront conservés).
                            </small>
                            @error('fichier')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Mettre à jour le cours
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('documents').addEventListener('change', function(e) {
        const fileCount = e.target.files.length;
        const uploadText = document.querySelector('.file-upload-text');

        if (fileCount > 0) {
            uploadText.textContent = fileCount + (fileCount > 1 ? ' fichiers sélectionnés' : ' fichier sélectionné');
            uploadText.classList.add('text-primary');
            document.querySelector('.file-upload').style.borderColor = '#4e73df';
            document.querySelector('.file-upload i').classList.remove('fa-cloud-upload-alt');
            document.querySelector('.file-upload i').classList.add('fa-check-circle');
        } else {
            uploadText.textContent = 'Glissez-déposez vos fichiers ici';
            uploadText.classList.remove('text-primary');
        }
    });
</script>

@endsection
