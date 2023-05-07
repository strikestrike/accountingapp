<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Class
 *
 * Permits email to be sent using Mail, Sendmail, or SMTP.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/libraries/email.html
 */
public function Email($data){

                $config = array(
                'useragent' => 'codeIgniter',
                'protocol' => 'mail',
                'mailpath' => '/usr/sbin/sendmail',
                'smtp_host' => 'localhost',
                'smtp_user' => 'Myemail',
                'smtp_pass' => 'mypass',
                'smtp_port' => 25,
                'smtp_timeout' => 55,
                'wordwrap' => TRUE,
                'wrapchars' => 76,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'validate' => FALSE,
                'priority' => 3,
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'bcc_batch_mode' => FALSE,
                'bcc_batch_size' => 200,
                );

                $this->load->library('email', $config);
                $this->email->set_newline('\r\n');
                $this->email->from('myemail');
                $this->email->to('');    //This is where I'm not sure.
                $this->email->subject("Reset Password");
                $this->email->message(); //Next point where I'm not sure
                $this->email->set_mailtype('html');

                if($this->email->send()){
                    return TRUE;
                }
                else{
                    return FALSE;
                }

        }
