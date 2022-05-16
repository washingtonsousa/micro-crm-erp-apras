<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IProdutoAppService;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ProdutoImagemController extends AbstractController {

   private IProdutoAppService $produtoAppService;
   private SerializerInterface  $serializerInterface;

        public function __construct(IProdutoAppService $produtoAppService,
        SerializerInterface  $serializerInterface
        )
        {
          $this->produtoAppService =  $produtoAppService;
          $this->serializerInterface = $serializerInterface;
        }
        

        public function subscribe( Request $request)
        {
      
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), ClienteViewModel::class, 'json', [
              ]);

              $result = $this->produtoAppService->subscribe($requestValue);
              return new JsonResponse($result);

        }
        

        public function get(IPaginatedRequestHandler $handler)
        {
          
              $result = $this->produtoAppService->get($handler->getRequestViewModel());
              return new JsonResponse($result);

        }

        public function getById(Request $request)
        {
          
              $result = $this->produtoAppService->getById($request->attributes->get('id'));
              return new JsonResponse($result);

        }

        public function patch(Request $request)
        {
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), UsuarioViewModel::class, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
              ]);
              //  $result = $this->produtoAppService->partialUpdate($requestValue);
               return new JsonResponse();

        }

        public function put(Request $request)
        {

            $requestValue = $this->serializerInterface->deserialize($request->getContent(), ClienteViewModel::class, 'json', [
            ]);

            $id = $request->attributes->get('id');

            $result = $this->produtoAppService->update($requestValue, $id);

            return new JsonResponse($result);

        }

        public function delete(Request $request)
        {

            $id = $request->attributes->get('id');

            $result = $this->produtoAppService->remove($id);

            return new JsonResponse(null, $result ? 200 : 204);

        }



}