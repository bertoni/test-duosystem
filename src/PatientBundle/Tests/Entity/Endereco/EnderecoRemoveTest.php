<?php
/**
 * File that brings the Endereco Remove Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     EnderecoRemoveTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Endereco;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Tests\Entity\Paciente\PacienteRemoveTest;
use PatientBundle\Entity\Endereco;

/**
 * Endereco Remove Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class EnderecoRemoveTest extends CommomTest
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
    public function testRemoveEndereco()
    {
        if (self::$Endereco instanceof Endereco) {
            $id = self::$Endereco->getId();
    
            self::$em->remove(self::$Endereco);
            self::$em->flush();
    
            $Endereco = self::$em->getRepository('PatientBundle:Endereco')
                ->find($id);
    
            $this->assertFalse($Endereco instanceof Endereco);
            self::$Endereco = null;
            
            $PacienteRemoveTest = new PacienteRemoveTest();
            $PacienteRemoveTest->testRemovePaciente();
        }
    }
}