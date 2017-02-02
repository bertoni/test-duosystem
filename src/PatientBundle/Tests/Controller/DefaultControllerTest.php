<?php

namespace PatientBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @var    EntityManager
     * @access protected
     */
    protected static $em__;
    /**
     * @var    Container
     * @access protected
     */
    protected static $container__;
    /**
     * @var    integer
     * @access protected
     */
    protected static $id;

    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::bootKernel();
        self::$container__ = static::$kernel->getContainer();
        if (is_null(self::$em__)) {
            self::$em__ = self::$container__->get('doctrine')
                ->getManager();
        }
    }


    /**
     * @access public
     * @return void
     */
    public function testAssertControllerList()
    {
        $client = static::createClient();
        $client->request('GET', self::$container__->get('router')->generate('patient_homepage', array()));
    
        $this->assertEquals(
            'PatientBundle\Controller\DefaultController::indexAction',
            $client->getRequest()->attributes->get('_controller')
        );
    }

    /**
     * @access public
     * @return void
     */
    public function testHtmlElements()
    {
        $client  = static::createClient();
        $crawler = $client->request('GET', self::$container__->get('router')->generate('patient_homepage', array()));
        
        $this->assertContains('Pacientes', $client->getResponse()->getContent());

        $this->assertEquals(1, $crawler->filter('form[id="form-paciente"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="text"][name="nome"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="email"][name="email"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="text"][name="mae"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="text"][name="pai"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="text"][name="rua"]')->count());
        $this->assertEquals(1, $crawler->filter('input[type="text"][name="bairro"]')->count());
        $this->assertEquals(1, $crawler->filter('button[type="submit"]')->count());
    }    

    /**
     * @access public
     * @return void
     */
    public function testSubmitForm()
    {
        $client = static::createClient();
        $client->request('GET', self::$container__->get('router')->generate('patient_homepage', array()));
    
        $crawler = $client->getCrawler();
        $form    = $crawler->filter('form#form-paciente')->form();
    
        $time = time();
    
        $form['nome']   = 'Paciente ' . $time;
        $form['email']  = 'paciente' . $time . '@gmail.com';
        $form['mae']    = 'Mãe do Paciente ' . $time;
        $form['pai']    = 'pai do Paciente ' . $time;
        $form['rua']    = 'Rua do Paciente ' . $time;
        $form['bairro'] = 'Bairro do Paciente ' . $time;
    
        $client->submit($form);
    
        $this->assertEquals(
            'PatientBundle\Controller\DefaultController::addAction',
            $client->getRequest()->attributes->get('_controller')
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    
        $json_return = json_decode($client->getResponse()->getContent());
        $this->assertArrayHasKey('paciente', (array)$json_return);
        
        $paciente = (array)$json_return->paciente;
        $this->assertArrayHasKey('id',      (array)$paciente);
        $this->assertArrayHasKey('nome',    (array)$paciente);
        $this->assertArrayHasKey('mae',     (array)$paciente);
        $this->assertArrayHasKey('pai',     (array)$paciente);
        $this->assertArrayHasKey('email',   (array)$paciente);
        $this->assertArrayHasKey('status',  (array)$paciente);
        $this->assertArrayHasKey('data',    (array)$paciente);
        $this->assertArrayHasKey('actions', (array)$paciente);
        
        self::$id = $paciente['id'];
    }

    /**
     * @access public
     * @return void
     */
    public function testAssertControllerRemove()
    {
        $client = static::createClient();
        $client->request('GET', self::$container__->get('router')->generate('patient_remove', array('paciente_id' => 0)));
    
        $this->assertEquals(
            'PatientBundle\Controller\DefaultController::removeAction',
            $client->getRequest()->attributes->get('_controller')
        );
        
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $json_return = json_decode($client->getResponse()->getContent());
        $this->assertArrayHasKey('message', (array)$json_return);
    }

    /**
     * @access public
     * @return void
     */
    public function testRemovePaciente()
    {
        $client = static::createClient();
        $client->request('GET', self::$container__->get('router')->generate('patient_remove', array('paciente_id' => self::$id)));
    
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $json_return = json_decode($client->getResponse()->getContent());
        $this->assertArrayHasKey('message', (array)$json_return);
    }
}