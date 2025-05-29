@extends('layouts.app')

@section('content')
@section('title', 'Paiement des Frais de Scolarité')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
    }

    .payment-container {
        padding: 20px 10px;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-wrapper {
        max-width: 800px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        padding: 40px 30px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .header h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .header p {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .form-container {
        padding: 40px 30px;
    }

    .alert {
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        border: none;
        font-weight: 500;
        animation: slideInDown 0.5s ease-out;
    }

    @keyframes slideInDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .alert-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .alert ul {
        list-style: none;
        margin: 0;
    }

    .alert li {
        margin-bottom: 5px;
    }

    .alert li:last-child {
        margin-bottom: 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        margin-bottom: 32px;
    }

    .form-group {
        position: relative;
        margin-bottom: 24px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        outline: none;
    }

    .form-control:focus, .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        transform: translateY(-2px);
    }

    .form-control:hover, .form-select:hover {
        border-color: #9ca3af;
    }

    .input-icon {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        transition: color 0.3s ease;
        pointer-events: none;
    }

    .form-group:focus-within .input-icon {
        color: #6366f1;
    }

    .payment-methods {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 16px;
        margin-top: 12px;
    }

    .payment-option {
        display: none;
    }

    .payment-card {
        position: relative;
        padding: 20px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        background: white;
    }

    .payment-card:hover {
        border-color: #6366f1;
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
    }

    .payment-option:checked + .payment-card {
        border-color: #6366f1;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        transform: scale(1.02);
    }

    .payment-icon {
        font-size: 2rem;
        margin-bottom: 8px;
        color: #6366f1;
    }

    .payment-name {
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }

    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border: none;
        padding: 18px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .phone-input {
        display: none;
        animation: slideInUp 0.3s ease-out;
    }

    .phone-input.show {
        display: block;
    }

    @keyframes slideInUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .form-wrapper {
            margin: 10px;
            border-radius: 16px;
        }

        .header {
            padding: 30px 20px;
        }

        .header h2 {
            font-size: 1.5rem;
        }

        .form-container {
            padding: 30px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .payment-methods {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .payment-container {
            padding: 10px 5px;
        }

        .header h2 {
            font-size: 1.3rem;
        }

        .form-container {
            padding: 20px 15px;
        }
    }

    .floating-shapes {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .shape {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .shape:nth-child(1) {
        width: 60px;
        height: 60px;
        top: 20%;
        left: 10%;
        animation-delay: -2s;
    }

    .shape:nth-child(2) {
        width: 100px;
        height: 100px;
        top: 60%;
        right: 10%;
        animation-delay: -4s;
    }

    .shape:nth-child(3) {
        width: 40px;
        height: 40px;
        bottom: 20%;
        left: 20%;
        animation-delay: -1s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(120deg); }
        66% { transform: translateY(10px) rotate(240deg); }
    }    /* ... */
</style>

<div class="payment-container">
    <div class="form-wrapper">
        <div class="header">
            <h2><i class="fas fa-graduation-cap"></i> Paiement des Frais de Scolarité</h2>
            <p>Effectuez votre paiement en toute sécurité</p>
        </div>

        <div class="form-container">
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form id="payment-form" action="{{route('payment.process')}}"  method="POST">
                @csrf
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="firstname" class="form-label">
                            <i class="fas fa-user"></i> Prénom
                        </label>
                        <input type="text" class="form-control" name="firstname" 
                               value="{{ auth()->user()->firstname }}" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="form-label">
                            <i class="fas fa-user"></i> Nom
                        </label>
                        <input type="text" class="form-control" name="lastname" 
                               value="{{ auth()->user()->lastname }}" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control" name="email" 
                               value="{{ auth()->user()->email }}" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="niveau" class="form-label">
                            <i class="fas fa-graduation-cap"></i> Niveau
                        </label>
                        <select class="form-select" name="niveau" required>
                            <option value="L1">Licence 1</option>
                            <option value="L2">Licence 2</option>
                            <option value="L3">Licence 3</option>
                        </select>
                        <i class="fas fa-chevron-down input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="form-label">
                            <i class="fas fa-money-bill-wave"></i> Montant (FCFA)
                        </label>
                        <input type="number" class="form-control" name="amount" 
                               value="50000" min="100" required>
                        <i class="fas fa-coins input-icon"></i>
                    </div>

                    <div class="form-group full-width">
                        <label for="phone_number" class="form-label">
                            <i class="fas fa-phone"></i> Téléphone
                        </label>
                        <input type="tel" class="form-control" name="phone_number" 
                               value="{{ auth()->user()->phone ?? '' }}" 
                               placeholder="229 XX XX XX XX" required>
                        <i class="fas fa-phone input-icon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submit-btn">
                    <i class="fas fa-lock"></i> Payer maintenant
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.fedapay.com/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('payment-form');
    const submitBtn = document.getElementById('submit-btn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Désactiver le bouton
        submitBtn.disabled = true;
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion à FedaPay...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                throw new Error(data.message || 'Erreur serveur');
            }

            // Configuration FedaPay Checkout
            FedaPayCheckout.init({
                public_key: "{{ config('fedapay.public_key') }}",
                transaction: {
                    id: data.transaction_id
                },
                onSuccess: function() {
                    window.location.href = "{{ route(' etudiantdashboard.paymentsuccess') }}";
                },
                onError: function() {
                    window.location.href = "{{ route(' etudiantdashboard.paymentcancel') }}?reason=payment_error";
                }
            });

            // Ouvrir le checkout
            FedaPayCheckout.open();

        } catch (error) {
            console.error('Erreur:', error);
            alert('Erreur: ' + error.message);
            
            // Réactiver le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // Formatage automatique du téléphone
    const phoneInput = document.querySelector('input[name="phone_number"]');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (!value.startsWith('229') && value.length > 0) {
            value = '229' + value;
        }
        e.target.value = value.match(/.{1,3}/g)?.join(' ').substring(0, 14) || '';
    });
});
</script>
@endsection