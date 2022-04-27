<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\ViewModel\UsuarioViewModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController {

   private IUsuarioAppService $usuarioAppService;

        public function __construct(IUsuarioAppService $usuarioAppService
        )
        {
          $this->usuarioAppService =  $usuarioAppService;
        }
        

        public function register(SerializerInterface  $serializerInterface, Request $request)
        {
      
              $requestValue = $serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
              ]);

              $result = $this->usuarioAppService->register($requestValue);
              return new JsonResponse($result);

        }

        public function get(Request $request)
        {
      

              $result = $this->usuarioAppService->getUsers();
              return new JsonResponse($result);

        }

        public function testProtection() {
          return new Response(sprintf('Logged in as %s', json_encode($this->getUser()->getRoles())));
        }


}