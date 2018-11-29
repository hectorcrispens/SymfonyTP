<?php

namespace App\Repository;

use App\Entity\Ticket;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ticket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticket[]    findAll()
 * @method Ticket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ticket::class);
    }

//    /**
//     * @return Ticket[] Returns an array of Ticket objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ticket
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function lastT(): array
    {
        $entityManager = $this->getEntityManager();

        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->setMaxResults(1);

        return $qb->execute();

        // to get just one result:
        // $product = $qb->setMaxResults(1)->getOneOrNullResult();
    }



    public function consult($idticket, $empleado, $fechaC, $cla, $estado, $fechaU, $grupo): array
    {

        $entityManager = $this->getEntityManager();

        $qb = $this->createQueryBuilder('t');

        if($idticket!=null){
            $qb->setParameter('id', $idticket)
                ->where('t.id = :id');

        }
        if($empleado!=null){
            $qb ->setParameter('e', $empleado)

                ->andWhere('t.Empleado = :e');
        }
        if($fechaC!=null){
            $fechafloor = new datetime(''.$fechaC.'00:00:00');
            $fechaceil = new datetime(''.$fechaC.'23:59:59');
            $qb ->setParameter('ff', $fechafloor)
                ->setParameter('fc', $fechaceil)
                ->andWhere('t.Fecha < :fc')
                ->andWhere('t.Fecha > :ff');
        }
        if($fechaU!=null){
            $fechafloorU = new datetime(''.$fechaU.'00:00:00');
            $fechaceilU = new datetime(''.$fechaU.'23:59:59');
            $conn = $this->getEntityManager()->getConnection();

            $sql = "select distinct t.id from ticket t, (select he.ticket_id, max(he.id) as he, fecha_desde from item_historico_estados he group by he.ticket_id, he.fecha_desde) AUX
where t.id = AUX.ticket_id and 
AUX.fecha_desde > '".$fechafloorU->format('Y-m-d H:i:s')."' and
AUX.fecha_desde < '".$fechaceilU->format('Y-m-d H:i:s')."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $qb ->setParameter('change', $stmt->fetchAll())
                ->andWhere($qb->expr()->in('t.id', ':change'));

        }
        if($cla!=0) {
            $conn = $this->getEntityManager()->getConnection();

            $sql = 'select t.id from ticket t, (select hc.ticket_id, max(hc.id), hc.clasificacion_id 
                      from item_historico_clasificacion hc group by hc.ticket_id, hc.clasificacion_id) aux
                      where aux.ticket_id = t.id and aux.clasificacion_id = '.$cla;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $qb ->setParameter('idT', $stmt->fetchAll())
                ->andWhere($qb->expr()->in('t.id', ':idT'));

        }
        if($estado!=0) {
            $conn = $this->getEntityManager()->getConnection();

            $sql = 'select t.id from ticket t, (select he.ticket_id, max(he.id), he.estado_ticket_id 
                      from item_historico_estados he group by he.ticket_id, he.estado_ticket_id) aux
                      where aux.ticket_id = t.id and aux.estado_ticket_id = '.$estado;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $qb ->setParameter('est', $stmt->fetchAll())
                ->andWhere($qb->expr()->in('t.id', ':est'));

        }
        if($grupo!=0) {
            $conn = $this->getEntityManager()->getConnection();

            $sql = 'select AUX.ticket_id from (select he.ticket_id, max(he.id), he.grupo_de_resolucion_id
from item_historico_estados he group by he.ticket_id, he.grupo_de_resolucion_id) AUX 
where AUX.grupo_de_resolucion_id = '.$grupo;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $qb ->setParameter('grupo', $stmt->fetchAll())
                ->andWhere($qb->expr()->in('t.id', ':grupo'));

        }


            return $qb->getQuery()->execute();


    }
}
