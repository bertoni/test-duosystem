<?php
/**
 * File that brings the Paciente class
 *
 * PHP Version 5.6
 *
 * @category Entity
 * @package  Patient
 * @name     Paciente
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Entity;

/**
 * Paciente class
 *
 * @category Entity
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class Paciente
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $nome;
    /**
     * @var string
     */
    protected $nome_mae;
    /**
     * @var string
     */
    protected $nome_pai;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var boolean
     */
    protected $status;
    /**
     * @var \DateTime
     */
    protected $data;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $enderecos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enderecos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Paciente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set nome_mae
     *
     * @param string $nomeMae
     *
     * @return Paciente
     */
    public function setNomeMae($nomeMae)
    {
        $this->nome_mae = $nomeMae;

        return $this;
    }

    /**
     * Get nome_mae
     *
     * @return string
     */
    public function getNomeMae()
    {
        return $this->nome_mae;
    }

    /**
     * Set nome_pai
     *
     * @param string $nomePai
     *
     * @return Paciente
     */
    public function setNomePai($nomePai)
    {
        $this->nome_pai = $nomePai;

        return $this;
    }

    /**
     * Get nome_pai
     *
     * @return string
     */
    public function getNomePai()
    {
        return $this->nome_pai;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Paciente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Paciente
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Paciente
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }




    /**
     * Add enderecos
     *
     * @param \PatientBundle\Entity\Endereco $enderecos
     *
     * @return Paciente
     */
    public function addEndereco(\PatientBundle\Entity\Endereco $enderecos)
    {
        $this->enderecos[] = $enderecos;

        return $this;
    }

    /**
     * Remove enderecos
     *
     * @param \PatientBundle\Entity\Endereco $enderecos
     */
    public function removeEndereco(\PatientBundle\Entity\Endereco $enderecos)
    {
        $this->enderecos->removeElement($enderecos);
    }

    /**
     * Get enderecos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }
}
