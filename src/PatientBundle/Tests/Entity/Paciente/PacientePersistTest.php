<?php
/**
 * File that brings the Paciente Persist Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     PacientePersistTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Paciente;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Paciente;

/**
 * Paciente Persist Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class PacientePersistTest extends CommomTest
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
    public function testPersistPaciente()
    {
        if (!self::$Paciente instanceof Paciente) {
            self::$Paciente = new Paciente();
            self::$Paciente->setNome('Arnaldo Bertoni Júnior')
                ->setNomeMae('Rita de Cássia')
                ->setNomePai('Arnaldo Bertoni')
                ->setEmail('arnaldo.bertoni01@fatec.sp.gov.br')
                ->setStatus(true)
                ->setData(new \DateTime());
    
            self::$em->persist(self::$Paciente);
            self::$em->flush();
        }
        $this->assertTrue(is_numeric(self::$Paciente->getId()));
    }
}