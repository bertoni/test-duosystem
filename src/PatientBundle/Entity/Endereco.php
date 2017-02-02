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
     * @throws Exception
     */
    public function setRua($rua)
    {
        if (strlen($rua) < 1) {
            throw new \Exception('Rua não informada');
        }
        if (strlen($rua) > 255) {
            throw new \Exception('Rua informada excede os 255 caracteres');
        }
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
     * @throws Exception
     */
    public function setNomeBairro($nomeBairro)
    {
        if (strlen($nomeBairro) < 1) {
            throw new \Exception('Bairro não informado');
        }
        if (strlen($nomeBairro) > 255) {
            throw new \Exception('Bairro informado excede os 255 caracteres');
        }
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
     * @throws Exception
     */
    public function setStatus($status)
    {
        if (!is_bool($status)) {
            throw new \Exception('Status informado incorreto');
        }
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
     * @param DateTime $data
     *
     * @return Endereco
     * @throws Exception
     */
    public function setData($data)
    {
        if (!$data instanceof \DateTime) {
            throw new \Exception('Data informada incorreta');
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return DateTime
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
