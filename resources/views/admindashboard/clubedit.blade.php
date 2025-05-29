@extends('layouts.app2')

@section('content')

  <style>
    .modern-form {
      --primary: #4f46e5;
      --primary-dark: #4338ca;
      --primary-light: rgba(79, 70, 229, 0.1);
      --success: #10b981;
      --text-main: #1e293b;
      --text-secondary: #64748b;
      --bg-input: #f8fafc;
      --card-bg: #ffffff;
      
      position: relative;
      width: 400px;
      max-width: 95%;
      padding: 32px;
      margin: 2rem auto;
      background: var(--card-bg);
      border-radius: 20px;
      box-shadow: 
        0 10px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04),
        inset 0 0 0 1px rgba(148, 163, 184, 0.1);
      font-family: system-ui, -apple-system, sans-serif;
      transition: all 0.3s ease;
    }
    
    .modern-form:hover {
      transform: translateY(-5px);
      box-shadow: 
        0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04),
        inset 0 0 0 1px rgba(148, 163, 184, 0.1);
    }

    .form-title {
      font-size: 28px;
      font-weight: 700;
      color: var(--text-main);
      margin: 0 0 28px;
      text-align: center;
      letter-spacing: -0.02em;
      position: relative;
      padding-bottom: 12px;
    }
    
    .form-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background: var(--primary);
      border-radius: 2px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
      transition: all 0.2s ease;
    }

    .form-input, .select-input {
      width: 100%;
      height: 50px;
      padding: 0 40px;
      font-size: 15px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      background: var(--bg-input);
      color: var(--text-main);
      transition: all 0.3s ease;
    }

    .form-input::placeholder {
      color: var(--text-secondary);
      transition: all 0.2s ease;
    }

    .input-icon {
      position: absolute;
      left: 14px;
      width: 18px;
      height: 18px;
      color: var(--text-secondary);
      pointer-events: none;
      transition: all 0.2s ease;
    }

    .select-input {
      padding: 0 16px;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      background-size: 18px;
    }

    .submit-button {
      position: relative;
      width: 100%;
      height: 50px;
      margin-top: 16px;
      background: var(--primary);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      overflow: hidden;
      transition: all 0.3s ease;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .button-glow {
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg,
              transparent,
              rgba(255, 255, 255, 0.3),
              transparent);
      transform: translateX(-100%);
      transition: transform 0.5s ease;
    }

    .alert {
      padding: 12px 16px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .alert-success {
      background-color: rgba(16, 185, 129, 0.1);
      color: #10b981;
      border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .alert-danger {
      background-color: rgba(220, 38, 38, 0.1);
      color: #dc2626;
      border: 1px solid rgba(220, 38, 38, 0.2);
    }

    .alert:before {
      content: '';
      width: 20px;
      height: 20px;
      margin-right: 12px;
      background-size: contain;
      background-repeat: no-repeat;
    }
    
    .alert-success:before {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2310b981'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'%3E%3C/path%3E%3C/svg%3E");
    }
    
    .alert-danger:before {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23dc2626'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'%3E%3C/path%3E%3C/svg%3E");
    }
    
    .text-danger {
      color: #dc2626;
      font-size: 12px;
      margin-top: 4px;
      display: block;
      padding-left: 16px;
      position: relative;
    }
    
    .text-danger:before {
      content: '!';
      position: absolute;
      left: 0;
      top: 0;
      font-size: 12px;
      font-weight: bold;
      color: #fff;
      background: #dc2626;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      line-height: 1;
    }

    /* Hover & Focus States */
    .form-input:hover, .select-input:hover {
      border-color: var(--primary);
      transform: translateY(-1px);
    }

    .form-input:focus, .select-input:focus {
      outline: none;
      border-color: var(--primary);
      background: white;
      box-shadow: 0 0 0 4px var(--primary-light);
      transform: translateY(-1px);
    }
    
    .form-input:focus::placeholder {
      color: transparent;
      transform: translateX(5px);
    }
    
    .input-wrapper:focus-within .input-icon {
      color: var(--primary);
      transform: scale(1.1);
    }

    .submit-button:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow:
        0 8px 15px rgba(79, 70, 229, 0.3),
        0 4px 6px rgba(79, 70, 229, 0.2);
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
    .form-input:not(:placeholder-shown):valid {
      border-color: var(--success);
    }

    .form-input:not(:placeholder-shown):valid ~ .input-icon {
      color: var(--success);
    }

     /* Validation States */
    select:not(:placeholder-shown):valid {
      border-color: var(--success);
    }

    select:not(:placeholder-shown):valid  {
      color: var(--success);
    }
    
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .modern-form {
      animation: fadeIn 0.6s ease-out;
    }
    
    .input-group {
      animation: fadeIn 0.6s ease-out;
      animation-fill-mode: both;
    }
    
    .input-group:nth-child(1) { animation-delay: 0.1s; }
    .input-group:nth-child(2) { animation-delay: 0.2s; }
    .input-group:nth-child(3) { animation-delay: 0.3s; }
    .input-group:nth-child(4) { animation-delay: 0.4s; }
    
    .submit-button {
      animation: fadeIn 0.6s ease-out;
      animation-delay: 0.5s;
      animation-fill-mode: both;
    }
  </style>






<form    method="post" action="{{route('clubupdate', $club)}}"   class="modern-form">

    @csrf
    @method('PUT')
    <div class="form-title"> Modifier le Club d'un étudiant</div>  

    <div class="form-body">
        <div class="input-group">
            <div class="input-wrapper">
                <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                    <circle stroke-width="1.5" stroke="currentColor" r="4" cy="8" cx="12"></circle>
                    <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor"
                        d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"></path>
                </svg>
                <input required="" placeholder="Nom" class="form-input" type="text" name="Firstname"  value="{{$club->firstname}}"/>
            </div>
        </div>

        <div class="form-body">
            <div class="input-group">
                <div class="input-wrapper">
                    <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                        <circle stroke-width="1.5" stroke="currentColor" r="4" cy="8" cx="12"></circle>
                        <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor"
                            d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"></path>
                    </svg>
                    <input required="" placeholder="Lastname" class="form-input" type="text" name="lastname" value="{{$club->lastname}}"/>
                </div>
            </div>


            <div class="input-group">
                <div class="input-wrapper">


                    <select style="width: 400px; height: 58px; border-radius: 7px;color:grey; " name="niveau"
                        required>
                        <option value="">Choisir une année</option>
                         <option value="License1" {{ $club->année == 'Licence1' ? 'selected' : '' }}>Licence1</option>
                         <option value="Licence2" {{ $club->année == 'Licence2' ? 'selected' : '' }}>Licence2</option>
                         <option value="Licence3" {{ $club->année == 'Licence3' ? 'selected' : '' }}>Licence3</option>
                    </select>
                </div>
            </div>
        </div>

            <div class="input-group">
                <div class="input-wrapper">
                  
                    <select style="width: 400px; height: 58px; border-radius: 7px;color:grey; " name="clube"
                        required>
                        <option value="">Choisir un club</option>
                        <option value="foot"{{ $club->clube == 'foot' ? 'selected' : '' }}>Football</option>
                        <option value="basket"{{ $club->clube == 'basket' ? 'selected' : '' }}>Basket</option>
                        <option value="otaku"{{ $club->clube == 'otaku' ? 'selected' : '' }}>Otaku</option>
                        <option value="tech" {{ $club->clube == 'tech' ? 'selected' : '' }}>Tech</option>
                        <option value="danse"{{ $club->clube == 'danse' ? 'selected' : '' }}>Danse</option>
                        <option value="musique"{{ $club->clube == 'musique' ? 'selected' : '' }}>Musique</option>
                        
                    </select>
                </div>
            </div>
        </div>

        <button class="submit-button" type="submit">
            <span class="button-text">Envoyer</span>
            <div class="button-glow"></div>
        </button>


</form>




@endsection