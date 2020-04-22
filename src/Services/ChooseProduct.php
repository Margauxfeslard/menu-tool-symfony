<?php


namespace App\Services;


use App\Entity\OrderItem;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ChooseProduct
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em =$em;
    }

    public function addProductToOrderItem()
    {
        $orderItem = new OrderItem();
        $orderItem->setQuantity('1')
            ->setSize('Medium')
            ->setAmount('4');

        $this->em->persist($orderItem);
        $this->em->flush();
    }
}
