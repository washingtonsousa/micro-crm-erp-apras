<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IClienteAppService;
use App\Core\Application\Abstraction\Interface\IClienteImagemAppService;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ClienteImagemController extends AbstractController {

   private IClienteImagemAppService $clienteImagemAppService;
   private SerializerInterface  $serializerInterface;

        public function __construct(IClienteImagemAppService $clienteImagemAppService,
        SerializerInterface  $serializerInterface
        )
        {
          $this->clienteImagemAppService =  $clienteImagemAppService;
          $this->serializerInterface = $serializerInterface;
        }
        

        public function add(Request $request)
        {
      

              $id = $request->attributes->get('id');

              $entity = $this->clienteImagemAppService->add($id, $request->files->get('logo'));

              return new JsonResponse($entity);

        }
        
}