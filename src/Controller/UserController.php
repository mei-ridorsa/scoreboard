<?php

namespace App\Controller;

use App\User\Application\ScoreUpdater;
use App\User\Domain\Exception\UserNotFoundException;
use App\User\Infrastructure\Persistence\InMemory\InMemoryUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/set_score/{userId}/{score}', methods: ['PUT'])]
    public function setScore(
        string $userId,
        int $score,
        InMemoryUserRepository $repository,
    ):JsonResponse {

        //TODO: Implement database repositories and use them here

        $scoreUpdater = new ScoreUpdater($repository);

        try {
            $user = $scoreUpdater->setScore($userId, $score);
        } catch (UserNotFoundException $e) {
            return $this->json($e->getMessage(), $e->getCode());
        }
        return $this->json($user);
    }

    //#[Route('/search/{cityCode}/{pickUpDate}/{dropOffDate}', methods: ['GET'])]
/*public function search(
        string $cityCode,
        string $pickUpDate,
        string $dropOffDate,
        DoctrineVehicleRepository $vehicleRepository,
        DoctrineCityRepository $cityRepository,
        AvailabilitySearch $availabilitySearch
    ): JsonResponse {

        $result = [];

        $inventory = new Inventory($vehicleRepository, $cityRepository, $availabilitySearch);

        try {
            $vehicles = $inventory->search($cityCode, new DateTime($pickUpDate), new DateTime($dropOffDate));
        } catch (CityNotFoundException $exception) {
            return new JsonResponse($exception->getMessage(), 400);
        }

        foreach ($vehicles as $vehicle) {
            $result[] = $vehicle->toArray();
        }

        return $this->json(['vehicles'=>$result]);
    }*/
}
