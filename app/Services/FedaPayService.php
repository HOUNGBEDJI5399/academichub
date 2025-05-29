<?php

namespace App\Services;

use FedaPay\FedaPay;
use FedaPay\Transaction;
use FedaPay\Customer;

class FedaPayService
{
    public function __construct()
    {
        $this->initFedaPay();
    }

    protected function initFedaPay()
    {
        FedaPay::setApiKey(config('fedapay.secret_key'));
        FedaPay::setEnvironment(config('fedapay.environment'));
        
        // Configuration supplémentaire de sécurité
        FedaPay::setVerifySslCerts(true);
        FedaPay::setAccountId(config('fedapay.account_id'));
    }

    public function initierPaiement($amount, $customer, $reference)
    {
        try {
            // 1. Création du client
            $customer = Customer::create([
                'firstname' => $customer['firstname'],
                'lastname' => $customer['lastname'],
                'email' => $customer['email'],
                'phone_number' => [
                    'number' => $this->normaliserTelephone($customer['phone']),
                    'country' => 'bj'
                ]
            ]);

            // 2. Création de la transaction
            $transaction = Transaction::create([
                'description' => 'Paiement scolarité - '.$reference,
                'amount' => $amount,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('payment.callback'),
                'customer' => $customer,
                'metadata' => ['reference' => $reference]
            ]);

            // 3. Génération du lien de paiement
            $token = $transaction->generateToken();

            return [
                'success' => true,
                'transaction_id' => $transaction->id,
                'payment_url' => $token->url,
                'message' => 'Paiement initié avec succès'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
                'transaction_id' => null,
                'payment_url' => null
            ];
        }
    }

   protected function normaliserTelephone($phone)
{
    // On enlève tout sauf les chiffres
    $cleaned = preg_replace('/[^0-9]/', '', $phone);

    // Si le numéro commence par 229, on retire l’indicatif
    if (strlen($cleaned) === 11 && str_starts_with($cleaned, '229')) {
        return substr($cleaned, 3);
    }

    // Si le numéro fait bien 8 chiffres, on le retourne tel quel
    if (strlen($cleaned) === 8) {
        return $cleaned;
    }

    // Si rien ne marche, on retourne null ou lève une exception
    throw new \Exception("Numéro de téléphone invalide");
}

}