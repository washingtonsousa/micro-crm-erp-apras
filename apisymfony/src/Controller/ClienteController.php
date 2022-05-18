<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IClienteAppService;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use App\Core\Shared\Resolver\DependencyResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ClienteController extends AbstractController {

   private IClienteAppService $clienteAppService;
   private SerializerInterface  $serializerInterface;

        public function __construct(IClienteAppService $clienteAppService,
        SerializerInterface  $serializerInterface
        )
        {
          $this->clienteAppService =  $clienteAppService;
          $this->serializerInterface = $serializerInterface;
        }
        

        public function subscribe(Request $request)
        {
            

              $requestValue = $this->serializerInterface->deserialize($request->getContent(), ClienteViewModel::class, 'json', [
              ]);

              $result = $this->clienteAppService->subscribe($requestValue);

              return new JsonResponse($result);

        }
        

        public function get(IPaginatedRequestHandler $handler)
        {
          
              $result = $this->clienteAppService->get($handler->getRequestViewModel());

              return new JsonResponse($result);

        }

        public function getById(Request $request)
        {
          
              $result = $this->clienteAppService->getById($request->attributes->get('id'));
              return new JsonResponse($result);

        }

        public function patch(Request $request)
        {
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
              ]);
            //    $result = $this->clienteAppService->partialUpdate($requestValue);
               return new JsonResponse();

        }

        public function put(Request $request)
        {

            $requestValue = $this->serializerInterface->deserialize($request->getContent(), ClienteViewModel::class, 'json', [
            ]);

            $id = $request->attributes->get('id');

            $result = $this->clienteAppService->update($requestValue, $id);

            return new JsonResponse($result);

        }

        public function delete(Request $request)
        {

            $id = $request->attributes->get('id');

            $result = $this->clienteAppService->remove($id);

            return new JsonResponse(null, $result ? 200 : 204);

        }
}