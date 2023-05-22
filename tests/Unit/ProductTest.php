<?php

namespace App\Tests\Unit;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase
{
    public function testEntityProductIsValide(): void
    {
         self::bootKernel();
         $container = static::getContainer();
         $product=new Product();
         $product->setDescription("text")
         ->setLibelle("fraise");
         $errors =$container->get('validator')->validate($product);

         $this->assertCount(0,$errors);


    }
    public function testvaleurNameProduct(): void
    {
         self::bootKernel();
         $container = static::getContainer();
         $product=new Product();
         $product->setLibelle("")
         ->setDescription("text");

         $errors =$container->get('validator')->validate($product);

         $this->assertCount(0,$errors);


    }
}
