<?php
/**
 * File that brings the Paciente Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     PacienteSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Paciente;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Paciente;

/**
 * Paciente Set Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class PacienteSetTest extends CommomTest
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
        self::$Paciente = new Paciente();
        if (is_null(self::$em)) {
            self::$em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        }
    }



    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyNome()
    {
        self::$Paciente->setNome('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullNome()
    {
        self::$Paciente->setNome(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNome()
    {
        self::$Paciente->setNome(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetRepeat3LettersNome()
    {
        self::$Paciente->setNome('Arnaldo Berrrtoni Júnior');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNome()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setNome('Arnaldo Bertoni Júnior'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyNomeMae()
    {
        self::$Paciente->setNomeMae('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullNomeMae()
    {
        self::$Paciente->setNomeMae(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNomeMae()
    {
        self::$Paciente->setNomeMae(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetRepeat3LettersNomeMae()
    {
        self::$Paciente->setNomeMae('Rita   de Cássia');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNomeMae()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setNomeMae('Rita de Cássia'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyNomePai()
    {
        self::$Paciente->setNomePai('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullNomePai()
    {
        self::$Paciente->setNomePai(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNomePai()
    {
        self::$Paciente->setNomePai(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetRepeat3LettersNomePai()
    {
        self::$Paciente->setNomePai('Arnaldo Bertoniii');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNomePai()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setNomePai('Arnaldo Bertoni'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyEmail()
    {
        self::$Paciente->setEmail('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullEmail()
    {
        self::$Paciente->setEmail(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongEmail()
    {
        self::$Paciente->setEmail(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetDomainIntoEmail()
    {
        self::$Paciente->setEmail('duosystem.com.br');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidEmail()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setEmail('arnaldo.bertoni01@fatec.sp.gov.br'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyStatus()
    {
        self::$Paciente->setStatus('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullStatus()
    {
        self::$Paciente->setStatus(null);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidStatus()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setStatus(true));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyData()
    {
        self::$Paciente->setData('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullData()
    {
        self::$Paciente->setData(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetDataLikeString()
    {
        self::$Paciente->setData('2017-02-01');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidData()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Paciente', self::$Paciente->setData(new \DateTime()));
    }





    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        self::$Paciente = null;
    }
}