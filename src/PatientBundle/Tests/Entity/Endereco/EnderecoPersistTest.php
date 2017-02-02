<?php
/**
 * File that brings the Endereco Persist Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     EnderecoPersistTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Endereco;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Tests\Entity\Paciente\PacientePersistTest;
use PatientBundle\Entity\Endereco;

/**
 * Endereco Persist Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class EnderecoPersistTest extends CommomTest
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
    public function testPersistEndereco()
    {
        if (!self::$Endereco instanceof Endereco) {
            if (!self::$Paciente instanceof Paciente) {
                $PacientePersistTest = new PacientePersistTest();
                $PacientePersistTest->testPersistPaciente();
            }
            self::$Endereco = new Endereco();
            self::$Endereco->setRua('Av. Dom Pedro II, 131')
                ->setNomeBairro('Centro')
                ->setPaciente(self::$Paciente)
                ->setStatus(true)
                ->setData(new \DateTime());
            
            self::$em->persist(self::$Endereco);
            self::$em->flush();
        }
        $this->assertTrue(is_numeric(self::$Endereco->getId()));
    }
}