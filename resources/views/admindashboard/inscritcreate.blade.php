
@extends('layouts.app2')

@section('content')



<style>

.modern-form {
    --primary: #3b82f6;
    --primary-dark: #2563eb;
    --primary-light: rgba(59, 130, 246, 0.1);
    --success: #10b981;
    --text-main: #1e293b;
    --text-secondary: #64748b;
    --bg-input: #f8fafc;

    position: relative;
    width: 350px;
    height: 380px;
    padding: 24px;
    margin: auto;
    background: #ffffff;
    border-radius: 16px;
    box-shadow:
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -2px rgba(0, 0, 0, 0.05),
        inset 0 0 0 1px rgba(148, 163, 184, 0.1);
    font-family:
        system-ui,
        -apple-system,
        sans-serif;
        margin-left: 600px;
        margin-top: 120px;
}

.form-title {
    font-size: 22px;
    font-weight: 600;
    color: var(--text-main);
    margin: 0 0 24px;
    text-align: center;
    letter-spacing: -0.01em;
}

.input-group {
    margin-bottom: 16px;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.form-input {
    width: 100%;
    height: 40px;
    padding: 0 36px;
    font-size: 14px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background: var(--bg-input);
    color: var(--text-main);
    transition: all 0.2s ease;
    width: 280px;
}


.form-input::placeholder {
    color: var(--text-secondary);
}

.input-icon {
    position: absolute;
    left: 12px;
    width: 16px;
    height: 16px;
    color: var(--text-secondary);
    pointer-events: none;
}

.password-toggle {
    position: absolute;
    right: 12px;
    display: flex;
    align-items: center;
    padding: 4px;
    background: none;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.eye-icon {
    width: 16px;
    height: 16px;
}


.submit-button {
    position: relative;
    width: 100%;
    height: 40px;
    margin-top: 8px;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.2s ease;
}

.button-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent);
    transform: translateX(-100%);
    transition: transform 0.5s ease;
}

.form-footer {
    margin-top: 16px;
    text-align: center;
    font-size: 13px;
}



/* Hover & Focus States */
.form-input:hover {
    border-color: #cbd5e1;
}

select:hover {
    border-color:#2563eb;

}



.form-input:focus {
    outline: none;
    border-color: var(--primary);
    background: white;
    box-shadow: 0 0 0 4px var(--primary-light);
}

select:focus{
    outline: none;
    border-color: var(--primary);
    background: white;
    box-shadow: 0 0 0 4px var(--primary-light);


}

.password-toggle:hover {
    color: var(--primary);
    transform: scale(1.1);
}

.submit-button:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow:
        0 4px 12px rgba(59, 130, 246, 0.25),
        0 2px 4px rgba(59, 130, 246, 0.15);
}

.submit-button:hover .button-glow {
    transform: translateX(100%);
}

/* Active States */
.submit-button:active {
    transform: translateY(0);
    box-shadow: none;
}

.password-toggle:active {
    transform: scale(0.9);
}

/* Validation States */
.form-input:not(:placeholder-shown):valid {
    border-color: var(--success);
}

select:not(:placeholder-shown):valid {
    border-color: var(--success);
}



.form-input:not(:placeholder-shown):valid~.input-icon {
    color: var(--success);
}

/* Animation */
@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    25% {
        transform: translateX(-4px);
    }

    75% {
        transform: translateX(4px);
    }
}

.form-input:not(:placeholder-shown):invalid {
    border-color: #ef4444;
    animation: shake 0.2s ease-in-out;
}

.form-input:not(:placeholder-shown):invalid~.input-icon {
    color: #ef4444;
}
</style>




<form method="POST" action="{{ route('inscritadmin') }}"  class="modern-form">
    @csrf

    @if ( session('success'))
        <span class="alert alert-success">{{ session('success') }}</span>    
    @endif

    @if (session('error'))
        <span class="alert alert-danger">{{ session('error') }}</span>    
    @endif


    <div class="form-body">

        {{-- Nom --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <circle stroke-width="1.5" stroke="currentColor" r="4" cy="8" cx="12"></circle>
                    <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor"
                        d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"></path>
                </svg>
                <input name="nom" value="{{ old('nom') }}" required placeholder="Nom" class="form-input" type="text" />
            </div>
        </div>
        @error('nom')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        {{-- Prénom --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <circle stroke-width="1.5" stroke="currentColor" r="4" cy="8" cx="12"></circle>
                    <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor"
                        d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"></path>
                </svg>
                <input name="prenom" value="{{ old('prenom') }}" required placeholder="prenom" class="form-input" type="text" />
            </div>
        </div>
        @error('prenom')
            <span class="text-danger">{{ $message }}</span>
        @enderror


          <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <path stroke-width="1.5" stroke="currentColor"
                        d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z">
                    </path>
                </svg>
                <input name="email" value="{{ old('email') }}" required placeholder="Email" class="form-input" type="email" />
            </div>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        
        <div class="input-group">
            <div class="input-wrapper">
               
                <input name="annee" value="{{ old('annee') }}" required placeholder="Année académique" class="form-input" type="text" />
            </div>
        </div>
        @error('annee')
            <span class="text-danger">{{ $message }}</span>
        @enderror

    
    </div>

      <div class="input-group">
            <div class="input-wrapper">
               
                <input name="tel" value="{{ old('tel') }}" required placeholder="Télephone" class="form-input" type="tel" />
            </div>
        </div>
        @error('tel')
            <span class="text-danger">{{ $message }}</span>
        @enderror

         <div class="input-group">
            <div class="input-wrapper">
                <select class="form-select"      name="niveau" required style="width: 350px; height: 42px; border-radius: 7px; color:grey;">
                    <option value="">Niveau</option>
                    <option value="L1" {{ old('niveau') == 'L1' ? 'selected' : '' }}>L1</option>
                    <option value="L2" {{ old('niveau') == 'L2' ? 'selected' : '' }}>L2</option>
                    <option value="L3" {{ old('niveau') == 'L3' ? 'selected' : '' }}>L3</option>
                  
                </select>
            </div>
        </div>
        @error('niveau')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        {{-- Email --}}


   
<button class="submit-button" type="submit">
        <span class="button-text">Inscrit</span>
        <div class="button-glow"></div>
    </button>
</form>
    


    
    

    



@endsection