<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController {

   private IUsuarioAppService $usuarioAppService;
   private SerializerInterface  $serializerInterface;

        public function __construct(IUsuarioAppService $usuarioAppService,
        SerializerInterface  $serializerInterface
        )
        {
          $this->usuarioAppService =  $usuarioAppService;
          $this->serializerInterface = $serializerInterface;
        }
        

        public function register( Request $request)
        {
      
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
              ]);

              $result = $this->usuarioAppService->register($requestValue);
              return new JsonResponse($result);

        }
        

        public function get(IPaginatedRequestHandler $handler)
        {

              $result = $this->usuarioAppService->getUsers($handler->getRequestViewModel());
              return new JsonResponse($result);

        }

        public function patch(Request $request)
        {
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
              ]);
               $result = $this->usuarioAppService->partialUpdate($requestValue);
               return new JsonResponse();

        }

        public function put(Request $request)
        {

            $requestValue = $this->serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
              DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
            ]);

              $result = $this->usuarioAppService->update($requestValue);
              return new JsonResponse($result);

        }
}