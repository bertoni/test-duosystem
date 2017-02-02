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

use Symfony\Component\Validator\ValidatorBuilder as Validator;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

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
     * @var \Symfony\Component\Validator\Validator
     */
    protected $validator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enderecos = new \Doctrine\Common\Collections\ArrayCollection();
        
        $factory         = new Validator;
        $this->validator = $factory->getValidator();
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
     * @throws Exception
     */
    public function setNome($nome)
    {
        if (strlen($nome) < 1) {
            throw new \Exception('Nome não informado');
        }
        if (strlen($nome) > 255) {
            throw new \Exception('Nome informado excede os 255 caracteres');
        }
        try {
            $this->_validateName($nome);
        } catch (\Exception $e) {
            throw $e;
        }
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
     * @throws Exception
     */
    public function setNomeMae($nomeMae)
    {
        if (strlen($nomeMae) < 1) {
            throw new \Exception('Nome da mãe não informado');
        }
        if (strlen($nomeMae) > 255) {
            throw new \Exception('Nome da mãe informado excede os 255 caracteres');
        }
        try {
            $this->_validateName($nomeMae);
        } catch (\Exception $e) {
            throw $e;
        }
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
     * @throws Exception
     */
    public function setNomePai($nomePai)
    {
        if (strlen($nomePai) < 1) {
            throw new \Exception('Nome do pai não informado');
        }
        if (strlen($nomePai) > 255) {
            throw new \Exception('Nome do pai informado excede os 255 caracteres');
        }
        try {
            $this->_validateName($nomePai);
        } catch (\Exception $e) {
            throw $e;
        }
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
     * @throws Exception
     */
    public function setEmail($email)
    {
        if (strlen($email) < 1) {
            throw new \Exception('Email não informado');
        }
        if (strlen($email) > 255) {
            throw new \Exception('Email informado excede os 255 caracteres');
        }
        $emailConstraint = new EmailConstraint();
        $errors          = $this->validator->validateValue($email, $emailConstraint);
        if (count($errors) > 0) {
            throw new \Exception((string)$errors);
        }
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
     * @return Paciente
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

    /**
     * Validate name
     * 
     * @param string $name
     *
     * @return void
     * @throws \Exception
     */
    private function _validateName($name)
    {
        $last     = null;
        $quantity = 1;
        $lenth    = strlen($name);
        for ($i=0; $i<$lenth; $i++) {
            if ($last == $name[$i]) {
                $quantity++;
                if ($quantity > 2) {
                    throw new \Exception('Não é permitido o uso de letras iguais');
                }
            } else {
                $last     = $name[$i];
                $quantity = 1;
            }
        }
    }
}