<?php

namespace Vamsi\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $docker_host = $this->container->getParameter('docker_host');
        $client = new \Docker\Http\DockerClient(array(), $docker_host);
        $docker = new \Docker\Docker($client);
        $manager = $docker->getContainerManager();
        $hosts = $manager->findAll(array('all'=>1));
        var_dump($hosts);


        //return $this->render('VamsiApplicationBundle:Default:default.html.twig');
    }
}
