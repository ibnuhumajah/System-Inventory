<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
?>
            <link href="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.css" rel="stylesheet">
            <script src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.js"></script>
            <style>
                body {
                    font-family: "Nunito", Arial, Helvetica, sans-serif;
                    font-size: 1.124em;
                    font-weight: normal;
                }
            </style>

            <body></body>
            <?php
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level,
                );
                $this->session->set_userdata($params);
                echo "<script>
                        window.location='" . site_url('dashboard') . "';
                        </script>";
            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal login',
                        text: 'Username atau password salah!'
                    }).then((result) => {
                        window.location = '<?= site_url('auth/login') ?>';
                    })
                </script>
<?php
            }
        }
    }

    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
