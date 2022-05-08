<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_pesan('silahkan login.');
        redirect('auth');
    }
}

function cek_login_askk()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session_askk')) {
        set_pesan('silahkan login.');
        redirect('auth');
    }
}

function is_admin()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];

    $status = true;

    if ($role != 'admin') {
        $status = false;
    }

    return $status;
}

function is_faskes()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];

    $status = true;

    if ($role != 'faskes') {
        $status = false;
    }

    return $status;
}

function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', "<script>
        Swal.fire(
  'Sukses',
  '$pesan',
  'success'
)
</script>");
    } else {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Admin_model');

    $role = $ci->session->userdata('login_session')['role'];
    if ($role == 'admin') {
        $userId = $ci->session->userdata('login_session')['user'];
        return $ci->Admin_model->get('user', ['id_user' => $userId])[$field];
    } elseif ($role == 'faskes') {
        $faskesId = $ci->session->userdata('login_session')['id_nama_faskes'];
        return $ci->Admin_model->getdataFaskes($faskesId)[$field];
    }
}

// function userdata($field)
// {
//     // print_r($field);
//     // die;
//     $ci = get_instance();
//     $ci->load->model('Admin_model');

//     $role = $ci->session->userdata('login_session')['role'];
//     if ($role == 'admin') {
//         $userId = $ci->session->userdata('login_session')['user'];//25
//         return $ci->Admin_model->get('user', ['id_user' => $userId])[$field];//admin
//         // $cek =  $ci->admin->get('user', ['id_user' => $userId])[$field];//admin
//         // print_r($cek);
//         // die;
//     } elseif ($role == 'faskes') {
//         $faskesId = $ci->session->userdata('login_session')['id_nama_faskes'];//45
//         // return $ci->admin->getdataFaskes($faskesId)[$field];
//         $cek =  $ci->Admin_model->getdataFaskes($faskesId)[$field];
//         print_r($cek);
//         die;
//     }
// }


function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}

function sendMessage($telegram_id, $message_text)
{

    $secret_token =  "5172817911:AAF523kuERuOlJ73VmUG82dxXRinfxD8dRs";
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . $message_text;
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
