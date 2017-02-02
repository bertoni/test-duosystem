<?php
/**
 * File that brings the Commom Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     CommomTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Commom Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class CommomTest extends WebTestCase
{
    /**
     * @var    EntityManager
     * @access protected
     */
    protected static $em;
    /**
     * @var    Endereco
     * @access protected
     */
    protected static $Endereco;
    /**
     * @var    Paciente
     * @access protected
     */
    protected static $Paciente;
}