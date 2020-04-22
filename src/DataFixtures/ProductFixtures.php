<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends AppFixtures
{
    public function loadData(ObjectManager $manager)
    {
        $burgers = [
            'beef_burger',
            'chicken_burger',
            'veggie_burger'
        ];

        $sides = [
            'fries',
            'potatoes'
        ];

        $drinks = [
            'coca-cola',
            'fuze-tea',
            'maytea',
            'sprite',
            'fit-n-tasty'
        ];

        $status = [
            true,
            false
        ];

        $this->createMany(6, function() use ($status, $burgers) {
            $product = new Product();
            $product->setType($burgers[array_rand($burgers, 1)]);
            $product->setPrice(8);
            $product->setStatus($status[array_rand($status, 1)])
                ->setImageFile($product->getType().'.jpg');
            return $product;
        });

        $this->createMany(4, function() use ($status, $sides) {
            $product = new Product();
            $product->setType($sides[array_rand($sides, 1)]);
            $product->setPrice(4);
            $product->setStatus($status[array_rand($status, 1)])
                ->setImageFile($product->getType().'.jpg');

            return $product;
        });

        $this->createMany(10, function() use ($status, $drinks) {
            $product = new Product();
            $product->setType($drinks[array_rand($drinks, 1)]);
            $product->setPrice(5);
            $product->setStatus($status[array_rand($status, 1)])
                ->setImageFile($product->getType().'.jpg');

            return $product;
        });

        $manager->flush();
    }
}
