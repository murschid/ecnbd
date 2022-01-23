<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('blog', $this->session->userdata('language'));
        if (!mycrypt::localhost()) {
            mycrypt::userinfo($this->input->ip_address());
            mycrypt::onlinecounter();
        }
    }

    public function index() {
        header('refresh:1800');
        $data['title'] = lang('ecn').' | '.lang('recent');
        $data['home'] = array('main' => 'active');
        #Pagination_Start
        $config['base_url'] = base_url('article/index');
        $config['total_rows'] = $this->external_model->countall('tb_posts', array('active' => 1));
        $offset = $this->uri->segment(3);
        $limit = $config['per_page'] = 8;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['posts'] = $this->external_model->exquery('tb_posts', $offset, $limit, 'DESC', array('active' => 1));
        $data['sliders'] = $this->external_model->exquery('tb_posts', NULL, 3, 'DESC', array('active' => 1, 'intro' => 1));
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('active' => 1, 'intro' => 1));
        $data['view'] = 'external/content';
        $data['sidebar'] = 'external/sidebars/sidebar-long';
        $this->load->view('external/index', $data);
    }

    public function others() {
        $data['title'] = lang('ecn').' | '.lang('others');
        $data['others'] = array('main' => 'active');
        $wherein = array('agriculture', 'rivers', 'health');
        $data['posts'] = $this->external_model->wherein('tb_posts', NULL, NULL, 'DESC', array('active' => 1), $wherein);
        $data['sliders'] = $this->external_model->exquery('tb_posts', NULL, 3, 'DESC', array('active' => 1, 'intro' => 1));
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('active' => 1, 'intro' => 1));
        $data['view'] = 'external/content';
        $data['sidebar'] = 'external/sidebars/sidebar';
        $this->load->view('external/index', $data);
    }

    public function category() {
        $cat = $this->uri->segment(3);
        if (in_array($cat, array('agriculture', 'health', 'rivers'))){
            $data['others'] = array('main' => 'active');
        }else{
            $data[$cat] = array('main' => 'active');
        }
        #Pagination_Start
        $config['base_url'] = base_url('article/category/'.$cat);
        $config['total_rows'] = $this->external_model->countall('tb_posts', array('active' => 1, 'category' => $cat));
        $offset = $this->uri->segment(4);
        $limit = $config['per_page'] = 8;
        $config['uri_segment'] = 4;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['posts'] = $this->external_model->exquery('tb_posts', $offset, $limit, 'DESC', array('active' => 1, 'category' => $cat));
        $data['sliders'] = $this->external_model->exquery('tb_posts', NULL, 3, 'DESC', array('active' => 1, 'intro' => 1));
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('active' => 1, 'intro' => 1));
        $data['title'] = lang('ecn').' | '.lang($cat);
        $data['view'] = 'external/content';
        $data['sidebar'] = 'external/sidebars/sidebar-long';
        $this->load->view('external/index', $data);
    }

    public function archive() {
        $date = $this->uri->segment(3);
        #Pagination_Start
        $config['base_url'] = base_url('article/archive/'.$date);
        $config['total_rows'] = $this->external_model->countall('tb_posts', array('active' => 1, 'archive' => $date));
        $offset = $this->uri->segment(4);
        $limit = $config['per_page'] = 30;
        $config['uri_segment'] = 4;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['archives'] = $this->external_model->exquery('tb_posts', $offset, $limit, 'DESC', array('active' => 1, 'archive' => $date));
        $data['sliders'] = $this->external_model->exquery('tb_posts', NULL, 3, 'DESC', array('active' => 1, 'intro' => 1));
        #$data['intro'] = $this->external_model->exsquery('tb_posts', array('active' => 1, 'intro' => 1));
        $data['title'] = lang('ecn').' | '.lang('archive');
        $data['view'] = 'external/archive';
        $data['sidebar'] = 'external/sidebars/sidebar-long';
        $this->load->view('external/index', $data);
    }

    public function details($id) {
        $data['post'] = $this->external_model->exsquery('tb_posts', array('id' => $id));
        if($data['post']){
            $this->external_model->fieldupdate('tb_posts', 'clicks', array('id' => $id));
            $data['comments'] = $this->external_model->exquery('tb_comments', NULL, NULL, 'DESC', array('postid' => $id, 'active' => 1));
            $data['title'] = lang('ecn').' | '.$data['post']->title;
            $data['metaauth'] = $data['post']->writer;
            $data['metadesc'] = $data['post']->short_desc;
            $data['metaimg'] = $data['post']->images;
            $data['metaurl'] = $data['post']->id;
            $data['view'] = 'external/single-large';
            $data['sidebar'] = 'external/sidebars/sidebar-detail';
            $this->load->view('external/index', $data);
        }else{
            redirect($this->agent->referrer());
        }

    }

    public function contact() {
        $data['title'] = lang('ecn').' | '.lang('contact');
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
        $data['view'] = 'external/contact';
        $data['sidebar'] = 'external/sidebars/sidebar-short';
        $this->load->view('external/index', $data);
    }

    public function about() {
        $data['title'] = lang('ecn').' | '.lang('about');
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
        $data['view'] = 'external/about';
        $data['sidebar'] = 'external/sidebars/sidebar-short';
        $this->load->view('external/index', $data);
    }

    public function policy() {
        $data['title'] = lang('ecn').' | '.lang('policy');
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
        $data['view'] = 'external/policy';
        $data['sidebar'] = 'external/sidebars/sidebar-short';
        $this->load->view('external/index', $data);
    }

    public function terms() {
        $data['title'] = lang('ecn').' | '.lang('cterms');
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
        $data['view'] = 'external/terms';
        $data['sidebar'] = 'external/sidebars/sidebar-short';
        $this->load->view('external/index', $data);
    }

    public function search(){
        if ($this->input->post('searchr') != NULL){
            $this->form_validation->set_rules('searchr', 'Search', 'trim|xss_clean|required|min_length[1]|max_length[500]');
            if ($this->form_validation->run() == TRUE) {
                $sdata = array(
                    'title' => $this->input->post('searchr'),
                    'tags' => $this->input->post('searchr')
                );
                #$data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
                $data['archives'] = $this->external_model->search('tb_posts', $sdata);
                $data['title'] = lang('ecn').' | '.lang('search_result');
                $data['view'] = 'external/archive';
                $data['sidebar'] = 'external/sidebars/sidebar';
                $this->load->view('external/index', $data);
            }
        } else{
            redirect('article');
        }
    }

    public function ajaxsearch(){
        if ($this->input->post('searchr') != NULL) {
            $this->form_validation->set_rules('searchr', 'Search', 'trim|xss_clean|required');
            if ($this->form_validation->run() == TRUE) {
                $sdata = array(
                    'title' => $this->input->post('searchr'),
                    'tags' => $this->input->post('searchr')
                );
                $data['searched'] = $this->external_model->search('tb_posts', $sdata);
                $this->load->view('external/ajaxresult', $data);
            }
        }
    }

    public function subscribe() {
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[40]|is_unique[tb_subscribers.email]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'email' => $this->input->post('email'),
                'token' => sha1(uniqid()),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->external_model->exinsert('tb_subscribers', $data)) {
                $this->session->set_flashdata('subsuccess', lang('sub_success'));
            } else {
                $this->session->set_flashdata('suberrors', lang('sub_error'));
            }
        } else {
            $this->session->set_flashdata('suberrors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function addcomment() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[40]');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean|min_length[3]|max_length[600]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'postid' => $this->input->post('postid'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'comment' => $this->input->post('comment'),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->session->userdata('ecnuserauth')){
                $data['photo'] = $this->session->userdata('ecnuserauth')['photo'];
            }
            if ($this->external_model->exinsert('tb_comments', $data)) {
                $this->external_model->fieldupdate('tb_posts', 'comments', array('id' => $this->input->post('postid')));
                $this->session->set_flashdata('success', lang('com_success'));
            } else {
                $this->session->set_flashdata('errors', lang('com_error'));
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function printhis($id){
        $data['post'] = $this->external_model->exsquery('tb_posts', array('id' => $id));
        if($data['post']){
            $data['title'] = lang('ecn').' | '.$data['post']->title;
            $data['metadesc'] = $data['post']->short_desc;
            $data['metaimg'] = $data['post']->images;
            $data['metaurl'] = $data['post']->id;
            $this->load->view('external/printnews', $data);
        }else{
            redirect($this->agent->referrer());
        }

    }

    public function short(){
        $data['post'] = $this->external_model->exsquery('tb_posts', array('id' => 3));
        if($data['post']){
            $data['title'] = lang('ecn').' | '.lang('details');
            $this->external_model->fieldupdate('tb_posts', 'clicks', array('id' => 3));
            #$data['comments'] = $this->external_model->exquery('tb_comments', NULL, NULL, 'DESC', array('postid' => 3, 'active' => 1));
            $data['view'] = 'external/single';
            $data['sidebar'] = 'external/sidebars/sidebar';
            $this->load->view('external/index', $data);
        }else{
            redirect($this->agent->referrer());
        }

    }

    public function ajaxshare(){
        $id = $this->input->post('postid');
        $field = $this->input->post('field');
        $this->external_model->fieldupdate('tb_posts', $field, array('id' => $id));
    }

}
