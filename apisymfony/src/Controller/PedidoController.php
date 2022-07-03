<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IPedidoAppService;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Entity\Produto;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use App\Core\Shared\Resolver\DependencyResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class PedidoController extends AbstractController {



        public function __construct(private IPedidoAppService $pedidoAppService,
       private SerializerInterface  $serializerInterface
        )
        {

        }
        

        public function subscribe( Request $request)
        {   


              $requestValue = $this->serializerInterface->deserialize($request->getContent(), PedidoViewModel::class, 'json', [
              ]);



              $result = $this->pedidoAppService->subscribe($requestValue);
              return new JsonResponse($result);

        }
        

        public function get(IPaginatedRequestHandler $handler)
        {
          
              $result = $this->pedidoAppService->get($handler->getRequestViewModel());

              
              return new JsonResponse($result);

        }

        public function getById(Request $request)
        {
            
              $result = $this->pedidoAppService->getById($request->attributes->get('id'));

                  

              return new JsonResponse($result);

        }

        public function put(Request $request)
        {

            $requestValue = $this->serializerInterface->deserialize($request->getContent(), ClienteViewModel::class, 'json', [
            ]);

            $id = $request->attributes->get('id');

            $result = $this->pedidoAppService->update($requestValue, $id);

            return new JsonResponse($result);

        }

        public function delete(Request $request)
        {

            $id = $request->attributes->get('id');

            $result = $this->pedidoAppService->remove($id);

            return new JsonResponse(null, $result ? 200 : 204);

        }
}