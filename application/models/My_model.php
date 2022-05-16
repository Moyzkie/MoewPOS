<?php
defined('BASEPATH') OR exit('No direct script access all');

class My_model extends CI_Model{

    public function login_customer($data){

      $this->db->select('*');
      $this->db->where('username',$data['username']);
      $this->db->where('password',$data['password']);
      $this->db->from('cashier');
      $this->db->limit(1);
      $query = $this->db->get(); 
      if($query->num_rows()==1){
      return $query->row();
      }else{
      return false;
      }

    }

    public function login_admin($data)
    {
     $this->db->select('*');
     $this->db->where('username',$data['username']);
     $this->db->where('password',$data['password']);
     $this->db->from('admin');
     $this->db->limit(1);
     $query = $this->db->get(); 
     if($query->num_rows()==1){
     return $query->row();
     }else{
     return false;
     }
    }


    public function new_product()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->order_by("id","desc");
        $this->db->limit(8);
        return $this->db->get();
    }

    public function fetch_product($query)
    {
       $this->db->select('*');
       $this->db->from('product');
       $this->db->order_by('pname','asc');
       if($query != '')
       {
          $this->db->like('pname',$query);
          $this->db->like('menu_type',$query);
       }
       return $this->db->get();
    }

    public function count_all()
   {
      $query = $this->db->get("Product");
      return $query->num_rows();
   }


   public function product_detail($id){

      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('id',$id);
      return $this->db->get();
   }


   public function display_product()
   {
      $this->db->select('picture,id,pname,stock,size,price,menu_type');
      $this->db->from('product');
      $this->db->order_by('id','desc');
      return  $this->db->get();
   }

   public function insert_product($data){

      $sql = "INSERT INTO product (pname,stock,price,detail,size,picture,menu) VALUES ?";
      $data = array($data);
      return $this->db->query($sql,$data);
   }

   public function editProduct($id)
   {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('id',$id);
      return $this->db->get();
   }

   public function updateProduct($data)
   {
      $this->db->where('id', $data['id']);
      $this->db->update('Product', $data);
      return true;
   }

   public function delete_product($id)
   {
     $this->db->where("id", $id);
     $this->db->delete("product");
     return true;
   }

   public function menuType()
   {
      $this->db->distinct();
      $this->db->select('menu_type');
      $this->db->from('product');
      return $this->db->get();
   }

   public function groupMenu($data){

      $this->db->select('*');
      $this->db->from('product');
      $this->db->where("menu_type", $data);
      return  $this->db->get();
   }

   public function insertOrder($data){
      if($data["order_id"] == 0){
         $data["order_id"]=1;
      }else{
         $data["order_id"] +=1 ;
      }
      $this->db->insert('orders',$data);
      return true;
   }

   public function lastOrderId(){
   
      $this->db->select('Max(order_id) as newid');
      $this->db->from('orders');
      return $this->db->get();
   }

   public function test(){
      $this->db->select('pname,stock,price');
      $this->db->from('product');
      $this->db->limit('10');
      return $this->db->get();
   }

   public function getOrder(){
      $this->db->select('*');
      $this->db->from('orders');
      return $this->db->get();
   }

   public function add($data){
      $this->db->insert('crud',$data);
      return true;
   }

   public function displayRecord(){
      return $this->db->get('product');
   }

   public function getcrud(){
      return $this->db->get('crud');
   }

   public function delete($id){
      $this->db->where("id", $id);
      $this->db->delete("crud");
      return true;
   }

   public function getuser($id){
      $user_id = $id;
      $this->db->select('*');
      $this->db->from('crud');
      $this->db->where('id',$user_id);
      return $this->db->get();
   }


   function get_products(){
      extract($_POST);
      if($id != 'all'){
          $this->db->where('menu',$id);
      }
      if(isset($_POST['status']))
      $qry = $this->db->get("product");
      $resp = array();
      if($qry->num_rows() > 0){
          foreach($qry->result_array() as $row){
              $resp[]=$row;
          }
      }
      return json_encode($resp);
   }

  public function load_pg(){
     if(isset($_POST['status']))
      $this->db->select('*');
      $this->db->from('menu');
      $this->db->order_by('menu_type','asc');
      $qry = $this->db->get();
     $resp = array();
      foreach($qry->result_array() as $row){
         $resp[] = $row;
      }
       return json_encode($resp);
  }

  public function printReceipt($id){
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->where('order_id',$id);
    return $this->db->row();
  }


  public function fgw_check_email($email){
    $sql = "SELECT email FROM admin WHERE Email = ?";
    $data = array($email);
    return  $this->db->query($sql,$data);
  }

  public function updateInventory($qty,$id)
  {
   
    $sql  = "UPDATE product set stock = stock - ? where id = ?";
    $data = array($qty,$id);
    return  $this->db->query($sql,$data);
  }

  public function fgw_update_token($recovery_token,$email)
   {
      $sql  = "UPDATE admin SET code= ? WHERE email = ? LIMIT 1";
      $data = array($recovery_token,$email);
      return  $this->db->query($sql,$data);
   }

   public function fgw_check_verify($recovery_token)
   {
      $this->db->select('code,status');
      $this->db->from('admin');
      $this->db->where('code', $recovery_token);
      $this->db->limit(1);
      $query = $this->db->get(); 
      if($query->num_rows()==1){
      return $query->row();
      }else{
      return false;
      }
   }

   public function fgw_update_verify_status($verify_status,$recovery_token)
   {
      $sql  = "UPDATE admin SET status= ? WHERE Code = ? LIMIT 1";
      $data = array($verify_status,$recovery_token);
      return  $this->db->query($sql,$data);
   }
   public function fgw_update_password($password,$recovery_token)
   {
      $sql  = "UPDATE admin SET Password= ? WHERE Code = ? LIMIT 1";
      $data = array($password,$recovery_token);
      return  $this->db->query($sql,$data);
   }

   public function totalSale()
   {
      $date = date("Y-m-d");
      $this->db->select('sum(total_amount)as totalSale');
      $this->db->from('sales');
      $this->db->where('date',$date);
      $query = $this->db->get();
      foreach($query->result() as $totalSales){
          return $totalSales->totalSale;
      }
   }

   public function criticalStock()
   {
      $this->db->select('count(stock)as ctrstock');
      $this->db->from('product');
      $this->db->where('stock <=10');
      $query = $this->db->get();
      foreach($query->result() as $ctrStock){
         return $ctrStock->ctrstock;
     }
   }

   public function totalOrder()
   {
      $this->db->select('count(order_id)as totalOrder');
      $this->db->from('sales');
      $query = $this->db->get();
      foreach($query->result() as $totalOrder){
         return $totalOrder->totalOrder;
     }
   }

   public function getOrders()
   {
      return $this->db->get('sales');
   }

   public function getOrderDetail($id)
   {
      $user_id = $id;
      $this->db->select('o.order_id,o.price,p.pname,o.qty ,o.total');
      $this->db->from('orders as o');
      $this->db->join('product as p','o.pid = p.id');
      $this->db->where('order_id',$user_id);
      return $this->db->get();
   }

   public function getGrandTotal($id)
   {
      $user_id = $id;
      $this->db->select('total_amount');
      $this->db->from('sales');
      $this->db->where('order_id',$user_id);
      $query = $this->db->get();
      foreach($query->result() as $total_amount)
      {
          return $total_amount->total_amount;
      }
   }

   public function getCriticalStock()
   {
      $this->db->select('id,pname,stock');
      $this->db->from('product');
      $this->db->where('stock <=10');
      return $this->db->get();


   }

   public function addStock($data)
   {
      $this->db->where('id', $data['id']);
      $this->db->update('Product', $data);
      return true;
   }

   public function generateReport($data)
   {
      $this->db->select('sales.order_id, p.pname as name ,order_date,qty,orders.price,total,sales.total_amount');    
      $this->db->from('orders');
      $this->db->join('sales', ' orders.order_id = sales.order_id');
      $this->db->join('product as p', 'orders.pid = p.id');
      $this->db->where('order_date between "'.$data['min'].'" And "'.$data['max'].'"');
      return $this->db->get();
   }

   public function generatedTotalSale($data)
   {
      $this->db->select('sum(total_amount) as totalSale ');    
      $this->db->from('sales');
      $this->db->where('date between "'.$data['min'].'" And "'.$data['max'].'"');
      return  $this->db->get();
   
      
   }

   public function getmenu()
   {
      return $this->db->get('menu');
   }

   public function addmenu($data)
   {
      $this->db->insert('menu',$data);
   }

   public function deletemenu($id)
   {
      $this->db->where("id", $id);
      $this->db->delete("menu");
      return true;
   }

   public function updateMenu($data)
   {
      $this->db->where('id',$data['id']);
      $this->db->update('menu',$data);
     
      return true;
   }

   public function adminInfo()
   {
      $this->db->select('*');
      $query= $this->db->get('admin');
      return $query->result();
   }

   public function addAdmin($data)
   {
      $this->db->insert('admin',$data);
      return true;
   }

   public function getAdmin($id)
   {
       $user_id = $id;
       $this->db->select('*');
       $this->db->from('admin');
       $this->db->where('id',$user_id);
       return $this->db->get();
   }

   public function updateAdmin($data)
   {
       $this->db->where('id', $data['id']);
       $this->db->update('Admin', $data);
       return true;
   }

   public function deleteAdmin($id){
      $this->db->where("id", $id);
      $this->db->delete("Admin");
      return true;
   }

   public function cashierInfo()
   {
      $this->db->select('*');
      $query= $this->db->get('cashier');
      return $query->result();
   }

   public function addCashier($data)
   {
      $this->db->insert('cashier',$data);
      return true;
   }

   public function getCashier($id)
   {
       $user_id = $id;
       $this->db->select('*');
       $this->db->from('cashier');
       $this->db->where('id',$user_id);
       return $this->db->get();
   }

   public function updateCashier($data)
   {
       $this->db->where('id', $data['id']);
       $this->db->update('cashier', $data);
       return true;
   }

   public function deleteCashier($id){
      $this->db->where("id", $id);
      $this->db->delete("cashier");
      return true;
   }

   

  



}

  

?>