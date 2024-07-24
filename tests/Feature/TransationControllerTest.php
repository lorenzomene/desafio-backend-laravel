<?php

namespace Tests\Feature;

use App\Enums\StatusEnum;
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
        $payer = Wallet::factory()->create([
            'balance' => 10_00
        ]);
        $payee = Wallet::factory()->create([
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
            'amount' => 1000, 
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
