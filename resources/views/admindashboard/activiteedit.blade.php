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
            padding: 0 36px;
            font-size: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: var(--bg-input);
            color: var(--text-main);
            transition: all 0.2s ease;
        }

        .form-textarea {
            width: 100%;
            min-height: 80px;
            padding: 10px 36px;
            font-size: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: var(--bg-input);
            color: var(--text-main);
            transition: all 0.2s ease;
            resize: vertical;
            font-family: inherit;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
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

        .textarea-icon {
            position: absolute;
            left: 12px;
            top: 12px;
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
        .form-input:hover,
        .form-textarea:hover {
            border-color: #cbd5e1;
        }

        select:hover {
            border-color:#2563eb;
        }

        .form-input:focus,
        .form-textarea:focus {
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

        /* Validation States */
        .form-input:not(:placeholder-shown):valid,
        .form-textarea:not(:placeholder-shown):valid {
            border-color: var(--success);
        }

        select:not(:placeholder-shown):valid {
            border-color: var(--success);
        }

        .form-input:not(:placeholder-shown):valid~.input-icon,
        .form-textarea:not(:placeholder-shown):valid~.textarea-icon {
            color: var(--success);
        }

        /* Animation */
        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-4px);
            }
            75% {
                transform: translateX(4px);
            }
        }

        .form-input:not(:placeholder-shown):invalid,
        .form-textarea:not(:placeholder-shown):invalid {
            border-color: #ef4444;
            animation: shake 0.2s ease-in-out;
        }

        .form-input:not(:placeholder-shown):invalid~.input-icon,
        .form-textarea:not(:placeholder-shown):invalid~.textarea-icon {
            color: #ef4444;
        }
    </style>

   <form method="POST" action="{{route('activiteupdate',$activite)}}" class="modern-form">
    @csrf
    @method('PUT')

    @if (session('success'))
        <span style="color:green;">{{ session('success') }}</span>    
    @endif

    @if (session('error'))
        <span style="color:red;">{{ session('error') }}</span>    
    @endif

    <div class="form-title">Modification d'une activité</div>

    <div class="form-body">
        {{-- Titre activité --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <path stroke-width="1.5" stroke="currentColor" d="M12 7h8m-8 4h4m-8 4h6M5 7h2m-2 4h2m-2 4h2"></path>
                    <path stroke-width="1.5" stroke="currentColor" d="M19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3Z"></path>
                </svg>
                <input name="title" value="{{ old('title', $activite->title) }}" required placeholder="Titre activité" class="form-input" type="text" />
                @error('title')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Domaine --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor" d="M8 7H4a1 1 0 00-1 1v8a1 1 0 001 1h4M16 7h4a1 1 0 011 1v8a1 1 0 01-1 1h-4M12 7v10"></path>
                    <path stroke-width="1.5" stroke="currentColor" d="M3 13h18"></path>
                </svg>
                <input name="domaine" value="{{ old('domaine', $activite->domaine) }}" required placeholder="Domaine" class="form-input" type="text" />
                @error('domaine')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Jour & Horaire --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <path stroke-width="1.5" stroke="currentColor" d="M8 2v3M16 2v3M3.5 9.09h17M4 5h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"></path>
                </svg>
                <input name="jour_heure" value="{{ old('jour_heur', $activite->jour_heur) }}" required placeholder="Jour et horaire (ex: Mardi, 18h-20h)" class="form-input" type="text" />
                @error('jour_heur')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Description --}}
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="textarea-icon">
                    <path stroke-width="1.5" stroke="currentColor" d="M8 5H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2h-3m-9 4h6m-6 4h6m-6 4h3"></path>
                </svg>
                <textarea name="description" required placeholder="Description de l'activité" class="form-textarea">{{ old('description', $activite->description) }}</textarea>
                @error('description')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button class="submit-button" type="submit">
        <span class="button-text">Modifier l'activité</span>
        <div class="button-glow"></div>
    </button>
</form>



    
@endsection