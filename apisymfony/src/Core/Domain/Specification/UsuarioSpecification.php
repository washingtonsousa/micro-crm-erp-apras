<?php
namespace App\Core\Domain\Specification;

use App\Core\Domain\Entity\Usuario;
use App\Core\Shared\Event\AssertionConcern;

class UsuarioSpecification {


    public static function IsValidForInsert(Usuario $usuario) {

          return    AssertionConcern::IsSatisfiedBy(

                        array(

                            AssertionConcern::AssertNotNull($usuario, "Todos os dados estão inválidos"),
                            AssertionConcern::AssertNotEmpty($usuario->getDocumento(), "Documento deve ser preenchido"),
                            AssertionConcern::AssertNotEmpty($usuario->getEmail(), "Email deve ser preenchido")


                        )

                );

    }

    public static function MustNotExists(?bool $value) {

        return    AssertionConcern::IsSatisfiedBy(

                      array(

                          AssertionConcern::AssertFalse($value, "Já existem usuários cadastrados com este email ou documento")



                      )

              );

  }


}