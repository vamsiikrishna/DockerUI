<?php

namespace Vamsi\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContainerController extends Controller
{
    public function AllContainersAction()
    {
        $docker_host = $this->container->getParameter('docker_host');
        $client = new \Docker\Http\DockerClient(array(), $docker_host);
        $docker = new \Docker\Docker($client);
        $manager = $docker->getContainerManager();
        $containers = $manager->findAll(array('all'=>1));

        return $this->render('VamsiApplicationBundle:Container:all.html.twig',array('containers'=>$containers));
    }

    public function RunningContainersAction()
    {
        $docker_host = $this->container->getParameter('docker_host');
        $client = new \Docker\Http\DockerClient(array(), $docker_host);
        $docker = new \Docker\Docker($client);
        $manager = $docker->getContainerManager();
        $containers = $manager->findAll();
        return $this->render('VamsiApplicationBundle:Container:running.html.twig',array('containers'=>$containers));

    }

    public function IndividualContainerAction($id)
    {
        $docker_host = $this->container->getParameter('docker_host');
        $client = new \Docker\Http\DockerClient(array(), $docker_host);
        $docker = new \Docker\Docker($client);
        $manager = $docker->getContainerManager();
        $container = $manager->find($id);
        return $this->render('VamsiApplicationBundle:Container:individual.html.twig',array('container'=>$container));
    }

}
