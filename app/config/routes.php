<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
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
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'Auth');
$router->get('/home', 'Home');
$router->group('/auth', function() use ($router){
    $router->match('/register', 'Auth::register', ['POST', 'GET']);
    $router->match('/login', 'Auth::login', ['POST', 'GET']);
    $router->get('/logout', 'Auth::logout');
    $router->match('/password-reset', 'Auth::password_reset', ['POST', 'GET']);
    $router->match('/set-new-password', 'Auth::set_new_password', ['POST', 'GET']);
    $router->get('/verify_email', 'Auth::verify_email');
});

//routes sa mga users
$router->match('/appointment', 'users::Appoint', array('get','post'));
$router->match('/appointments', 'users::create_appoint', ['get', 'post']);
$router->match('/services', 'users::service', array('get', 'post'));
$router->match('/econsultation', 'users::consult', array('get','post'));
$router->get('/view-appointments', 'Users::viewAppointments');
$router->post('/delete-appointment', 'Users::delete_appointment');



// $router->match('/feedback', 'users::feed', array('get','post'));
$router->match('/FAQs', 'users::faqs' , array('get','post'));
$router->match('/message', 'users::message' , array('get','post'));
$router->match('/handle-econsultation', 'users::handleFormSubmission', ['GET', 'POST']);
$router->match('/user-profile', 'Users::Profile', array('GET'));
$router->match('/update-profile', 'Users::update_profile', array('POST'));



// routes sa mga admin
$router->match('/adminpage', 'admin', array('get','post'));
$router->match('/reports', 'admin::report', array('get', 'post'));
$router->match('/users', 'admin::users', array('get', 'post'));
$router->match('/feeds', 'admin::feeds', array('get', 'post'));
$router->match('/admin/update_status', 'Admin::update_status', array('POST'));
$router->get('/check-slots', 'Users::checkSlots');


