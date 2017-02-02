<?php
/**
 * File that brings the Endereco class
 *
 * PHP Version 5.6
 *
 * @category Entity
 * @package  Patient
 * @name     Endereco
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace PatientBundle\Entity;

/**
 * Endereco class
 *
 * @category Entity
 * @package  Patient
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class Endereco
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $rua;
    /**
     * @var string
     */
    protected $nome_bairro;
    /**
     * @var boolean
     */
    protected $status;
    /**
     * @var \DateTime
     */
    protected $data;
    /**
     * @var integer
     */
    protected $paciente_id;
    /**
     * @var \PatientBundle\Entity\Paciente
     */
    protected $paciente;


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
     * Set rua
     *
     * @param string $rua
     *
     * @return Endereco
     */
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get rua
     *
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set nome_bairro
     *
     * @param string $nomeBairro
     *
     * @return Endereco
     */
    public function setNomeBairro($nomeBairro)
    {
        $this->nome_bairro = $nomeBairro;

        return $this;
    }

    /**
     * Get nome_bairro
     *
     * @return string
     */
    public function getNomeBairro()
    {
        return $this->nome_bairro;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Endereco
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
     * @return Endereco
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
     * Set paciente_id
     *
     * @param integer $pacienteId
     *
     * @return Endereco
     */
    public function setPacienteId($pacienteId)
    {
        $this->paciente_id = $pacienteId;

        return $this;
    }

    /**
     * Get paciente_id
     *
     * @return integer
     */
    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    /**
     * Set paciente
     *
     * @param \PatientBundle\Entity\Paciente $paciente
     *
     * @return Endereco
     */
    public function setPaciente(\PatientBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return \PatientBundle\Entity\Paciente
     */
    public function getPaciente()
    {
        return $this->paciente;
    }
}
