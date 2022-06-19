<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IFichaProducaoAppService;
use App\Core\Application\ViewModel\FichaProducaoViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class FichaProducaoController extends AbstractController {



        public function __construct(private IFichaProducaoAppService $fichaProducaoAppService,
       private SerializerInterface  $serializerInterface
        )
        {

        }
        

        public function subscribe( Request $request)
        {   

              $requestValue = $this->serializerInterface->deserialize($request->getContent(), FichaProducaoViewModel::class, 'json', [
              ]);

              $result = $this->fichaProducaoAppService->subscribe($requestValue);
              return new JsonResponse($result);


        }
        

        public function get(IPaginatedRequestHandler $handler)
        {
          
              $result = $this->fichaProducaoAppService->get($handler->getRequestViewModel());
              return new JsonResponse($result);

        }

        public function getById(Request $request)
        {
            
              $result = $this->fichaProducaoAppService->getById($request->attributes->get('id'));

                  

              return new JsonResponse($result);

        }

        public function patch(Request $request)
        {
              $requestValue = $this->serializerInterface->deserialize($request->getContent(), FichaProducaoViewModel::class, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'dd/mm/YYYY H:i:s',
              ]);
            //    $result = $this->fichaProducaoAppService->partialUpdate($requestValue);
               return new JsonResponse();

        }

        public function put(Request $request)
        {

            $requestValue = $this->serializerInterface->deserialize($request->getContent(), FichaProducaoViewModel::class, 'json', [
            ]);

            $id = $request->attributes->get('id');

            $result = $this->fichaProducaoAppService->update($requestValue, $id);

            return new JsonResponse($result);

        }

        public function delete(Request $request)
        {

            $id = $request->attributes->get('id');

            $result = $this->fichaProducaoAppService->remove($id);

            return new JsonResponse(null, $result ? 200 : 204);

        }
}