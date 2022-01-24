<?php

function cek_login() {
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Error!</strong> Akses ditolak. Anda belum login!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}