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
class Auth implements InputFilterAwareInterface {

    public $id;
    public $artist;
    public $title;
    protected $inputFilter;                       // <-- Add this variable

//    public function exchangeArray($data) {
//        $this->user = (isset($data['user'])) ? $data['user'] : null;
//        $this->pass = (isset($data['pass'])) ? $data['pass'] : null;
//    }

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
                    array('name' => 'Int'),
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
                            'min' => 1,
                            'max' => 100,
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}
