<?php
/**
 * File that brings the Endereco Load Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     EnderecoLoadTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Endereco;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Endereco;

/**
 * Endereco Load Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class EnderecoLoadTest extends CommomTest
{
    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::bootKernel();
        if (is_null(self::$em)) {
            self::$em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        }
    }



    /**
     * @access public
     * @return void
     */
    public function testLoadEndereco()
    {
        $Endereco = self::$em->getRepository('PatientBundle:Endereco')
            ->find(self::$Endereco->getId());
        $this->assertInstanceOf('PatientBundle\Entity\Endereco', $Endereco);
    
        $this->assertEquals($Endereco->getId(),         self::$Endereco->getId());
        $this->assertEquals($Endereco->getRua(),        self::$Endereco->getRua());
        $this->assertEquals($Endereco->getNomeBairro(), self::$Endereco->getNomeBairro());
        $this->assertEquals($Endereco->getPacienteId(), self::$Endereco->getPacienteId());
        $this->assertEquals($Endereco->getStatus(),     self::$Endereco->getStatus());
        $this->assertEquals($Endereco->getData(),       self::$Endereco->getData());
    }
}