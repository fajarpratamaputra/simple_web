<?php 

class mGallery extends CI_Model{
    private $table = "gallery";

    function getGallery($limit, $start){
        $query = $this->db->order_by('id','DESC')->get($this->table, $limit, $start);
        return $query;
    }

	function getGalleryHome(){
        $query = $this->db->order_by('datetime','DESC')->get($this->table);
        return $query;
    }

	function getGalleryHomeFe(){
        $query = $this->db->order_by('id','DESC')->limit(6)->get($this->table);
        return $query;
    }

    public function detailGallery($id)
	{
		$query = $this->db->where("id", $id)
				->get($this->table);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	function addGallery($data){
		$this->db->insert($this->table,$data);
	}

    function editGallery($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

	}

    public function deleteGallery($id)
	{
		$query = $this->db->delete($this->table, $id);
	}
}