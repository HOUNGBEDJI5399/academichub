@extends('layouts.app2')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
        background-color: #f5f5f5;
    }
    
    .container {
        max-width: 100%;
        margin: 0 auto;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    h2 {
        text-align: center;
        color: #333;
        margin: 20px 0;
        padding: 0 20px;
    }
    
    .table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 20px;
    }
    
    table {
        border-collapse: collapse;
        min-width: 100%;
        width: max-content;
        font-size: 12px;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 6px 4px;
        text-align: center;
        white-space: nowrap;
    }
    
    th {
        background-color: #f2f2f2;
        font-weight: bold;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    
    .student-name {
        position: sticky;
        left: 0;
        background-color: white;
        z-index: 5;
        min-width: 120px;
    }
    
    .student-name th {
        background-color: #f2f2f2;
        z-index: 15;
    }
    
    .ue-header {
        background-color: #e6f2ff !important;
    }
    
    .matiere-header {
        background-color: #f2f2f2;
    }
    
    input[type="number"] {
        width: 50px;
        padding: 4px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 12px;
    }
    
    .note-input {
        width: 50px;
    }
    
    .form-actions {
        padding: 20px;
        text-align: center;
        border-top: 1px solid #eee;
        background-color: #fafafa;
    }
    
    button {
        padding: 12px 24px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        margin: 0 10px 10px 0;
    }
    
    button:hover {
        background-color: #45a049;
    }
    
    .success-message {
        color: green;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
    }
    
    .error-message {
        color: red;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }
    
    /* Mobile specific styles */
    @media screen and (max-width: 768px) {
        body {
            padding: 5px;
        }
        
        h2 {
            font-size: 18px;
            margin: 15px 0;
        }
        
        .table-container {
            margin: 10px;
        }
        
        table {
            font-size: 11px;
        }
        
        th, td {
            padding: 4px 2px;
        }
        
        input[type="number"] {
            width: 45px;
            padding: 3px;
            font-size: 11px;
        }
        
        .form-actions {
            padding: 15px 10px;
        }
        
        button {
            width: 100%;
            margin-bottom: 10px;
            padding: 14px;
        }
    }
    
    @media screen and (max-width: 480px) {
        table {
            font-size: 10px;
        }
        
        th, td {
            padding: 3px 1px;
        }
        
        input[type="number"] {
            width: 40px;
            padding: 2px;
            font-size: 10px;
        }
        
        h2 {
            font-size: 16px;
        }
    }
    
    /* Enhanced mobile table experience */
    @media screen and (max-width: 768px) {
        .table-container {
            position: relative;
        }
        
        .table-container::after {
            content: "← Faites défiler horizontalement →";
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11px;
            color: #666;
            background: rgba(255,255,255,0.9);
            padding: 2px 8px;
            border-radius: 10px;
        }
    }
</style>

<div class="container">
    <h2>Saisie des Notes</h2>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-message">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('notel3admin' )}}" method="POST">
        @csrf

        <div class="table-container">
            <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; min-width: 1200px;">
                <thead>
                    <tr>
                        <th rowspan="3" class="student-name" style="min-width: 150px; text-align: center; background-color: #eee;">
                            Nom Étudiant
                        </th>
                        @for ($ue = 1; $ue <= 5; $ue++)
                            <th colspan="9" class="ue-header" style="text-align: center;">
                                UE {{ $ue }}
                            </th>
                        @endfor
                    </tr>
                    <tr>
                        @for ($ue = 1; $ue <= 5; $ue++)
                            @for ($mat = 1; $mat <= 3; $mat++)
                                <th colspan="3" class="matiere-header" style="text-align: center;">
                                    Matière {{ $mat }}
                                </th>
                            @endfor
                        @endfor
                    </tr>
                    <tr>
                        @for ($ue = 1; $ue <= 5; $ue++)
                            @for ($mat = 1; $mat <= 3; $mat++)
                                <th style="width: 50px; text-align: center;">Dev 1</th>
                                <th style="width: 50px; text-align: center;">Dev 2</th>
                                <th style="width: 50px; text-align: center;">Exam</th>
                            @endfor
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @forelse($etudiants as $etudiant)
                        <tr>
                            <td class="student-name" style="text-align: center; font-weight: bold;">
                                {{ $etudiant->firstname }} {{ $etudiant->lastname }}
                            </td>

                            @for ($ue = 1; $ue <= 5; $ue++)
                                @for ($mat = 1; $mat <= 3; $mat++)
                                    <!-- Dev 1 -->
                                    <td>
                                        <input
                                            type="number"
                                            name="notesl3[{{ $etudiant->id }}][ue{{ $ue }}_m{{ $mat }}_dev1]"
                                            value="{{ old('notesl3.'.$etudiant->id.'.ue'.$ue.'_m'.$mat.'_dev1', '') }}"
                                            min="0" 
                                            max="20" 
                                            step="0.25"
                                            class="note-input"
                                            placeholder="--"
                                        >
                                    </td>
                                    <!-- Dev 2 -->
                                    <td>
                                        <input
                                            type="number"
                                            name="notesl3[{{ $etudiant->id }}][ue{{ $ue }}_m{{ $mat }}_dev2]"
                                            value="{{ old('notesl3.'.$etudiant->id.'.ue'.$ue.'_m'.$mat.'_dev2', '') }}"
                                            min="0" 
                                            max="20" 
                                            step="0.25"
                                            class="note-input"
                                            placeholder="--"
                                        >
                                    </td>
                                    <!-- Exam -->
                                    <td>
                                        <input
                                            type="number"
                                            name="notesl2[{{ $etudiant->id }}][ue{{ $ue }}_m{{ $mat }}_exam]"
                                            value="{{ old('notesl3.'.$etudiant->id.'.ue'.$ue.'_m'.$mat.'_exam', '') }}"
                                            min="0" 
                                            max="20" 
                                            step="0.25"
                                            class="note-input"
                                            placeholder="--"
                                        >
                                    </td>
                                @endfor
                            @endfor
                        </tr>
                    @empty
                        <tr>
                            <td colspan="46" style="text-align: center; padding: 20px; color: #666;">
                                Aucun étudiant trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="form-actions">
            <button type="submit">
                Enregistrer les notes
            </button>
        </div>
    </form>
</div>

<script>
    // Améliorer l'expérience tactile sur mobile
    if ('ontouchstart' in window) {
        const tableContainer = document.querySelector('.table-container');
        let startX = 0;
        let scrollLeft = 0;
        
        tableContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].pageX - tableContainer.offsetLeft;
            scrollLeft = tableContainer.scrollLeft;
        });
        
        tableContainer.addEventListener('touchmove', (e) => {
            if (!startX) return;
            e.preventDefault();
            const x = e.touches[0].pageX - tableContainer.offsetLeft;
            const walk = (x - startX) * 2;
            tableContainer.scrollLeft = scrollLeft - walk;
        });
        
        tableContainer.addEventListener('touchend', () => {
            startX = 0;
        });
    }

    // Validation simple côté client
    document.querySelector('form').addEventListener('submit', function(e) {
        const inputs = document.querySelectorAll('input[type="number"]');
        let hasValue = false;
        
        inputs.forEach(input => {
            if (input.value && input.value.trim() !== '') {
                hasValue = true;
            }
        });
        
        if (!hasValue) {
            e.preventDefault();
            alert('Veuillez saisir au moins une note avant d\'enregistrer.');
            return false;
        }
    });
</script>

@endsection