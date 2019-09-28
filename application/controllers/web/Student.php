<?php
use config\helpers\Help;

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{

    /*
    !--------------------------------------------------------
    !       Constructor Load During Creation of Object
    !--------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security');

    }

    /*
     !--------------------------------------------------------
     !       Student Login Page
     !--------------------------------------------------------
     */
     public function index()
     {
        if ($this->session->has_userdata('student')) {
            redirect('/');
        }

        //echo $password = sha1(md5('student'));

        $this->load->view('web/lib/header');
        $this->load->view('web/student/login');
        $this->load->view('web/lib/footer');

    }


     /*
    !--------------------------------------------------------
    !       Login Handeller
    !--------------------------------------------------------
    */
    public function login()
    {
        if ($this->session->student)
        {
            redirect('/');
        }

        
        $student_id = $this->input->post("student_id");
        $password = sha1(md5($this->input->post("password")));

        $status   = $this->db->where(['student_id'=>$student_id, 'password' => $password])->get('students');

        if ($status->result_id->num_rows > 0) {

         $data     = $status->row();
         $session  = array(
            'student'              => true,
            'student_id'           => $data->id,
            'student_username'     => $data->username,
            'student_email'        => $data->email,
            'student_address'      => $data->address,
            'student_status'       => $data->status,
        );
         $this->session->set_userdata($session);
         $this->session->set_flashdata('success', 'Successfully Loggedin');
         redirect('/');
     }else{
            //save admin accesslog
        $this->load->model('loginmodel');
        $this->loginmodel->accesslog($this->input->post('student_id'),$this->input->post('password'));
        $this->session->set_flashdata('error', 'Login Failed.<br> Please check username & password');
        redirect("student");
    }

}



    /*
     !--------------------------------------------------------
     !      Student Profile
     !--------------------------------------------------------
     */
     public function profile($username="")
     {
        // if (!$this->session->has_userdata('student')) {
        //     redirect('/');
        // }

        $status   = $this->db->where(['username' => $username])->get('students');
        if ($status->result_id->num_rows > 0) {
            $data['profile'] = $status->row();
            $page_id = 1;
            $row  = $this->db->get('projects')->num_rows();
            $perpage = 10;
            $offset = ($page_id-1) * $perpage;
            $previous_page      = $page_id - 1;
            $next_page          = $page_id + 1;
            $total_no_of_pages  = ceil($row / $perpage);
            $this->db->select("projects.*,project_categories.category_name,students.name,students.username");
            $this->db->join('project_categories','project_categories.id = projects.project_category_id');
            $this->db->join('students','projects.author = students.id');
            $this->db->where('students.username',$username);
            $this->db->order_by('projects.id','desc');
            $this->db->limit($perpage,$offset);
            $query          = $this->db->get('projects');
            $data['projects'] = $query->result_object();
            $data['page']   =  1;
            $data['pages']   =  $total_no_of_pages ;
           


            $this->load->view('web/lib/header',$data);
            $this->load->view('web/student/profile');
            $this->load->view('web/lib/footer');
            
        }else{

            redirect('error404');
        }

    }

    /*
     !--------------------------------------------------------
     !      Student Upload Page
     !--------------------------------------------------------
     */
     public function upload()
     {

        if (!$this->session->student)
        {
            $this->session->set_flashdata('error', 'You must have to login first to upload project');
            redirect('student');
        }

        $this->load->view('web/lib/header');
        $this->load->view('web/student/register');
        $this->load->view('web/lib/footer');

    }

     /*
     !--------------------------------------------------------
     !       Student Registration Page
     !--------------------------------------------------------
     */
     public function register()
     {
    
        $this->load->view('web/lib/header');
        $this->load->view('web/student/register');
        $this->load->view('web/lib/footer');

    }

    /*
     !--------------------------------------------------------
     !     Student Logout
     !--------------------------------------------------------
     */
     public function logout()
     {
        
        $this->session->sess_destroy();
        redirect('/');

    }

    

}