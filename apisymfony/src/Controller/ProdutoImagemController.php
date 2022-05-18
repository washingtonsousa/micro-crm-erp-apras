<?php
namespace App\Controller;

use App\Core\Application\Abstraction\Interface\IProdutoImagemAppService;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ProdutoImagemController extends AbstractController {

   private IProdutoImagemAppService $produtoImagemAppService;


        public function __construct(IProdutoImagemAppService $produtoImagemAppService,
        SerializerInterface  $serializerInterface
        )
        {
          $this->produtoImagemAppService =  $produtoImagemAppService;
          $this->serializerInterface = $serializerInterface;
        }
        

        public function add(Request $request)
        {
      

              $id = $request->attributes->get('id');

              $entity = $this->produtoImagemAppService->add($id, $request->files->get('produtoImg'));

              return new JsonResponse($entity);

        }



}