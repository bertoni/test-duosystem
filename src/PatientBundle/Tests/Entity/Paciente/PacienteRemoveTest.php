<?php
/**
 * File that brings the Paciente Remove Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     PacienteRemoveTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Paciente;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Paciente;

/**
 * Paciente Remove Load class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class PacienteRemoveTest extends CommomTest
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
    public function testRemovePaciente()
    {
        if (self::$Paciente instanceof Paciente) {
            $id = self::$Paciente->getId();
    
            self::$em->remove(self::$Paciente);
            self::$em->flush();
    
            $Paciente = self::$em->getRepository('PatientBundle:Paciente')
                ->find($id);
    
            $this->assertFalse($Paciente instanceof Paciente);
            self::$Paciente = null;
        }
    }
}