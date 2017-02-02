<?php
/**
 * File that brings the Endereco Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Patient
 * @name     EnderecoSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Tests\Entity\Endereco;

use PatientBundle\Tests\Entity\CommomTest;
use PatientBundle\Entity\Endereco;

/**
 * Endereco Set Test class
 *
 * @category Test
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class EnderecoSetTest extends CommomTest
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
        self::$Endereco = new Endereco();
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
    public function testSetEmptyRua()
    {
        self::$Endereco->setRua('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullRua()
    {
        self::$Endereco->setRua(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongRua()
    {
        self::$Endereco->setRua(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidRua()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Endereco', self::$Endereco->setRua('Av. Dom Pedro II, 131'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyBairro()
    {
        self::$Endereco->setNomeBairro('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullBairro()
    {
        self::$Endereco->setNomeBairro(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongBairro()
    {
        self::$Endereco->setNomeBairro(
            'ioij09i1j0di1jj1 1 09191h91 h1w181 1wuh 19hd91uh9u1hd 1h d91h 1hw 9jhu 1h du1h 8w 18whd 81ygd 81h 1b w8d 18wd 1wd 91d h81d81nd8uh9ajs88c'
            . 'agiabo871816wgd 1yhb 987q 7tsv usy bi8yag8s711 bdibhsihyasya7g i1b ei1hd789qydasya7ys8ahd d biuh1iw7uydhsya87 abd hsgd12h bueh1g'
        );
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidBairro()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Endereco', self::$Endereco->setNomeBairro('Centro'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyStatus()
    {
        self::$Endereco->setStatus('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullStatus()
    {
        self::$Endereco->setStatus(null);
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidStatus()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Endereco', self::$Endereco->setStatus(true));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyData()
    {
        self::$Endereco->setData('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullData()
    {
        self::$Endereco->setData(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetDataLikeString()
    {
        self::$Endereco->setData('2017-02-01');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidData()
    {
        $this->assertInstanceOf('PatientBundle\Entity\Endereco', self::$Endereco->setData(new \DateTime()));
    }





    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        self::$Endereco = null;
    }
}