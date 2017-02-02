<?php

namespace PatientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use PatientBundle\Entity\Paciente;
use PatientBundle\Entity\Endereco;

class DefaultController extends Controller
{
    /**
     * Visualiza a lista de Pacientes
     *
     * @param Request $Request
     *
     * @access public
     * @return Response
     */
    public function indexAction(Request $Request)
    {
        $arr_pacientes = array();
        $Pacientes     = $this->getDoctrine()
            ->getRepository('PatientBundle:Paciente')
            ->findAll();
        if (count($Pacientes)) {
            foreach ($Pacientes as $Paciente) {
                $arr_pacientes[] = $this->getArrayList($Paciente);
            }
        }
        
        
        return $this->render(
            'PatientBundle:Default:index.html.twig',
            array(
                'pacientes' => $arr_pacientes
            )
        );
    }

    /**
     * Cadastra um novo paciente
     *
     * @param Request $Request
     *
     * @access public
     * @return JsonResponse
     */
    public function addAction(Request $Request)
    {
        $nome   = $Request->get('nome',   '');
        $email  = $Request->get('email',  '');
        $mae    = $Request->get('mae',    '');
        $pai    = $Request->get('pai',    '');
        $rua    = $Request->get('rua',    '');
        $bairro = $Request->get('bairro', '');
        
        $Paciente = new Paciente();
        $Endereco = new Endereco();
        
        try {
            $Paciente->setNome($nome)
                ->setNomeMae($mae)
                ->setNomePai($pai)
                ->setEmail($email)
                ->setStatus(true)
                ->setData(new \DateTime());
            
            $Endereco->setRua($rua)
                ->setNomeBairro($bairro)
                ->setStatus(true)
                ->setData(new \DateTime())
                ->setPaciente($Paciente);
        } catch (\Exception $e) {
            return new JsonResponse(array('message' => $e->getMessage()), 400);
        }
        
        try {
            $this->getDoctrine()->getEntityManager()->persist($Paciente);
            $this->getDoctrine()->getEntityManager()->persist($Endereco);
            $this->getDoctrine()->getEntityManager()->flush();
        } catch (\Exception $e) {
            return new JsonResponse(array('message' => 'Erro ao criar o paciente'), 400);
        }
        
        return new JsonResponse(array('paciente' => $this->getArrayList($Paciente)), 200);
    }

    /**
     * Remove um paciente
     *
     * @param integer $paciente_id
     * @param Request $Request
     *
     * @access public
     * @return JsonResponse
     */
    public function removeAction($paciente_id, Request $Request)
    {
        $Paciente = $this->getDoctrine()
            ->getRepository('PatientBundle:Paciente')
            ->find($paciente_id);
        if (!$Paciente) {
            return new JsonResponse(array('message' => 'Paciente não encontrado'), 404);
        }
        
        try {
            $Enderecos = $Paciente->getEnderecos();
            foreach ($Enderecos as $Endereco) {
                $this->getDoctrine()->getEntityManager()->remove($Endereco);
            }
            $this->getDoctrine()->getEntityManager()->remove($Paciente);
            $this->getDoctrine()->getEntityManager()->flush();
        } catch (\Exception $e) {
            return new JsonResponse(array('message' => 'Erro ao remover o paciente'), 400);
        }
        
        return new JsonResponse(array('message' => 'Paciente removido com sucesso'), 200);
    }

    /**
     * Transform Paciente into array list
     *
     * @param Paciente $Paciente
     *
     * @access protected
     * @return array
     */
    protected function getArrayList(Paciente $Paciente)
    {
        return array(
        	'id'      => $Paciente->getId(),
            'nome'    => $Paciente->getNome(),
            'mae'     => $Paciente->getNomeMae(),
            'pai'     => $Paciente->getNomePai(),
            'email'   => $Paciente->getEmail(),
            'status'  => ($Paciente->getStatus() ? 'ativo' : 'inativo'),
            'data'    => $Paciente->getData()->format('m/d/Y'),
            'actions' => array(
                array(
                    'label'  => 'remover',
                    'url'    => $this->generateUrl('patient_remove', array('paciente_id' => $Paciente->getId())),
                    'classe' => 'trash'
                )
            )
        );
    }
}