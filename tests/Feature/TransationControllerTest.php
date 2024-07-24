<?php

namespace Tests\Feature;

use App\Enums\DocumentTypeEnum;
use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_payment(): void
    {
        // Prepare
        $customer = User::factory()->create([
            'user_type' => UserTypeEnum::Customer,
            'document_type' => DocumentTypeEnum::CPF,
        ]);
        
        $shopkeeper = User::factory()->create([
            'user_type' => UserTypeEnum::Shopkeeper,
            'document_type' => DocumentTypeEnum::CNPJ,
        ]);

        $payer = Wallet::factory()->create([
            'user_id' => $customer->getKey(),
            'balance' => 10_00
        ]);
        $payee = Wallet::factory()->create([
            'user_id' => $shopkeeper->getKey(),
            'balance' => 0
        ]);
        $value = 5_00;

        // Act
        $response = $this->postJson(route('transactions.create'), [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'value' => $value,
        ]);

        // Assert
        $response->assertNoContent();


        $this->assertDatabaseHas('transactions', [
            'payer_id' => $payer->getKey(), 
            'payee_id' => $payee->getKey(), 
            'value' => 5_00, 
            'status' => StatusEnum::Completed,
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $payer->getKey(), 
            'balance' => 5_00
        ]);
        
        $this->assertDatabaseHas('wallets', [
            'id' => $payee->getKey(), 
            'balance' => 5_00
        ]);
    } 
}
