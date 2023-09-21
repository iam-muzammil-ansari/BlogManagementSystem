<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            //die('Session Set'. $_SESSION['user_id']);

            $this->load->database(); // Load the database library
            $query = $this->db->query("SELECT * FROM `articles` ORDER BY blogid DESC");
            $data['result'] = $query->result_array();
            $this->load->view('adminpanel/viewblog', $data);
        } else {
            redirect('admin/login');
        }
    }

    function addblog()
    {
        $this->load->view('adminpanel/addblog');
    }

    function addblog_post()
    {
        // print_r($_POST);
        // print_r($_FILES);


        if ($_FILES) {
            //Image is Passed for upload
            $config['upload_path']          = './assets/uploads/blogimg';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                die("Error");
                //$this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                /* echo "<pre>";
                    print_r($data);
                    echo $data['upload_data']['file_name'];*/

                $fileurl = "assets/uploads/blogimg/" . $data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];

                $query = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title','$blog_desc','$fileurl')");

                if ($query) {
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect("admin/blog/addblog");
                } else {
                    $this->session->set_flashdata('inserted', 'no');
                    redirect("admin/blog/addblog");
                }
                //$this->load->view('upload_success', $data);
            }
        } else {
            //Image is not passed
        }
    }
    function editblog($blog_id)
    {
        print_r($blog_id);
        $sql = $this->db->query("SELECT `blog_title`, `blog_desc`, `blog_img` FROM `articles` WHERE `blogid`='$blog_id'");
        $data['result'] = $sql->result_array();
        $this->load->view('adminpanel/editblog',$data);
    }

    function editblog_post() {
        print_r($_POST);
        print_r($_FILES);
        if($_FILES['file']['name']) {
            die("Update File");
        }else {
            die("Update without file");
        }
    }

    public function deleteblog($blog_id)
    {
        $this->db->where('blogid', $blog_id);
        $deleted = $this->db->delete('articles');

        if ($deleted) {
            echo "deleted";
        } else {
            echo "not deleted";
        }
    }
}
