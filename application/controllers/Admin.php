<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            // cek login
            if($this->session->userdata('status') != "login"){
                redirect(base_url().'rental?pesan=belumlogin');
            }
        }

        public function index()
        {
            $data['transaksi'] = $this->db->query("SELECT * FROM transaksi order by id_transaksi desc limit 10")->result();
            $data['kostumer'] = $this->db->query("SELECT * FROM kostumer order by id_kostumer desc limit 10")->result();
            $data['mobil'] = $this->db->query("SELECT * FROM mobil order by id_mobil desc limit 10")->result();
            $this->load->view('admin/header');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/footer');
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url().'rental?pesan=logout');        
        }

        public function ganti_password()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
        
        public function ganti_password_act()
        {
            $pass_baru = $this->input->post('pass_baru');
            $ulang_pass = $this->input->post('ulang_pass');

            $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
            $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                        'password_admin' => md5($pass_baru)
                );
                $w = array(
                        'id_admin' => $this->session->userdata('id')
                );
                $this->rental_model->update_data($w, $data, 'admin');
                redirect(base_url().'admin/ganti_password?pesan=berhasil');
            } else {
                $this->load->view('admin/header');
                $this->load->view('admin/ganti_password');
                $this->load->view('admin/footer');
            }    
        }
        
        public function mobil()
        {
            $data['mobil'] = $this->rental_model->get_data('mobil')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/mobil', $data);
            $this->load->view('admin/footer');
        }
        
        public function mobil_add()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/tambah_mobil');
            $this->load->view('admin/footer');
        }

        public function mobil_add_act()
        {
            $merk = $this->input->post('merk');
            $plat = $this->input->post('plat');
            $warna = $this->input->post('warna');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');

            $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
            $this->form_validation->set_rules('status', 'Status Mobil', 'required');
            
            
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'merk_mobil' => $merk,
                    'plat_mobil' => $plat,
                    'warna_mobil' => $warna,
                    'tahun_mobil' => $tahun,
                    'status_mobil' => $status
                );
                $this->rental_model->insert_data($data, 'mobil');
                redirect(base_url().'admin/mobil');
            } else {
                $this->load->view('admin/header');
            $this->load->view('admin/tambah_mobil');
            $this->load->view('admin/footer');
            }
        }

        public function mobil_edit($id)
        {
            $where = array(
                   'id_mobil' => $id 
            );
            $data['mobil'] = $this->rental_model->edit_data($where, 'mobil')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/edit_mobil', $data);
            $this->load->view('admin/footer');
        }

        public function mobil_update()
        {
            $id = $this->input->post('id');
            $merk = $this->input->post('merk');
            $plat = $this->input->post('plat');
            $warna = $this->input->post('warna');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');

            $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
            $this->form_validation->set_rules('status', 'Status Mobil', 'required');

            
            if ($this->form_validation->run() == TRUE) {
                $where = array(
                    'id_mobil' => $id
                );
                $d = array(
                    'merk_mobil' => $merk,
                    'plat_mobil' => $plat,
                    'warna_mobil' => $warna,
                    'tahun_mobil' => $tahun,
                    'status_mobil' => $status
                );
                $this->rental_model->update_data($where, $d, 'mobil');
                redirect(base_url().'admin/mobil');
            } else {
                $where = array(
                    'id_mobil' => $id
                );
                $data['mobil'] = $this->rental_model->edit_data($where, 'mobil')->result();
                $this->load->view('admin/header');
            $this->load->view('admin/edit_mobil', $data);
            $this->load->view('admin/footer');
            }
            
        }

        public function mobil_hapus($id)
        {
            $where = array(
                'id_mobil' => $id
            );
            $data['mobil'] = $this->rental_model->delete_data($where, 'mobil');
            redirect(base_url().'admin/mobil');
        }

        public function kostumer()
        {
            $data['kostumer'] = $this->rental_model->get_data('kostumer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/kostumer_view', $data);
            $this->load->view('admin/footer');
        }
        
        public function kostumer_add()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/tambah_kostumer');
            $this->load->view('admin/footer');
        }

        public function kostumer_add_act()
        {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $jk = $this->input->post('jk');
            $hp = $this->input->post('hp');
            $ktp = $this->input->post('ktp');

            $this->form_validation->set_rules('nama', 'Nama Kostumer', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nama_kostumer' => $nama,
                    'alamat_kostumer' => $alamat,
                    'jk_kostumer' => $jk,
                    'hp_kostumer' => $hp,
                    'ktp_kostumer' => $ktp
                );
                $this->rental_model->insert_data($data, 'kostumer');
                redirect(base_url().'admin/kostumer');
            } else {
                $this->load->view('admin/header');
            $this->load->view('admin/tambah_kostumer');
            $this->load->view('admin/footer');
            }
        }

        public function kostumer_edit($id)
        {
            $where = array(
                'id_kostumer' => $id
            );
            $data['kostumer'] = $this->rental_model->edit_data($where, 'kostumer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/edit_kostumer', $data);
            $this->load->view('admin/footer');
        }

        public function kostumer_update()
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $jk = $this->input->post('jk');
            $hp = $this->input->post('hp');
            $ktp = $this->input->post('ktp');

            $this->form_validation->set_rules('nama', 'Nama Kostumer', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $where = array(
                    'id_kostumer' => $id
                );

                $data = array(
                    'nama_kostumer' => $nama,
                    'alamat_kostumer' => $alamat,
                    'jk_kostumer' => $jk,
                    'hp_kostumer' => $hp,
                    'ktp_kostumer' => $ktp
                );
                $this->rental_model->update_data($where, $data, 'kostumer');
                redirect(base_url().'admin/kostumer');
            } else {
                $where = array(
                    'id_kostumer' => $id
                );
                $this->rental_model->edit_data($where, 'kostumer');
                $this->load->view('admin/header');
            $this->load->view('admin/edit_kostumer', $data);
            $this->load->view('admin/footer');
            }
        }

        public function kostumer_hapus($id)
        {
            $where = array(
                'id_kostumer' => $id
            );
            $data['kostumer'] = $this->rental_model->delete_data($where, 'kostumer');
            redirect(base_url().'admin/kostumer');
        }

        public function transaksi()
        {
            $data['transaksi'] = $this->db->query("SELECT * FROM transaksi, mobil, kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi',$data);
        $this->load->view('admin/footer');
        }

        public function transaksi_add()
        {
            $w = array('status_mobil' => '1');
            $data['mobil'] = $this->rental_model->edit_data($w, 'mobil')->result();
            $data['kostumer'] = $this->rental_model->get_data('kostumer')->result();
            $this->load->view('admin/header');
        $this->load->view('admin/tambah_transaksi',$data);
        $this->load->view('admin/footer');
        }

        public function transaksi_add_act()
        {
            $kostumer = $this->input->post('kostumer');
            $mobil = $this->input->post('mobil');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $harga = $this->input->post('harga');
            $denda = $this->input->post('denda');

            $this->form_validation->set_rules('kostumer', 'Kostumer', 'required');
            $this->form_validation->set_rules('mobil', 'Mobil', 'required');
            $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
            $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
            $this->form_validation->set_rules('denda', 'Denda', 'required');

            
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'transaksi_karyawan' => $this->session->userdata('id'),
                    'transaksi_kostumer' => $kostumer,
                    'transaksi_mobil' => $mobil,
                    'transaksi_tgl_pinjam' => $tgl_pinjam,
                    'transaksi_tgl_kembali' => $tgl_kembali,
                    'transaksi_harga' => $harga,
                    'transaksi_totaldenda' => $denda,
                    'transaksi_tgl' => date('Y-m-d')
                );
                $this->rental_model->insert_data($data, 'transaksi');

                //update status mobil yg di pinjam
                $d = array(
                    'status_mobil' => '2'
                );

                $w = array(
                    'id_mobil' => $mobil
                );

                $this->rental_model->update_data($w, $d, 'mobil');
                redirect(base_url().'admin/transaksi');
            } else {
                $w = array('status_mobil' => '1');
                $data['mobil'] = $this->rental_model->edit_data($w, 'mobil')->result();
                $data['kostumer'] = $this->rental_model->get_data('kostumer')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/transaksi_add',$data);
                $this->load->view('admin/footer');
            }
        }

        public function transaksi_hapus($id)
        {
            $w = array(
                'id_transaksi' => $id
            );
            $data = $this->rental_model->edit_data($w, 'transaksi')->row();
            $ww = array(
                'id_mobil' => $data->transaksi_mobil
            );
            $data2 = array(
                'status_mobil' => '1'
            );
            $this->rental_model->update_data($ww, $data2, 'mobil');

            $this->rental_model->delete_data($w, 'transaksi');
            redirect(base_url().'admin/transaksi');
        }

        public function transaksi_selesai($id)
        {
            $data['mobil'] = $this->rental_model->get_data('mobil')->result();
            $data['kostumer'] = $this->rental_model->get_data('kostumer')->result();
            $data['transaksi'] = $this->db->query("select * from transaksi, mobil, kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and id_transaksi='$id'")->result();
            $this->load->view('admin/header');
            $this->load->view('admin/transaksi_selesai',$data);
            $this->load->view('admin/footer');
        }

        public function transaksi_selesai_act()
        {
            $id = $this->input->post('id');
            $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $mobil = $this->input->post('mobil');
            $denda = $this->input->post('denda');
            
            $this->form_validation->set_rules('tgl_kembali', 'Tanggal Dikembalikan', 'required');
            
            
            if ($this->form_validation->run() == TRUE) {
                //menghitung selisih hari
                $batas_kembali = strtotime($tgl_kembali);
                $dikembalikan = strtotime($tgl_dikembalikan);
                $selisih = abs(($batas_kembali - $dikembalikan ) / (60*60*24));
                $total_denda = $denda * $selisih;

                //update data transaksi
                $data = array(
                    'transaksi_tgldikembalikan' => $tgl_dikembalikan,
                    'transaksi_status' => '1',
                    'transaksi_totaldenda' => $total_denda
                );
                $w = array(
                    'id_transaksi' => $id
                );

                $this->rental_model->update_data($w, $data,'transaksi');

                //update status mobil
                $data2 = array(
                    'status_mobil' => '1'
                );

                $w2 = array(
                    'id_mobil' => $mobil
                );

                $this->rental_model->update_data($w2, $data2,'mobil');
                redirect(base_url().'admin/transaksi');
            } else {
                $data['mobil'] = $this->rental_model->get_data('mobil')->result();
                $data['kostumer'] = $this->rental_model->get_data('kostumer')->result();
                $data['transaksi'] = $this->db->query("select * from transaksi, mobil, kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and id_transaksi='$id'")->result();
                $this->load->view('admin/header');
                $this->load->view('admin/transaksi_selesai',$data);
                $this->load->view('admin/footer');
            }
        }

        public function laporan()
        {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
            $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $data['laporan'] = $this->db->query("select * from transaksi, mobil, kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and date(transaksi_tgl) > '$dari'")->result();
                    $this->load->view('admin/header');
                    $this->load->view('admin/laporan_filter', $data);
                    $this->load->view('admin/footer');
            } else {
                $this->load->view('admin/header');
                $this->load->view('admin/laporan');
                $this->load->view('admin/footer');
            }
        }

        public function laporan_print()
        {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');

            if($dari != "" && $sampai != ""){
                $data['laporan'] = $this->db->query("select * from transaksi, mobil, kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and date(transaksi_tgl) > '$dari'")->result();
                $this->load->view('admin/laporan_print', $data);
            }
            else{
                redirect('admin/laporan');
            }
        }
    }
    
    
    /* End of file Admin.php */
    
?>