<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payement;
use App\Models\User;
use App\Services\FedaPayService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PayementController extends Controller
{
    protected $fedaPayService;

    public function __construct(FedaPayService $fedaPayService)
    {
        $this->fedaPayService = $fedaPayService;
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'niveau' => 'required|string|in:L1,L2,L3',
            'amount' => 'required|numeric|min:100|max:1000000',
            'phone_number' => 'required|string|regex:/^229[0-9]{8}$/'
        ]);

        try {
            $user = Auth::user();
            $reference = 'TXN-'.time().'-'.Str::random(6);

            // Journalisation avant l'appel FedaPay
            Log::info('Tentative de paiement initiée', [
                'user' => $user->id,
                'montant' => $validated['amount'],
                'reference' => $reference
            ]);

            $payment = Payement::create([
                'user_id' => $user->id,
                'transaction_id' => $reference,
                'amount' => $validated['amount'],
                'status' => 'pending',
                // ... autres champs
            ]);

            $response = $this->fedaPayService->initierPaiement(
                $validated['amount'],
                [
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'email' => $validated['email'],
                    'phone_number' => $validated['phone_number']
                ],
                $reference
            );

            if (!$response['success']) {
                throw new \Exception($response['message'] ?? 'Erreur FedaPay');
            }

            // Mise à jour avec le vrai ID FedaPay
            $payment->update([
                'fedapay_transaction_id' => $response['transaction_id'],
                'payment_url' => $response['payment_url']
            ]);

            return response()->json([
                'success' => true,
                'payment_url' => $response['payment_url'],
                'transaction_id' => $response['transaction_id']
            ]);

        } catch (\Exception $e) {
            Log::error('Échec paiement: '.$e->getMessage());
            return response()->json([
                'success' => false,
                'message' => config('app.debug') ? $e->getMessage() : 'Erreur de paiement'
            ], 500);
        }
    }
}