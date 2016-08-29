<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Captcha\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Captcha\Recaptcha\ReCaptcha;

/**
 * CakePHP CaptchaComponent
 * @author ivan
 */
class CaptchaComponent extends Component {
    
    private $secret = NULL;
    
    public $ReCaptcha = NULL;
    public $response = null;

    /**
     * Initialize the component
     */
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->secret = Configure::read('Captcha.secret');
        $this->ReCaptcha = new ReCaptcha($this->secret);
        
        return null;
    }
    
    /**
     * Check
     * @param string $ip IPv4 address
     * @param string $gRecaptchaResponse
     * @return boolean
     */
    public function check($ip,$gRecaptchaResponse) {
        return $this->ReCaptcha->verifyResponse($ip,$gRecaptchaResponse);
    }
}