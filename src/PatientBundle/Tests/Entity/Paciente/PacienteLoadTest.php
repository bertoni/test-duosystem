<?php
/**
 * File that brings the Paciente Load Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     PacienteLoadTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Paciente;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Paciente;

/**
 * Paciente Persist Load class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class PacienteLoadTest extends CommomTest
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
    public function testLoadPaciente()
    {
        $Paciente = self::$em->getRepository('PatientBundle:Paciente')
            ->find(self::$Paciente->getId());
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', $Paciente);
    
        $this->assertEquals($Paciente->getId(),      self::$Paciente->getId());
        $this->assertEquals($Paciente->getNome(),    self::$Paciente->getNome());
        $this->assertEquals($Paciente->getNomeMae(), self::$Paciente->getNomeMae());
        $this->assertEquals($Paciente->getNomePai(), self::$Paciente->getNomePai());
        $this->assertEquals($Paciente->getEmail(),   self::$Paciente->getEmail());
        $this->assertEquals($Paciente->getStatus(),  self::$Paciente->getStatus());
        $this->assertEquals($Paciente->getData(),    self::$Paciente->getData());
    }
}