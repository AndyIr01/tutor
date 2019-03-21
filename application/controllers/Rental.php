<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Rental extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('rental_model');
        }

        public function index()
        {
            $this->load->view('auth/login_view');
        }

        public function login()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $where = array(
                    'username_admin' => $username,
                    'password_admin' => md5($password)
                );

            $data = $this->rental_model->edit_data($where, 'admin');
            $d    = $this->rental_model->edit_data($where, 'admin')->row();
            
            $cek = $data->num_rows();
            
            if ($cek > 0) {
                $session = array(
                    'id' => $d->id_admin,
                    'nama' => $d->nama_admin,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url().'admin');
            } else {
                redirect(base_url().'rental?pesan=gagal');
            }
            
            } else {
                $this->load->view('auth/login_view');
            }
        }

        public function regUser()
        {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $this->form_validation->set_rules('nama', 'Fullname', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'nama_admin' => $nama,
                    'username_admin' => $username,
                    'password_admin' => md5($password)
                );

                $this->rental_model->insert_data($data, 'admin');
                redirect(base_url().'rental?pesan=berhasilreg');
            } else {
                redirect(base_url().'rental?pesan=gagalreg');
            }
            
        }
    }
    
    
    /* End of file Rental.php */
    
?>