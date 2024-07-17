<?php

namespace Tests\Feature;

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
        $payer = Wallet::factory()->create();
        $payee = Wallet::factory()->create();
        $value = 100;

        // Act
        $response = $this->postJson(route('transactions.create'), [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'value' => $value,
        ]);

        // Assert
        $response->assertNoContent();
    } 
}
