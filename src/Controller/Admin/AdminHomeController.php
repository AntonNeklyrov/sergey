<?php

namespace App\Controller\Admin;

use MoySklad\Entities\Products\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use MoySklad\MoySklad;

class AdminHomeController extends AdminBaseController
{
    /**
     * @Route("/admin", name="admin_home")
     * @return Response
     */
    public function index()
    {
        $forRender = parent::renderDefault();
        $sklad = MoySklad::getInstance('admin@test', '38e90f561d');
        $list = Product::query($sklad)->getList();
        dump($list);
        
        return $this->render( 'admin/index.html.twig', $forRender );
    }
}