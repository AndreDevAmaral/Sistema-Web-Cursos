<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManeger;

    public function __construct()
    {
        $this->entityManeger = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        //montar modelo curso
        $curso = new Curso();
        $curso->setDescricao($$_POST['descricao']);

        //Inserir no banco
        $this->entityManeger->persist($curso);
        $this->entityManager->flush();
    }
}
