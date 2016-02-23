<?php

namespace Auth\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Description of Auth
 *
 * @author ENRIQUE
 */
class AuthFilter implements InputFilterAwareInterface {

    public $user;
    public $pass;
    protected $inputFilter;                       // <-- Add this variable

    public function exchangeArray($data) {
        $this->user = (isset($data['user'])) ? $data['user'] : null;
        $this->pass = (isset($data['pass'])) ? md5($data['pass']) : null;
    }

    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name' => 'user',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'pass',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 15,
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}
