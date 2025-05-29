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
    
    .student-info {
        text-align: center;
        margin: 20px 0;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        color: #495057;
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
    
    .ue-header {
        background-color: #e6f2ff !important;
    }
    
    .matiere-header {
        background-color: #f2f2f2;
    }
    
    input[type="number"] {
        width: 60px;
        padding: 4px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 12px;
    }
    
    .note-input {
        width: 60px;
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
    
    .btn-secondary {
        background-color: #6c757d;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
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
            width: 50px;
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
</style>

<div class="container">
    <h2>Modification des Notes</h2>

    <!-- Afficher les informations de l'étudiant -->
    <div class="student-info">
        Étudiant : {{ $note->etudiant->firstname }} {{ $note->etudiant->lastname }}
    </div>

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

    <form action="{{ route('noteupdate', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="table-container">
            <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; min-width: 1000px;">
                <thead>
                    <tr>
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
                                <th style="width: 60px; text-align: center;">Dev 1</th>
                                <th style="width: 60px; text-align: center;">Dev 2</th>
                                <th style="width: 60px; text-align: center;">Exam</th>
                            @endfor
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @for ($ue = 1; $ue <= 5; $ue++)
                            @for ($mat = 1; $mat <= 3; $mat++)
                                <!-- Dev 1 -->
                                <td>
                                    <input
                                        type="number"
                                        name="ue{{ $ue }}_m{{ $mat }}_dev1"
                                        value="{{ old('ue' . $ue . '_m' . $mat . '_dev1', $note->{'ue' . $ue . '_m' . $mat . '_dev1'}) }}"
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
                                        name="ue{{ $ue }}_m{{ $mat }}_dev2"
                                        value="{{ old('ue' . $ue . '_m' . $mat . '_dev2', $note->{'ue' . $ue . '_m' . $mat . '_dev2'}) }}"
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
                                        name="ue{{ $ue }}_m{{ $mat }}_exam"
                                        value="{{ old('ue' . $ue . '_m' . $mat . '_exam', $note->{'ue' . $ue . '_m' . $mat . '_exam'}) }}"
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
                </tbody>
            </table>
        </div>

        <div class="form-actions">
            <button type="submit">
                Mettre à jour les notes
            </button>
            <button><a href="{{ route('admindashboard.note') }}"  style="text-decoration: none; display: inline-block; color:white;">
                Annuler
            </a></button>
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
</script>

@endsection