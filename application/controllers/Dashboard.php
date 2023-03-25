<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{

		parent ::__construct();
		//load model
		$this->load->library('templatebe');
		$this->load->model('mPost');
        $this->load->model('mCart');
		$this->load->model('mGallery');
		if($this->session->userdata('status') != "login"){
			redirect("auth/logout");
		}
	}

    public function index()
	{
        $data['countPost'] = $this->db->count_all_results('posts');
        $data['countGallery'] = $this->db->count_all_results('gallery');
        $data['data'] = $this->mGallery->getGalleryHome();
		$this->templatebe->view('be/home',$data);
	}

	public function listPost()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listPost'); //site url
        $config['total_rows'] = $this->db->count_all('posts'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mPost->getPost($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/post/listPost', $data);
	}
	
	public function addPost()
	{
		$this->templatebe->view('be/post/addPost');
	}

	function addPost_action(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		if($this->input->post('submit')=='publish'){
			$status = 1;
		} else {
			$status = 0;
		}
		$this->load->library('upload');
        $nmfile = "file-".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './style/upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5048'; //maksimum besar file 2M
        $config['max_width']  = '3488'; //lebar maksimum 1288 px
        $config['max_height']  = '2268'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
		if($_FILES['image']['name'])
        {
            if ($this->upload->do_upload('image'))
            {
                $gbr = $this->upload->data();

				$config['image_library']='gd2';
                $config['source_image']='./style/upload/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 350;
                $config['new_image']= './style/upload/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
				$data = array(
					'title' => $title,
					'description' => $description,
					'slug' => slug($title),
					'image' 	=> $gbr['file_name'],
					'status'	=> $status,
					'datetime' => date('Y-m-d H:i:')
				);
				$this->mPost->addPost($data);
            }
        }else {
			$data = array(
				'title' => $title,
				'description' => $description,
				'slug' => slug($title),
				'status'	=> $status,
				'datetime' => date('Y-m-d H:i:')
			);
			$this->mPost->addPost($data);
        }
		redirect('dashboard/listPost');
	}

	public function editPost()
	{
		$id = $this->uri->segment(3);
		$data['data'] = $this->mPost->detailPost($id); 
		$this->templatebe->view('be/post/editPost', $data);
	}

	function editPost_action(){
		$id['id'] = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		if($this->input->post('submit')=='publish'){
			$status = 1;
		} else {
			$status = 0;
		}
		$this->load->library('upload');
        $nmfile = "file-".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './style/upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5048'; //maksimum besar file 2M
        $config['max_width']  = '3488'; //lebar maksimum 1288 px
        $config['max_height']  = '2268'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
		if($_FILES['image']['name'])
        {
            if ($this->upload->do_upload('image'))
            {
                $gbr = $this->upload->data();

				$config['image_library']='gd2';
                $config['source_image']='./style/upload/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 350;
                $config['new_image']= './style/upload/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
				$data = array(
					'title' => $title,
					'description' => $description,
					'slug' => slug($title),
					'image' 	=> $gbr['file_name'],
					'status'	=> $status,
					'datetime' => date('Y-m-d H:i:')
				);
				$this->mPost->editPost($data, $id);
            }
        }else {
			$data = array(
				'title' => $title,
				'description' => $description,
				'slug' => slug($title),
				'status'	=> $status,
				'datetime' => date('Y-m-d H:i:')
			);
			$this->mPost->editPost($data, $id);
        }
		redirect('dashboard/listPost');
	}

	public function listGallery()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listGallery'); //site url
        $config['total_rows'] = $this->db->count_all('gallery'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mGallery->getGallery($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/gallery/listGallery', $data);
	}

	public function addGallery()
	{
		$this->templatebe->view('be/gallery/addGallery');
	}

	function addGallery_action(){
		$this->load->library('upload');
        $nmfile = "file-".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './style/upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5048'; //maksimum besar file 2M
        $config['max_width']  = '3488'; //lebar maksimum 1288 px
        $config['max_height']  = '2268'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
		if($_FILES['image']['name'])
        {
            if ($this->upload->do_upload('image'))
            {
                $gbr = $this->upload->data();

				$config['image_library']='gd2';
                $config['source_image']='./style/upload/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 350;
                $config['new_image']= './style/upload/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
				$data = array(
					'image' 	=> $gbr['file_name'],
					'datetime' => date('Y-m-d H:i:')
				);
				$this->mGallery->addGallery($data);
            }
        }
		redirect('dashboard/listGallery');
	}

	public function deleteGallery()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->mGallery->deleteGallery($where);
		redirect('dashboard/listGallery');
	}

    public function listProduct()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listProduct'); //site url
        $config['total_rows'] = $this->db->count_all('gallery'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mGallery->getGallery($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/product/listProduct', $data);
	}

    function addCart_action(){
        $id_product = $this->uri->segment('3');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'product_id' => $id_product,
            'datetime' => date('Y-m-d H:i:')
        );
        $this->mCart->addCart($data);
		redirect('dashboard/listProduct');
	}

	public function listCart()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listCart'); //site url
        $config['total_rows'] = $this->db->count_all('cart'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $user['user_id'] = $this->session->userdata('id');
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mCart->getCart($config["per_page"], $data['page'], $user['user_id']);           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/cart/listCart', $data);
	}

    function editCart_action(){
		$id['user_id'] = $this->session->userdata('id');
		$data = array(
            'status' => 'checkout',
            'datetime' => date('Y-m-d H:i:s')
        );
        $this->mCart->editCheckout($data, $id);
        $this->db->select('SUM(gallery.price) as total_rows');
        $this->db->from('cart')
                ->join('gallery', 'gallery.id = cart.product_id')
                ->where('status', 'checkout');
        $query = $this->db->get();
        $result = $query->row_array();
        $total_rows = $result['total_rows'];
        $coupon = 0;
        if ($total_rows > 50000) {$coupon = 1;}
        if ($total_rows >= 100000) {
            $total = (int)$total_rows / 100000;
            $coupon = $coupon + $total;
        }
        $id_product = $this->uri->segment('3');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'total' => $coupon,
            'datetime' => date('Y-m-d H:i:s')
        );
        $this->mCart->addCoupon($data);
        redirect('dashboard/listCart');
	}

    public function deleteCart()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->mCart->deleteCart($where);
		redirect('dashboard/listCart');
	}

    public function listSummary()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listSummary'); //site url
        $config['total_rows'] = $this->db->where('status','checkout')->count_all('cart'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mCart->getCartSummary($config["per_page"], $data['page'], $this->session->userdata('id'));           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/summary/listSummary', $data);
	}

    public function deleteSummary()
	{
		$id = $this->uri->segment(3);
		$where = array('product_id' => $id);
		$data = array(
            'status' => NULL,
            'datetime' => date('Y-m-d H:i:s')
        );
        $this->mCart->deleteSummary($data, $where);
		redirect('dashboard/listSummary');
	}

    function confirm_action(){
		$id['user_id'] = $this->session->userdata('id');
		$data = array(
            'status' => 'confirm',
            'datetime' => date('Y-m-d H:i:s')
        );
        $this->mCart->editCheckout($data, $id);
        redirect('dashboard/listSummary');
	}

    public function listHistory()
	{
		//konfigurasi pagination
        $config['base_url'] = base_url('dashboard/listHistory'); //site url
        $config['total_rows'] = $this->db->where('status','confirm')->count_all('cart'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mCart->getCartHistory($config["per_page"], $data['page'], $this->session->userdata('id'));           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->templatebe->view('be/history/listHistory', $data);
	}

}