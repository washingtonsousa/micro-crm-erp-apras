<?php
namespace App\Core\Domain\Specification;

use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\Usuario;
use App\Core\Shared\Event\AssertionConcern;

class ClienteSpecification {


    public static function IsValidForInsert(Cliente $cliente) {

          return    AssertionConcern::IsSatisfiedBy(

                        array(

                            AssertionConcern::AssertNotNull($cliente, "Todos os dados estão inválidos"),
                            AssertionConcern::AssertNotEmpty($cliente->getNome(), "Nome do cliente deve ser preenchido"),
                            AssertionConcern::AssertNotEmpty($cliente->getCodigoCliente(), "Código do cliente deve ser preenchido")


                        )

                );

    }

    public static function IsValidForUpdate(Cliente $cliente) {

        return    AssertionConcern::IsSatisfiedBy(

                      array(

                          AssertionConcern::AssertNotNull($cliente, "Todos os dados estão inválidos"),
                          AssertionConcern::AssertTrue($cliente->getIdCliente() > 0, "Id cliente deve ser preenchido para atualizações"),
                          AssertionConcern::AssertNotEmpty($cliente->getNome(), "Nome do cliente deve ser preenchido"),
                          AssertionConcern::AssertNotEmpty($cliente->getCodigoCliente(), "Código do cliente deve ser preenchido")
                      )

              );

  }

    public static function MustNotExists(?bool $value) {

        return    AssertionConcern::IsSatisfiedBy(

                      array(
                          AssertionConcern::AssertFalse($value, "Já existe cliente cadastrado com este nome ou codigo")
                      )

              );

  }


  
  public static function MustNotBeNull(Cliente $cliente) {

    return    AssertionConcern::IsSatisfiedBy(

                  array(
                      AssertionConcern::AssertNotNull($cliente, "Cliente não existe e por conta disso processo não pode prosseguir")
                  )

          );

}


}