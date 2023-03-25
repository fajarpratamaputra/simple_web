<?php 

class mPost extends CI_Model{
    private $table = "posts";

    function getPost($limit, $start){
        $query = $this->db->order_by('id','DESC')->get($this->table, $limit, $start);
        return $query;
    }

	function getPostHome(){
        $query = $this->db->order_by('id','DESC')->limit(4)->get($this->table);
        return $query;
    }

    public function detailPost($id)
	{
		$query = $this->db->where("id", $id)
				->get($this->table);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function detailPostSlug($slug)
	{
		$query = $this->db->where("slug", $slug)
				->get($this->table);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	function addPost($data){
		$this->db->insert($this->table,$data);
	}

    function editPost($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

	}

    public function deletePost($id)
	{
		$query = $this->db->delete($this->table, $id);
	}
}