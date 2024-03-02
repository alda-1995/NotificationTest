<?php

namespace Tests\Feature;

use App\Repositories\SubscriptionRepository;
use App\Repositories\UserRepository;
use App\Services\SubscriptionService;
use Tests\TestCase;
use Mockery;

class SubscriptionServiceTest extends TestCase
{
    public function testSendNotificationMessageUsers()
    {
        // Configurar mocks
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $subscriptionRepositoryMock = Mockery::mock(SubscriptionRepository::class);
        
        // Mockear datos de usuarios
        $userSubscriptions = [
            (object) ['subscription_id' => 1],
            (object) ['subscription_id' => 2],
        ];
        
        // Configurar comportamiento esperado del UserRepository
        $userRepositoryMock->shouldReceive('getUsersByCategoriaSubscription')
            ->with('categoriaId')
            ->andReturn($userSubscriptions);
        
        // Configurar comportamiento esperado del SubscriptionRepository
        $subscriptionRepositoryMock->shouldReceive('createMessageNotification')
            ->times(count($userSubscriptions));
        
        // Instanciar NotificationService con los mocks
        $notificationService = new  SubscriptionService($subscriptionRepositoryMock, $userRepositoryMock);
        
        // Ejecutar el método que se está probando
        $result = $notificationService->sendNotificationMessageUsers('categoriaId', 'mensaje');
        
        // Verificar que el método devuelve true (éxito)
        $this->assertTrue($result);
    }
}
