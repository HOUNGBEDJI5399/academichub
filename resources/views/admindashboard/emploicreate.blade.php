@extends('layouts.app2')

@section('content')

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .time-col {
            width: 120px;
        }

        button {
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
            float: right;
        }

        button:hover {
            background-color: #3367d6;
        }

        @media (max-width: 600px) {
            .form-group {
                flex: 0 0 100%;
            }

            .time-col {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <form action="{{route('emploiadmin')}}" method="POST">

             @csrf 

            <div class="header">
                <div class="form-group">
                    <label for="annee">Année académique</label>
                            <select id="classe" name="classe" required>
              <option value=""> Sélectionner</option>
             <option value="Licence1" {{ old('classe') == 'Licence1' ? 'selected' : '' }}>Licence 1</option>
            <option value="Licence2" {{ old('classe') == 'Licence2' ? 'selected' : '' }}>Licence 2</option>
            <option value="Llicence3" {{ old('classe') == 'Llicence3' ? 'selected' : '' }}>Licence 3</option>
            </select>

                  
                </div>

                <div class="form-group">
                    <label for="classe">Année de Licence</label>
                       <select id="annee" name="annee" required>
                      <option value="">-- Sélectionner --</option>
                     <option value="2025-2026" {{ old('annee') == '2025-2026' ? 'selected' : '' }}>2025-2026</option>
                     <option value="2026-2027" {{ old('annee') == '2026-2027' ? 'selected' : '' }}>2026-2027</option>
                 </select>

                </div>

                <div class="form-group">
                    <label for="semaine">Semaine</label>
                    <input type="text" id="semaine" name="semaine" placeholder="Ex: Semaine du 14 au 19 janvier 2025" required>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="time-col">Heure</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                
                   <tbody>
    <tr>
        <td>8h - 9h</td>
        <td><input type="text" name="lundi_8h" value="{{ old('lundi_8h') }}"></td>
        <td><input type="text" name="mardi_8h" value="{{ old('mardi_8h') }}"></td>
        <td><input type="text" name="mercredi_8h" value="{{ old('mercredi_8h') }}"></td>
        <td><input type="text" name="jeudi_8h" value="{{ old('jeudi_8h') }}"></td>
        <td><input type="text" name="vendredi_8h" value="{{ old('vendredi_8h') }}"></td>
    </tr>
    <tr>
        <td>9h - 10h</td>
        <td><input type="text" name="lundi_9h" value="{{ old('lundi_9h') }}"></td>
        <td><input type="text" name="mardi_9h" value="{{ old('mardi_9h') }}"></td>
        <td><input type="text" name="mercredi_9h" value="{{ old('mercredi_9h') }}"></td>
        <td><input type="text" name="jeudi_9h" value="{{ old('jeudi_9h') }}"></td>
        <td><input type="text" name="vendredi_9h" value="{{ old('vendredi_9h') }}"></td>
    </tr>
    <tr>
        <td>10h - 11h</td>
        <td><input type="text" name="lundi_10h" value="{{ old('lundi_10h') }}"></td>
        <td><input type="text" name="mardi_10h" value="{{ old('mardi_10h') }}"></td>
        <td><input type="text" name="mercredi_10h" value="{{ old('mercredi_10h') }}"></td>
        <td><input type="text" name="jeudi_10h" value="{{ old('jeudi_10h') }}"></td>
        <td><input type="text" name="vendredi_10h" value="{{ old('vendredi_10h') }}"></td>
    </tr>
    <tr>
        <td>11h - 12h</td>
        <td><input type="text" name="lundi_11h" value="{{ old('lundi_11h') }}"></td>
        <td><input type="text" name="mardi_11h" value="{{ old('mardi_11h') }}"></td>
        <td><input type="text" name="mercredi_11h" value="{{ old('mercredi_11h') }}"></td>
        <td><input type="text" name="jeudi_11h" value="{{ old('jeudi_11h') }}"></td>
        <td><input type="text" name="vendredi_11h" value="{{ old('vendredi_11h') }}"></td>
    </tr>
    <tr>
        <td>12h - 13h</td>
        <td><input type="text" name="lundi_12h" value="{{ old('lundi_12h') }}"></td>
        <td><input type="text" name="mardi_12h" value="{{ old('mardi_12h') }}"></td>
        <td><input type="text" name="mercredi_12h" value="{{ old('mercredi_12h') }}"></td>
        <td><input type="text" name="jeudi_12h" value="{{ old('jeudi_12h') }}"></td>
        <td><input type="text" name="vendredi_12h" value="{{ old('vendredi_12h') }}"></td>
    </tr>
    <tr>
        <td>13h - 14h</td>
        <td><input type="text" name="lundi_13h" value="{{ old('lundi_13h') }}"></td>
        <td><input type="text" name="mardi_13h" value="{{ old('mardi_13h') }}"></td>
        <td><input type="text" name="mercredi_13h" value="{{ old('mercredi_13h') }}"></td>
        <td><input type="text" name="jeudi_13h" value="{{ old('jeudi_13h') }}"></td>
        <td><input type="text" name="vendredi_13h" value="{{ old('vendredi_13h') }}"></td>
    </tr>
    <tr>
        <td>14h - 15h</td>
        <td><input type="text" name="lundi_14h" value="{{ old('lundi_14h') }}"></td>
        <td><input type="text" name="mardi_14h" value="{{ old('mardi_14h') }}"></td>
        <td><input type="text" name="mercredi_14h" value="{{ old('mercredi_14h') }}"></td>
        <td><input type="text" name="jeudi_14h" value="{{ old('jeudi_14h') }}"></td>
        <td><input type="text" name="vendredi_14h" value="{{ old('vendredi_14h') }}"></td>
    </tr>
    <tr>
        <td>15h - 16h</td>
        <td><input type="text" name="lundi_15h" value="{{ old('lundi_15h') }}"></td>
        <td><input type="text" name="mardi_15h" value="{{ old('mardi_15h') }}"></td>
        <td><input type="text" name="mercredi_15h" value="{{ old('mercredi_15h') }}"></td>
        <td><input type="text" name="jeudi_15h" value="{{ old('jeudi_15h') }}"></td>
        <td><input type="text" name="vendredi_15h" value="{{ old('vendredi_15h') }}"></td>
    </tr>
    <tr>
        <td>16h - 17h</td>
        <td><input type="text" name="lundi_16h" value="{{ old('lundi_16h') }}"></td>
        <td><input type="text" name="mardi_16h" value="{{ old('mardi_16h') }}"></td>
        <td><input type="text" name="mercredi_16h" value="{{ old('mercredi_16h') }}"></td>
        <td><input type="text" name="jeudi_16h" value="{{ old('jeudi_16h') }}"></td>
        <td><input type="text" name="vendredi_16h" value="{{ old('vendredi_16h') }}"></td>
    </tr>
</tbody>

            </table>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>


@endsection