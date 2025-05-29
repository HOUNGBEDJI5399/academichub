
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
            height: 520px;
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
        
            font-size: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: var(--bg-input);
            color: var(--text-main);
            transition: all 0.2s ease;
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

    </style>


  <form method="POST" action="{{route('matiereadmin')}}" class="modern-form">
  @csrf

  
    @if (session('success'))
     <span  class="alert alert-success">{{ session('success')}}</span>    
    @endif

    @if (session('error'))
    <span class="alert alert-success" >{{ session('error')}}</span>    
   @endif
    <div class="form-title">Ajout Matière</div>

    

    <div class="form-body">
        {{-- Nom Professeur --}}
        <div class="input-group">
            <div class="input-wrapper">
                <input name="nom_prof" value="{{ old('nom_prof') }}" required placeholder="Nom-prof" class="form-input" type="text" />
                @error('nom_prof')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Nom Matière --}}
        <div class="input-group">
            <div class="input-wrapper">
                <input name="nom_matiere" value="{{ old('nom_matiere') }}" required placeholder="Nom-matière" class="form-input" type="text" />
                @error('nom_matiere')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Année --}}
        <div class="input-group">
            <div class="input-wrapper">
                <select name="niveau" required style="width: 350px; height: 42px; border-radius: 7px; color:grey;">
                    <option value="">Choisir une année</option>
                    <option value="L1" {{ old('niveau') == 'L1' ? 'selected' : '' }}>Licence 1</option>
                    <option value="L2" {{ old('niveau') == 'L2' ? 'selected' : '' }}>Licence 2</option>
                    <option value="L3" {{ old('niveau') == 'L3' ? 'selected' : '' }}>Licence 3</option>
                </select>
                @error('niveau')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- UE --}}
        <div class="input-group">
            <div class="input-wrapper">
                <select name="ue" required style="width: 350px; height: 42px; border-radius: 7px; color:grey;">
                    <option value="">UE</option>
                    <option value="Fondamentaux de l'Informatique" {{ old('ue') == "Fondamentaux de l'Informatique" ? 'selected' : '' }}>Fondamentaux de l'Informatique</option>
                    <option value="Infrastructure Réseaux" {{ old('ue') == "Infrastructure Réseaux" ? 'selected' : '' }}>Infrastructure Réseaux</option>
                    <option value="Développement Web" {{ old('ue') == "Développement Web" ? 'selected' : '' }}>Développement Web</option>
                    <option value="Langue et Communication professionnelle" {{ old('ue') == "Langue et Communication professionnelle" ? 'selected' : '' }}>Langue et Communication professionnelle</option>
                    <option value="Mathématique" {{ old('ue') == "Mathématique" ? 'selected' : '' }}>Mathématique</option>
                </select>
                @error('ue')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- Bouton d'envoi --}}
    <button class="submit-button" type="submit">
        <span class="button-text">Envoyer</span>
        <div class="button-glow"></div>
    </button>
</form>


@endsection