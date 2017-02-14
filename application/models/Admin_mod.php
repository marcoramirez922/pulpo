<?Php
class Admin_mod extends CI_Model {
			
	public function __construct(){
			parent::__construct();
	}
	
	public function getVisibles(){
		$query = $this->db->get("visibles");

        if($query->num_rows() > 0 ){
			return $query->result();
        }
		else{
			return 0;
		}
	}
	
	public function setVisibles($data){
		$resp= $this->db->update('visibles', $data);
		if($resp != 0){
			$respu= "1";
		}else{
			$respu= "3";
		}
		return $respu;
	}
	
	public function getAutos($Visibles){
		$this->db->from("autos");
		$this->db->order_by("rand()");
		$this->db->limit($Visibles);
		
		$query = $this->db->get();

        if($query->num_rows() > 0 ){
			return $query->result();
        }
		else{
			return 0;
		}
	}
	
	public function getConductores($Visibles){
		$this->db->from("conductores");
		$this->db->order_by("rand()");
		$this->db->limit($Visibles);
		
		$query = $this->db->get();

        if($query->num_rows() > 0 ){
			return $query->result();
        }
		else{
			return 0;
		}
	}
	
	public function getClientes($Visibles){
		$this->db->from("clientes");
		$this->db->order_by("rand()");
		$this->db->limit($Visibles);
		
		$query = $this->db->get();

        if($query->num_rows() > 0 ){
			return $query->result();
        }
		else{
			return 0;
		}
	}
}
