<?php

/**
 * Created by PhpStorm.
 * User: Akshat
 * Date: 7/19/2017
 * Time: 1:40 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Certificates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    }

    public function index()
    {
        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/header', ['username' => $username]);
        $this->load->view('private/certificates/cert_view');
    }

    public function slc_new()
    {

        $data=$this->input->post();
        unset($data['submit']);
        //print_r($data);

        if ($this->form_validation->run('sln')) {
        //      Code for genrating pdf in school leaving certificate
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SchoolERP');
        $pdf->SetTitle('Transfer Certificate');
        $pdf->SetSubject('TC');
        $pdf->SetKeywords('TC,School Leaving');
        $pdf->AddPage();


        // create some HTML content

        $html = '
            <div style="font-size: 12px;">
            <i>School Code: 871238<br>
            Dise Code&nbsp;&nbsp; : 127392</i>
            </div>
            
            <p style="font-size: 25px; font-weight: bold; text-align: center">
            Simpkins Senior Secondary School<br>
            Maruti Estate, Shahganj Agra-282010
            </p>
            
            <p style="font-size: 20px; text-align: center; font-weight: bold;">
            Transfer Certificate
            </p>
            <p style="font-size: 15px;">
                This is to certify that <b>'.$data['student_name'].'</b> Son of Mr. <b>'.$data['f_name'].'</b>
                and Mrs.<b> '.$data['m_name'].'</b> was reading in class <b>'.$data['class'].'</b> of the
                school <b>'.$data['school_name'].'</b> .He has ended school from <b>'.$data['end_date'].'</b> to
                <b>'.$data['start_date'].'</b> having paid all fees dues to school.
            </p>
            <p style="font-size: 15px;">
                According to Admission Register his Date of birth (In Figures)<b> '.$data['dob'].'</b>,
                In Words <b>'.$data['dob_words'].'</b>.
            </p>
            <p style="font-size: 15px;">
                He has been vaccinated or immunized against smll pox. Details of last examination passed by him are as follows
                 :--
            </p>
            <p style="font-size: 15px;">
                Class <b>'.$data['class_present'].'</b> Medium English, Year <b>'.$data['year'].'</b>.
                He was admitted to this school in class <b>'.$data['start_class'].'</b>.He belongs to <b>'.$data['caste_name'].'</b>
                caste.
            </p>
            <p style="font-size: 15px;">
            He possess a good character.<br><br>
            Presently he is promoted to class --<br><br>
            His attendance is above average.<br>
</p>
<p style="font-size: 15px; text-align: right;">
                Principal
            </p>';

        $pdf->writeHTML($html, true, false, true, false, 'center');
        //Close and output PDF document
        $pdf->output();

    }
    else{

        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/slc_header', ['username' => $username]);
        $this->load->view('private/certificates/slc_new');
//        echo 'Form Validation Failed';
    }
    }

    public function entrance_test()
    {
        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/et_header', ['username' => $username]);
        $this->load->view('private/certificates/entrance_test');
    }

    public function student_cert()
    {
        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/sc_header', ['username' => $username]);
        $this->load->view('private/certificates/student_cert');
    }

    public function school_leaving_cert()
    {

        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();


        $this->load->view('private/certificates/slc_header', ['username' => $username]);
        $this->load->view('private/certificates/school_leaving_cert');
    }

    public function teacher_cert_l()
    {
        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/tcl_header', ['username' => $username]);
        $this->load->view('private/certificates/teacher_cert_l');
    }

    public function teacher_cert_p()
    {
        $this->load->model('get_header_info', 'ghi');
        $username = $this->ghi->get_admin();
        $this->load->view('private/certificates/tcp_header', ['username' => $username]);
        $this->load->view('private/certificates/teacher_cert_p');
    }
}