<?php
use config\helpers\Help;

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
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
     !       Project Homepage
     !--------------------------------------------------------
     */
     public function index($page_id=1)
     {
        $row  = $this->db->get('projects')->num_rows();
        $perpage = 10;
        $offset = ($page_id-1) * $perpage;
        $previous_page      = $page_id - 1;
        $next_page          = $page_id + 1;
        $total_no_of_pages  = ceil($row / $perpage);
        $this->db->select("projects.*,project_categories.category_name,students.name,students.username");
        $this->db->join('project_categories','project_categories.id = projects.project_category_id');
        $this->db->join('students','projects.author = students.id');
        $this->db->order_by('projects.id','desc');
        $this->db->limit($perpage,$offset);
        $query          = $this->db->get('projects');
        
        //$data['projects']  = $query->result(); 
        //echo '<pre>';
        //print_r($data['projects']);
        //exit;
        $data['projects']  = $query->result(); 
        $data['row']    = $row;
        $data['page']   = $page_id;
        $data['pages']  = (int)$total_no_of_pages;
        $data['previous_page']  = $previous_page;
        $data['next_page']      = $next_page;

        $this->load->view('web/lib/header',$data);
        $this->load->view('project/index');
        $this->load->view('web/lib/footer');
        
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
            $this->load->view('web/lib/header');
            $this->load->view('web/student/profile');
            $this->load->view('web/lib/footer');
            
        }else{

            redirect('error404');
        }

    }

    /*
     !--------------------------------------------------------
     !      Student Profile
     !--------------------------------------------------------
     */
     public function view($project_id="")
     {
        $this->db->select('projects.*,project_categories.category_name,students.name,students.username');
        $this->db->join('project_categories','projects.project_category_id = project_categories.id');
        $this->db->join('students','projects.author = students.id');
        $this->db->where(['project_id' => $project_id]);
        $status = $this->db->order_by('projects.id','desc')->get('projects');

        if ($status->result_id->num_rows > 0) {
            $data['project'] = $status->row();

            $this->db->set('page_count',$data['project']->page_count+1);
            $this->db->where('project_id',$project_id)->update('projects');
            $this->load->view('web/lib/header',$data);
            $this->load->view('project/project_details');
            $this->load->view('web/lib/footer');
            
        }else{

            redirect('error404');
        }

    }

}