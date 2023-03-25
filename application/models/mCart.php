<?php 

class mCart extends CI_Model{
    private $table = "cart";
	private $tableCoupon = "coupon";

	function addCart($data){
		$this->db->insert($this->table,$data);
	}

	function getCart($limit, $start, $user){
        $query = $this->db->select('cart.id as cart_id, cart.user_id, gallery.*')
					->join('gallery', 'gallery.id = cart.product_id')
					->order_by('cart.id','DESC')
					->where('user_id', $user)
					->where('status', NULL)					
					->get($this->table, $limit, $start);
        return $query;
    }

	function getCartSummary($limit, $start, $user){
        $query = $this->db->select('cart.id as cart_id, cart.user_id, gallery.*')
					->join('gallery', 'gallery.id = cart.product_id')
					->order_by('cart.id','DESC')
					->where('user_id', $user)
					->where('status', 'checkout')					
					->get($this->table, $limit, $start);
        return $query;
    }

	function getCartHistory($limit, $start, $user){
        $query = $this->db->select('cart.id as cart_id, cart.user_id, cart.datetime as cart_date, gallery.*')
					->join('gallery', 'gallery.id = cart.product_id')
					->order_by('cart.id','DESC')
					->where('user_id', $user)
					->where('status', 'confirm')					
					->get($this->table, $limit, $start);
        return $query;
    }

	function editCheckout($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

	}

    public function deleteCart($id)
	{
		$query = $this->db->delete($this->table, $id);
	}

	function addCoupon($data){
		$this->db->insert($this->tableCoupon,$data);
	}

	function deleteSummary($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

	}
}