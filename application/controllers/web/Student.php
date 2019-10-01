<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use config\helpers\Help;
use Intervention\Image\ImageManager as Image;


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
            'student_image'        => $data->image
        );
           $this->session->set_userdata($session);
           $this->session->set_flashdata('success', 'Successfully Loggedin');
           redirect('student/profile/'.$data->username);
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

        $status   = $this->db->where(['username' => $username])->get('students');
        if ($status->result_id->num_rows > 0) {
            $data['profile'] = $status->row();
            $page_id = 1;
            $row  = $this->db->get('projects')->num_rows();
            $perpage = 5;
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
            $data['next_page']   =  $page_id+1 ;

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

        $data['categories'] = $this->db->order_by('category_name','asc')->get('project_categories')->result_object();
        $this->load->view('web/lib/header',$data);
        $this->load->view('web/student/upload');
        $this->load->view('web/lib/footer');

    }


     /*
     !--------------------------------------------------------
     !      Uplaod Files Action
     !--------------------------------------------------------
     */
     public function upload_project()
     {

        if (!$this->session->student)
        {
            $this->session->set_flashdata('error', 'You must have to login first to upload project');
            redirect('student');
        }

        $statement     = $this->db->order_by('id','desc')->limit(1)->get('projects');

        if (empty($statement)) {
            $data['project_id'] =  str_pad(1,8,0,STR_PAD_LEFT); 
        }else{
            $row = $statement->row();
            $data['project_id'] =   str_pad($row->project_id + 1,8,0,STR_PAD_LEFT);
        }

        $data['project_title']   = $this->input->post('project_title');
        $data['project_category_id']   = $this->input->post('project_category_id');
        $data['author']         = $this->input->post('author');
        $data['actors']          = $this->input->post('actors');
        $data['requirement_analysis']  = $this->input->post('requirement_analysis');
        $data['documentation']  = $this->input->post('documentation');
        $data['summary']        = $this->input->post('summary');
        $data['created_at']     = date('Y-m-d H:i:s');
        $data['updated_at']     = date('Y-m-d H:i:s');
        $this->db->insert('projects',$data);
        $statement = $this->db->order_by('id','desc')->limit(1)->get('projects');
        $row = $statement->row();

        if (!file_exists('uploads/project/'.$data['project_id'])) {
            mkdir('./uploads/project/'.$data['project_id'], 0777, TRUE);
        }
        redirect(base_url().'student/profile/'.$this->session->student_username,'refresh');

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
     !       Student Registration Action
     !--------------------------------------------------------
     */
     public function register_action()
     {

        $data['student_id'] = $this->input->post('student_id');
        $data['name'] = $this->input->post('name');
        $data['username'] = $this->input->post('username');
        $data['password']  = $this->input->post('password');
        $i = 0;

        if( $this->db->where('student_id',$data['student_id'])->get('students')->num_rows() > 0)
        {
            $this->session->set_flashdata('student_id', 'Student ID already exist. Choose another');
            $i++;
        }

        if( $this->db->where('username',$data['username'])->get('students')->num_rows() > 0)
        {
            $this->session->set_flashdata('username', 'Username already exist. Choose another');
            $i++;
        }

        if( strlen($data['password']) < 6)
        {
            $this->session->set_flashdata('password', 'Password must be six characters long');
            $i++;
        }


        if ( $i==0 ) {
            $data['password'] = sha1(md5($data['password']));
            $this->db->insert('students',$data);
            $this->session->set_flashdata('success', 'Successfully Loggedin');
            redirect('student/profile/'.$data['username']);
        }else
        {
         redirect('student/register');
     }

    }


    /*
     !--------------------------------------------------------
     !     Student Logout
     !--------------------------------------------------------
     */
    public function upload_thumbnail($project_id)
    {
        if (!empty($_FILES['thumbnail']['name'])) {
                
            $config['upload_path']   = './uploads/project/'.$project_id;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|PNG|JPG|JPEG';
            $config['max_size']      = 10000;
            $config['max_width']     = 10000;
            $config['max_height']    = 10000;
            $config['file_name']     = 'thumbnail';
            $file_name               = $config['file_name'].$project_id.'.jpg'; //thumb image as .jpg format
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $obj = new Image;
            $img = $obj->make($_FILES['thumbnail']['tmp_name']);
            $img->save('uploads/project/'.$project_id.'/'.$file_name);
            $this->db->set(['thumbnail'=>$file_name]);
            $this->db->where('project_id',$project_id);
            $this->db->update('projects');   
            
        } else{
            $this->db->set(['thumbnail'=>'default.png']);
            $this->db->where('project_id',$project_id);
            $this->db->update('projects');   
        }
    }

     /*
     !--------------------------------------------------------
     !     Project Flowchart Upload
     !--------------------------------------------------------
     */
    public function upload_flowchart($project_id)
    {
        if (!empty($_FILES['flowchart']['name'])) {
                
            $config['upload_path']   = './uploads/project/'.$project_id;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|PNG|JPG|JPEG';
            $config['max_size']      = 10000;
            $config['max_width']     = 10000;
            $config['max_height']    = 10000;
            $config['file_name']     = 'flowchart';
            $file_name               = $config['file_name'].$project_id.'.jpg'; //thumb image as .jpg format
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $obj = new Image;
            $img = $obj->make($_FILES['flowchart']['tmp_name']);
            $img->save('uploads/project/'.$project_id.'/'.$file_name);
            $this->db->set(['flowchart'=>$file_name]);
            $this->db->where('project_id',$project_id);
            $this->db->update('projects');   
            
        } 
    }



     /*
     !--------------------------------------------------------
     !     Upload Report
     !--------------------------------------------------------
     */
    public function upload_report($project_id)
    {
        if (!empty($_FILES['report']['name'])) {

            $config['upload_path'] = './uploads/project/'.$project_id.'/';
            $config['allowed_types'] = 'docx|doc|xlxs|pdf|PDF';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('report')) {
                $upload_data = array('upload_data' => $this->upload->data());
                $data['report'] = $upload_data['upload_data']['file_name'];
                $this->db->set(['report'=>$data['report']]);
                $this->db->where('project_id',$project_id);
                $this->db->update('projects');   
            } 
        }
    }

      /*
     !--------------------------------------------------------
     !     Upload Zip File
     !--------------------------------------------------------
     */
    public function upload_zip($project_id)
    {
        if (!empty($_FILES['zip_file']['name'])) {

            $config['upload_path'] = './uploads/project/'.$project_id.'/';
            $config['allowed_types'] = 'zip|rar|tar|pdf|PDF|ZIP|RAR|TAR';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('zip_file')) {
                $upload_data = array('upload_data' => $this->upload->data());
                $data['zip_file'] = $upload_data['upload_data']['file_name'];
                $this->db->set(['zip_file'=>$data['zip_file']]);
                $this->db->where('project_id',$project_id);
                $this->db->update('projects');   
            } 
        }
    }



    /*
    !--------------------------------------------------------
    !     Upload prifle pic
    !--------------------------------------------------------
     */
public function upload_profile_pic()
    {
        $file   = $this->db->where(['id'=>$this->session->student_id])->get('students')->row();
        if (!empty($_FILES['image']['name'])) {

            if (file_exists("./uploads/student/".$file->image)) {
                unlink("./uploads/student/".$file->image);
            }

            $config['upload_path'] = './uploads/student/';
            $config['allowed_types'] = 'jpg|JPG|JPEG|jpeg|PNG|png';
            $config['file_name'] = time();
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = array('upload_data' => $this->upload->data());
                $image = $upload_data['upload_data']['file_name'];
                $this->db->set(['image'=>$image]);
                $this->db->where('id',$this->session->student_id);
                $this->db->update('students');   
                $this->session->set_userdata(['student_image'=> $image]);
            } 
        }

        redirect(base_url().'student/profile/'.$this->session->student_username,'refresh');
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