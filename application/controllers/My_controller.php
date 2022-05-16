<?php
defined('BASEPATH') OR exit('No direct script access all');

class My_controller extends CI_Controller{

    public function login(){
        if(!file_exists(APPPATH.'views/login.php')){
            show_404();
        }
        $this->load->view('Templates/header');
        $this->load->view('login');
        $this->load->view('Templates/footer');
    }

    public function loginUser(){

        $this->form_validation->set_rules('email','Email Address','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|md5');
        if($this->form_validation->run()==FALSE)
        {
           $this->userlogin();
        }else{
        $data=[
        'username' =>$this->input->post('email'),
        'password' =>$this->input->post('password')];
        $user_login = new My_model;
        $result = $user_login->login_customer($data);
        $admin_result = $user_login->login_admin($data);
        if($result !==FALSE)
        {
            $auth_customerdetails=[
               'id' => $result->id,
               'username' => $result->username,
               'password' => $result->password,
               'picture' =>$result->picture];
            $this->session->set_userdata('authenticated','1');
            $this->session->set_userdata('auth_customer',$auth_customerdetails);
            $this->pos();
            
        }else{
        if($admin_result !== FALSE)
        {   
          if($admin_result->status == 0){
              $this->session->set_flashdata('c_danger','Your account is currently not verify by admin!');
              redirect('userlogin');
          }else{
            $auth_admin=[
              'name' => $admin_result->name,
              'username' => $admin_result->username,
              'password' => $admin_result->password,
              'picture' =>$admin_result->picture];
            $this->session->set_userdata('admin_authenticated','1');
            $this->session->set_userdata('auth_admin',$auth_admin);
            redirect(base_url('dashBoard'));
          }
        }else{
        $this->session->set_flashdata('c_danger','Invalid email or password!');
        redirect(base_url('userlogin'));
   
        }
        }

       }
    }

    public function logout()
    {
         $this->session->unset_userdata('auth_admin');
         $this->session->unset_userdata('admin_authenticated');
         redirect(base_url('login'));
    }

    public function dashBoard(){
        $data ['totalSales'] = $this->My_model->totalSale();
        $data ['criticalStock']  = $this->My_model->criticalStock();
        $data ['totalOrders'] = $this->My_model->totalOrder();
         $this->load->view('Templates/admin_header');
        $this->load->view('Adminpages/dashBoard',$data);
        $this->load->view('Templates/admin_footer');
        
    }

    public function add(){

        $this->load->library("cart");
        $data = array(
        "id"  => $_POST["product_id"],
        "picture" => $_POST["picture"],
        "name"  => $_POST["product_name"],
        "qty"  => $_POST["quantity"],
        "price"  => $_POST["product_price"]
        );
        $this->cart->insert($data); 
        
        echo $this->view();
    }

    public function load(){
        echo $this->count_item();
        echo $this->view();
    }

    public function remove(){

       $this->load->library("cart");
       $row_id = $_POST["row_id"];
       $data = array(
          'rowid'  => $row_id,
          'qty'  => 0
       );
       $this->cart->update($data);
       echo $this->view();

    }

    public function removeItem(){

      $this->load->library("cart");
      $row_id = $this->input->get('row_id');
      $data = array(
         'rowid'  => $row_id,
         'qty'  => 0
      );
      $this->cart->update($data);
      redirect('checkout');

   }

    public function confirmOrder(){
      $this->load->library("cart");
      $cartItem = $this->cart->contents();
      $lastid = $this->My_model->lastOrderId();
      $id = 0;
       if($cartItem == null){
         echo "PLease Add Your Order";
       }else{
        foreach($lastid->result() as $newid){
          $id =  $newid->newid;
        }
       foreach($cartItem as $items){
         $data= array(
           "order_id" => $id,
           "order_date" => date("Y-m-d"),
           "name" =>$items["name"],
           "qty" =>$items["qty"],
           "price" =>$items["price"],
           "total" => $items["qty"] * $items["price"],
         );
         $this->My_model->insertOrder($data);
       }

       $this->cart->destroy();
       echo "order Success";
 
       }
      
    }

    public function checkout(){
      $this->load->library("cart");
      $data['data'] =$this->cart->contents();
      $this->load->view('Templates/header');
      $this->load->view('Customerpages/checkout',$data);
      $this->load->view('Templates/footer');
    }

    public function viewCart(){

      $this->load->view('Templates/header');
      $this->load->view('Customerpages/viewcart');
      $this->load->view('Templates/footer');
    }

    public function count_item(){
        
      $this->load->library("cart");
      $output='';
      $output .='
      Item : <span class="cart-qty" data-item="'.count($this->cart->contents()).'">'.count($this->cart->contents()).'</span>
      ';
      echo $output;

    }


    public function fetch_product(){

        $output = '';
        $query = '';

        if($this->input->post('query'))
        {
            $query = $this->input->post('query'); 
        }
      
        $data = $this->My_model->fetch_product($query);

        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
                <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <div class="item">
                  <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="'.base_url().'My_controller/product_detail?detail='.$row->id.'"> <img data-name="product_image" src="'.base_url().'assets/images/product/'.$row->picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="'.base_url().'assets/images/product/'.$row->picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a> </div>
                    <div class="caption product-detail text-left">
                      <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem" class="text">'.$row->pname.'</a></h6>
                      <div class="rating">
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">₱</span>'.$row->price.'.00</span>
                      </span>
                      <p class="product-desc mt_20 mb_60"> </p>
                      <div class="button-group text-center" id="add">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              ';
            }
        }else{
            $output .= '<tr style="text">
            <td colspan="5">No Data Found</td>
            </tr>';
        }
        
        echo $output;

    }


    public function pagination(){

        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->My_model->count_all();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination ">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];
   
        $output = array(
        'pagination_link'  => $this->pagination->create_links(),
        'result'  => $this->My_model->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);

    }


    public function view()
    {   
        $this->load->library("cart");
        $output = '';
       
        $count = 0;
        foreach($this->cart->contents() as $items)
        {
           $count++;
           $output .= '
           <table class="table table-striped">
             <tbody>
               <tr>
                 <td class="text-center"><a href="#"><img src="'.base_url().'assets/images/product/'.$items["picture"].'" alt="iPod Classic" title="iPod Classic"></a></td>
                 <td class="text-left product-name"><a href="#">'.$items["name"].'</a>
                   <span class="text-left price">'.$items["price"].'</span>
                   <input class="cart-qty" name="product_quantity" min="1" value="'.$items["qty"].'" type="number">
                 </td>
                 <td class="text-center "><a class="close-cart "><i class="fa fa-times-circle remove_inventory" id="'.$items["rowid"].'"></i></a></td>
               </tr> ';
        }
        $output .='
        <tr>
          <td class="text-right"><strong>Total</strong></td>
          <td class="text-right">'.$this->cart->total().'</td>
        </tr>
        </tbody>
       </table>
       <input class="btn pull-left mt_10" value="View cart" type="submit">
       <a href="checkout" class="btn pull-right mt_10">Checkout</a>';
       if($count == 0)
        {
           $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }

    public function product_detail()
    {
        $id=$this->input->get('detail');
        $data['data'] = $this->My_model->product_detail($id);
        $this->load->view('Templates/header');
        $this->load->view('CustomerPages/productdetail',$data);
        $this->load->view('Templates/footer');
    }

    public function displayProduct()
    {
        // if($this->session->has_userdata('admin_authenticated'))
        // {
            $result ['data'] = $this->My_model->display_product();
            $this->load->view('Templates/admin_header');
            $this->load->view('Adminpages/product',$result);
            $this->load->view('Templates/admin_footer');
        // }else{
        // $this->session->set_flashdata('c_danger','Login first!');
        // redirect(base_url('login'));
        // }
    }

    public function addProduct()
    {
       $data['menu'] = $this->My_model->getmenu();
        $this->load->view('Templates/admin_header');
        $this->load->view('Adminpages/addProduct',$data);
        $this->load->view('Templates/admin_footer');

    }

    public function productAdd()
    {   
         $this->form_validation->set_rules('p_name','Product Name','trim|required');
         $this->form_validation->set_rules('p_stock','Number of Stock ','trim|required');
         $this->form_validation->set_rules('p_detail','Product Detail','trim|required');
         $this->form_validation->set_rules('p_category','Product Category','trim|required');
         $this->form_validation->set_rules('p_supplier','Product Supplier','trim|required');
         if($this->form_validation->run()==FALSE)
         {
          $this->addProduct();   
         }else
         {
           $file_name = $_FILES['p_image']['name'];
           $new_file = time()."".str_replace(' ','-',$file_name);
 
           $config= ['upload_path'   => './assets/images/product/',
                    'allowed_types' => 'gif|jpg|png',
                    'file_name' => $new_file,
                   ];
            $this->load->library('upload', $config);
           if ( ! $this->upload->do_upload('p_image')) 
            {
             $imageError = array('error' => $this->upload->display_errors());
             $this->session->set_flashdata('a_status_danger',$imageError['error']);
             redirect(base_url('addProduct'));
            }
            else { 
              $uploadedimage = $this->upload->data();
              $this->resizeImageAdd($uploadedimage);
            }  

         }
    }

    public function resizeImageAdd($filename)
    {
      $this->load->library('image_lib');
      $w = $filename['image_width']; //original width
      $h = $filename['image_height']; //original height
      $n_w = 624;
      $n_h = 800;
      $source_ratio = $w / $h;
      $new_ratio = $n_w / $n_h;
      if($source_ratio != $new_ratio)
      {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/product/thumb/'.$filename['file_name'].'';
        $config['maintain_ratio'] = FALSE;

        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1)))
        {
           $config['width'] = $w;
           $config['height'] = round($w/$new_ratio);
           $config['y_axis'] = round(($h - $config['height'])/2);
           $config['x_axis'] = 0;
        }else{
           $config['width'] = round($h * $new_ratio);
           $config['height'] = $h;
           $size_config['x_axis'] = round(($w - $config['width'])/2);
           $size_config['y_axis'] = 0;  
         }
           $this->image_lib->initialize($config);
           $this->image_lib->crop();
           $this->image_lib->clear();

       }
       $config['image_library'] = 'gd2';
       $config['source_image'] = './assets/images/product/'.$filename['file_name'];
       $config['new_image'] = './assets/images/thumb/'.$filename['file_name'];
       $config['width'] = $n_w;
       $config['height'] =$n_h;
       $this->image_lib->initialize($config);
       $this->load->library('image_lib', $config);
       if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
       }else
       {
         $data = array(
            'pname' => $this->input->post('p_name'),
            'stock' => $this->input->post('p_stock'),
            'price' => $this->input->post('p_price'),
            'detail' => $this->input->post('p_detail'),
            'size' => $this->input->post('p_supplier'),
            'picture' => $filename['file_name'],
            'menu' => $this->input->post('p_category'),
        );
            $this->My_model->insert_product($data);
            $this->session->set_flashdata('a_status_success','New  Product "'.$data['pname']. '"  Added Successfully!');
            redirect(base_url('product'));
      }
      
    } 

    public function editProduct(){
        $id=$this->input->get('editProduct');
        $data['data'] = $this->My_model->editProduct($id);
        $data['menu'] = $this->My_model->getmenu();
        $this->load->view('Templates/admin_header');
        $this->load->view('Adminpages/editProduct',$data);
        $this->load->view('Templates/admin_footer');
        
    }

    public function updateProduct()
    {

      $file_name = $_FILES['p_image']['name'];
      $new_file = time()."".str_replace(' ','-',$file_name);

      $config= ['upload_path'   => './assets/images/product/',
               'allowed_types' => 'gif|jpg|png',
               'file_name' => $new_file,
              ];
       $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('p_image')) 
       {
        $imageError = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('a_status_danger',$imageError['error']);
        redirect(base_url('product'));
       }
       else { 
         $uploadedimage = $this->upload->data();
         $this->resizeImageUpdate($uploadedimage);
       }  
        
    }

    public function resizeImageUpdate($filename)
    {
      $this->load->library('image_lib');
      $w = $filename['image_width']; //original width
      $h = $filename['image_height']; //original height
      $n_w = 624;
      $n_h = 800;
      $source_ratio = $w / $h;
      $new_ratio = $n_w / $n_h;
      if($source_ratio != $new_ratio)
      {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/product/thumb/'.$filename['file_name'].'';
        $config['maintain_ratio'] = FALSE;

        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1)))
        {
           $config['width'] = $w;
           $config['height'] = round($w/$new_ratio);
           $config['y_axis'] = round(($h - $config['height'])/2);
           $config['x_axis'] = 0;
        }else{
           $config['width'] = round($h * $new_ratio);
           $config['height'] = $h;
           $size_config['x_axis'] = round(($w - $config['width'])/2);
           $size_config['y_axis'] = 0;  
         }
           $this->image_lib->initialize($config);
           $this->image_lib->crop();
           $this->image_lib->clear();

       }
       $config['image_library'] = 'gd2';
       $config['source_image'] = './assets/images/product/'.$filename['file_name'];
       $config['new_image'] = './assets/images/thumb/'.$filename['file_name'];
       $config['width'] = $n_w;
       $config['height'] =$n_h;
       $this->image_lib->initialize($config);
       $this->load->library('image_lib', $config);
       if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
       }else
       {
        $data = array(
            'id' => $this->input->post('id'),
            'pname' => $this->input->post('pname'),
            'stock' => $this->input->post('stock'),
            'price' => $this->input->post('price'),
            'detail' => $this->input->post('detail'),
            'size' => $this->input->post('supplier'),
            'picture' => $filename['file_name'],
            'menu' => $this->input->post('category'),
          );
          
          if($this->My_model->updateProduct($data))
          {
             $this->session->set_flashdata('a_status_success','Product_id=' .$data['id']. ' Update Successfully!');
             redirect(base_url('product'));
          }else{
              
              echo "Something wrong";
          }
      }
      
    } 
    
    public function delete_product()
    {
       
       $id=$this->input->get('Product_id');
       $response=$this->My_model->delete_product($id);
       if($response==true)
       {   
           $this->session->set_flashdata('a_status_danger',' Product id = '.$id.'  deleted successfully!');
           redirect(base_url('product'));
       }
        else{
          echo "Error !";
       }
    }

    
     public function groupMenu(){

         $menu = $this->input->get('groupMenu'); 
         $data ['groupMenu'] = $this->My_model->groupMenu($menu);
         $data ['menu'] = $this->My_model->menuType();
         $this->load->view('Templates/header');
         $this->load->view('Customerpages/menu',$data);
         $this->load->view('Templates/footer');

     }


    public function home(){
        $data['data'] = $this->My_model->new_product();
        $data['menu'] = $this->My_model->menuType();
        $this->load->view('Templates/header');
        $this->load->view('Customerpages/home',$data);
        $this->load->view('Templates/footer');

    }


    public function crud(){
      $this->load->view('crud');
    }

    public function adds(){
      $this->form_validation->set_rules('name',' name','trim|required|min_length[5]|max_length[20]|is_unique[admin.username]|is_unique[crud.name]|alpha_numeric_spaces');
      $this->form_validation->set_rules('email',' email','trim|required|valid_email|is_unique[crud.email]');

      if($this->form_validation->run()==false){
          $form_validation = array(
             'name' => form_error('name'), 
             'email' => form_error('email'),
             'setname' => set_value('name'),
             'setemail' => set_value('email'),
          );
          echo json_encode($form_validation);
      }else{
        $data = array(
          'name' => $_POST['name'],
          'email' => $_POST['email']
         );
         $this->My_model->add($data);
      }
      
      
    
    }

    public function displayRecord(){
       $data =" ";
       $dataRecord = $this->My_model->getcrud();
       if($dataRecord->result() == null){
          $data .= '<tr>
             <td colspan="4" class="text-center"> No Record</td>
            </tr>';
            echo $data;
       }else{
        foreach($dataRecord->result() as $row)
        {
           $data .= '
                  <tr>
                  <td>'.$row->id.'</td>
                  <td>'.$row->name.'</td>
                  <td>'.$row->email.'</td>
                  
                  </tr>
               ';
        }
        echo $data;
       }
       
    }

    public function display(){
      $data =" ";
      $dataRecord = $this->My_model->displayRecord();
      if($dataRecord->result() == null){
         $data .= '<tr>
            <td colspan="4" class="text-center"> No Record</td>
           </tr>';
           echo $data;
      }else{
       foreach($dataRecord->result() as $row)
       {
          $data .= '
          <div class="card-data px-1" style="width: 50%" data-name="gamot" data-id="18" data-price="120">
          <div class="card mb-3 text-dark bg-gradient-white">
             <div class="row no-gutters">
                 <div class="col-md-4">
                     <img class="card-img-top" src="'.base_url('assets/images/product/').$row->picture.'" alt="Card image cap" style="height:6vw;object-fit: cover">
                     <div class="price-field">₱ 120</div>
                     <div class="avail-status" style="top:4.5vw"><span class="badge badge-success">Available '.$row->stock.'</span></div>
                 </div>
                 <div class="col-md-8 border-left">
                     <div class="card-body " style="color:black !important">
                        <p class="card-title">'.$row->pname.'</p>
                        <!-- <p class="card-text"></p> -->
                        <div class="pull-right">
                        </div>
                     </div>
                 </div>
             </div>
          </div>
     </div>';
       }
       echo $data;
      }
    }

    public function delete(){
        $id = $_POST['id'];
        $this->My_model->delete($id);
    }

    public function getuser(){
        $id = $_POST['id'];
        $result = $this->My_model->getuser($id);
        $response = array();
        foreach($result->result() as $row){
           $response = $row;
        }
        echo json_encode($response);

    }

    

    public function pos(){
      $this->load->view('Cashierpages/pos');
    }

    function get_products(){
      $resp = $this->My_model->get_products();
      echo $resp;
    }
    function load_pg(){
      $resp = $this->My_model->load_pg();
      echo $resp;
    }

    public function orderSave()
    {
      extract($_POST);
      $lastid = $this->My_model->lastOrderId();
     foreach($lastid->result() as $orderid){
       $lastid = $orderid->newid;
     }
     if($lastid == 0){
        $lastid=1;
      }else{
        $lastid +=1 ;
      }
     $odata= array();
      for($i = 0 ; $i < count($pid);$i++){
          $olist['order_id'] = $lastid;
          $olist['price'] = str_replace(',', '',$price[$i]);
          $olist['pid'] = $pid[$i];
          $olist['qty'] = $qty[$i];
          $olist['order_date'] = date("Y-m-d");
          $olist['total'] = str_replace(',', '',$tprice[$i]);
          $this->My_model->updateInventory($qty[$i],$pid[$i]);
          $odata[]=$olist;
      }
       $sales = array(
         'order_id' => $lastid,
         'amount_tendered' => $amount_tendered,
         'date' =>  date("Y-m-d"),
         'total_amount' => str_replace(',','',$gTotal),
       );
       $this->db->insert_batch('orders',$odata);
       $this->db->insert('sales',$sales);
       echo json_encode($lastid);
    }

    public function printReceipt($id = ''){
       $data['id'] = $id;
       $this->load->view('receipt',$data);
    }

    public function userlogin(){
       $this->load->view('Templates/admin_header');
       $this->load->view('index');
       $this->load->view('Templates/admin_footer');

    }

    public function forgotpass(){
      $this->load->view('Templates/admin_header');
      $this->load->view('forgotpass');
      $this->load->view('Templates/admin_footer');

    }

    public function changepass(){
      $this->load->view('Templates/admin_header');
      $this->load->view('changepass');
      $this->load->view('Templates/admin_footer');
    }

    public function smtp($email,$recovery_token){
        /* Load PHPMailer library */
        $this->load->library('phpmailer_lib');
        /* PHPMailer object */
        $mail = $this->phpmailer_lib->load();
        /* SMTP configuration */
        $mail->isSMTP();
        // $mail->Host     = 'mail.smtp2go.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'spcc.edu.ph';
        // $mail->Password = 'Spcc1978';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port     = 2525;
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amante_ricky@spcc.edu.ph';
        $mail->Password = 'zbecjgzrjksyofkv';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->setFrom('pos@gmail.com');
        /* Add a recipient */
        $mail->addAddress($this->input->post('email'));
        /* Email subject */
        $mail->Subject = 'Your recovery token ';
        /* Set email format to HTML */
        $mail->isHTML(true);    
        $url = base_url();
        /* Email body content */
        $mailContent = "<p>Hi $email </p>
        <p>You have received your recovery token you are now able to recover your account</p>
        <p >Link: <a href='$url/My_controller/get_recovery_token?recovery_token=$recovery_token'>$url/My_controller/get_recovery_token?recovery_token=$recovery_token</p>
        <p>Thanks </p> ";
        $mail->Body = $mailContent;
        /* Send email */
        if(!$mail->send())
        {
          echo 'Mail could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
        $verify_status =2;
        $this->My_model->fgw_update_verify_status($verify_status,$recovery_token);
        $this->session->set_flashdata('c_success','Recovey token has been send on your email!');
         redirect('forgotpassword');
        }
     
    }


    public function sendrecovery_token()
    {
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');

        if($this->form_validation->run()==FALSE)
        {
            $this->forgotpass();
        }
        else
        {
           $recovery_token = md5(rand());
           $email = $this->input->post('email');  
           $found_email = $this->My_model->fgw_check_email($email); 
           if($found_email->num_rows() > 0)
           {
              $result =$this->My_model->fgw_update_token($recovery_token,$email);
              if($result == TRUE)
              {   
                $this->smtp($email,$recovery_token);
              }
           }
           else
           {
              $this->session->set_flashdata('c_danger','This email are not exist!');
              redirect('forgotpassword');
           }      
        }
    }

    public function get_recovery_token()
    {   
        if(isset($_GET['recovery_token']))
        {    
            $recovery_token = $_GET['recovery_token'];
             $data ['recovery_token'] = $recovery_token;
             $check_verify = $this->My_model->fgw_check_verify($recovery_token);
             if($check_verify)
             {
                if($check_verify->status==3)
                {
                   $this->session->set_flashdata('c_danger','Your recovery token is already use!'); 
                   redirect('forgotpassword');
                }
             }else{
             show_404();
             }
             $this->form_validation->set_rules('password','Password','trim|required|md5');
             $this->form_validation->set_rules('conpassword','confirm-Password','trim|required|matches[password]|md5');
             if ($this->form_validation->run()==FALSE)
             {
                $this->load->view('Templates/admin_header');
                $this->load->view('changepass',$data);
                $this->load->view('Templates/admin_footer');
             }else
             { 
                $newpassword = $this->input->post('password');
                $result= $this->My_model->fgw_update_password($newpassword,$recovery_token);
                if($result)
                {
                  $verify_status = 3;
                  $check_verify = $this->My_model->fgw_update_verify_status($verify_status,$recovery_token);
                  $this->session->set_flashdata('statuss','Your password is successfuly change!'); 
                  redirect('userlogin');
                }else{
                echo "error";
                }
             } 
            
        }
        
    }

    public function orders()
    {
       $data['orders'] = $this->My_model->getorders();
       $this->load->view('Templates/admin_header');
       $this->load->view('Adminpages/orders',$data);
       $this->load->view('Templates/admin_footer');
    }

    public function getOrderDetail(){
      $id = $_POST['id'];
      $result = $this->My_model->getOrderDetail($id);
      $Total_amout = $this->My_model->getGrandTotal($id); 
      $html = " ";
      foreach($result->result() as $row){
         $html .= ' <tr>
         <td>'.$row->order_id.'</td>
         <td class="text">'.$row->pname.'</td>
         <td>₱'.$row->price.'</td>
         <td>'.$row->qty.'</td>
         <td class="text-right">₱'.$row->total.'</td>
       </tr>';
      }
      $html .=' <tr>
      <td colspan="3" class="text-center">Grand Total</td>
      <td colspan="2" class="text-right">₱'.$Total_amout.'</td>
      </tr>';
      echo $html;

  }

  public function criticalStock()
  {

     $result ['data'] = $this->My_model->getCriticalStock();
     $this->load->view('Templates/admin_header');
     $this->load->view('Adminpages/criticalStock',$result);
     $this->load->view('Templates/admin_footer');
  }


  public function addStock()
  {
   
       $data=array(
         'id' => $this->input->post('sid'),
         'stock' => $this->input->post('sstock')
       );

       $result = $this->My_model->addStock($data);

       if($result == true)
       {
          $this->session->set_flashdata('a_status_success','Add Success');
          $this->criticalStock();
       }
       else
       {
          $this->session->set_flashdata('a_status_danger','Add Field');
          $this->criticalStock();
       }
   
  }
 

  public function report($data=[],$date=[],$totalSale=[])
  {
     $dt['result'] = $data;
     $dt['date'] = $date;
     $dt['totalSale'] = $totalSale;
     $this->load->view('Templates/admin_header');
     $this->load->view('Adminpages/report',$dt);
     $this->load->view('Templates/admin_footer');
  }

  public function generateReport()
  {
     $data = ['min' => $this->input->post('min'),
              'max' => $this->input->post('max')];
     $date['date'] = $data;
     $result ['result']= $this->My_model->generateReport($data);
     $totalSale ['totalSale']= $this->My_model->generatedTotalSale($data);
     if($result)
     {
       $this->report($result['result'],$date['date'], $totalSale['totalSale']);
     }else{
       echo "erorr";
     }
  }

  public function printReport()
  {
     $data = ['min' => $this->input->post('pmin'),
    'max' => $this->input->post('pmax')];
     $result['date'] = $data;
     $result ['result']= $this->My_model->generateReport($data);
     $result ['totalSale']= $this->My_model->generatedTotalSale($data); 
     $this->load->view('Templates/admin_footer');
     $this->load->view('Adminpages/printReport',$result);
     $this->load->view('Templates/admin_header');
  }

  public function menu_type()
  {
     $data['data'] = $this->My_model->getmenu();
     $this->load->view('Templates/admin_footer');
     $this->load->view('Adminpages/menu',$data);
     $this->load->view('Templates/admin_header');
  }

  public function addmenu()
  {
     $data = array ('menu_type' => $this->input->post('menu'));
     $this->My_model->addmenu($data);
     $this->session->set_flashdata('c_status_success','New  Category "'.$data['Category_Name']. '"  Added Successfully!');
     redirect(base_url('menu_type'));
  }

  public function deletemenu()
  {
    $id=$this->input->get('menuid');
    $response = $this->My_model->deletemenu($id);
    if($response==true)
    {   
        $this->session->set_flashdata('c_status_danger',' Product id = '.$id.'  deleted successfully!');
        redirect('menu_type');
    }
     else{
       echo "Error !";
    }
  }

  public function updateMenu()
  {
      $data = array('id'=>$this->input->post('mid'),'menu_type'=>$this->input->post('mname'));
      $response = $this->My_model->updateMenu($data);
      if($response)
      {
         $this->session->set_flashdata('c_status_success','Menu id=' .$data['id']. ' Update Successfully!');
         redirect('menu_type');
      }else{
          echo "Something wrong";
      }
  }

  public function adminInfo()
  {
     $this->load->view('Templates/admin_header');
     $this->load->view('Adminpages/adminInfo');
  }

  public function displayAdminInfo()
  {
    $StdInfo = $this->My_model->adminInfo();
    $json_data ['data'] = $StdInfo;
    echo json_encode($json_data);
  }

  public function addAdmin(){
        
    extract($_POST);
    $this->form_validation->set_rules('add_username','Username','trim|required|min_length[5]|max_length[20]|is_unique[admin.username]');
    $this->form_validation->set_rules('add_email', 'Email','trim|required|is_unique[admin.email]|valid_email');
    $this->form_validation->set_rules('add_password', 'Password ','trim|required|md5');
    if($this->form_validation->run()==true){

        $file_name = $_FILES['add_profile']['name'];
        $new_file = time()."".str_replace(' ','-',$file_name);
  
        $config= ['upload_path'   => './assets/images/admin/',
                  'allowed_types' => 'gif|jpg|png',
                  'file_name' => $new_file,
                 ];
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('add_profile')) 
        {
            // $imageError = array('error' => $this->upload->display_errors());
            // $this->session->set_flashdata('staf_status_danger',$imageError['error']);
            //  $upload_validation = array(
            //      'upload_error' =>$this->upload->display_errors(),
            //      'validation' => 'upload'
            //  );
            //  echo json_encode($upload_validation);
        }
        else
        {
            $data = array(
                'username' => $add_username,
                'email' => $add_email,
                'password' =>$this->input->post('add_password'),
                'status' => 1,
                'picture' =>$new_file
               );
               $this->My_model->addAdmin($data);
               $form_validation= array(
                   'validation'=>false,
               );
               echo json_encode($form_validation);
        }

    }
    else
    {
        $form_validation = array(
            'username' => form_error('add_username'), 
            'email' => form_error('add_email'),
            'password' =>form_error('add_password'),
            'setusername' => set_value('add_username'),
            'setemail' => set_value('add_email'),
            'setpassword' => set_value('add_password'),
            'validation' => true
        );
        echo json_encode($form_validation);
    }
}

public function getAdmin()
{
    $id = $_POST['id'];
    $result = $this->My_model->getAdmin($id);
    $response = array();
    foreach($result->result() as $row){
       $response = $row;
    }
    echo json_encode($response);

}


public function editAdmin(){
        
  extract($_POST);
  $this->form_validation->set_rules('edit_username','Username','trim|required|min_length[5]|max_length[20]');
  $this->form_validation->set_rules('edit_email', 'Email','trim|required|valid_email');
  $this->form_validation->set_rules('edit_password', 'Password' ,'trim|md5');
  if($this->form_validation->run()==true)
  {
      $old_filename = $this->input->post('oldp');
      $old_password = $this->input->post('oldpassword');
      $new_password = $this->input->post('edit_password');
      $new_filename = $_FILES['edit_profile']['name'];

      if($new_password == null)
      {
          $new_password = $old_password;
      }
      else
      {
         $new_password = $new_password;
      }
      
      if($new_filename == TRUE)
      {
          $update_filename = time()."_".str_replace(' ','-', $new_filename);
          $config= ['upload_path'   => './assets/images/admin/',
          'allowed_types' => 'gif|jpg|png',
          'file_name' =>  $update_filename,
          ];
          $this->load->library('upload', $config);
          if( $this->upload->do_upload('edit_profile'))
          {
              if(file_exists("./assets/images/admin/".$old_filename))
              {
                  unlink("./assets/images/admin/".$old_filename);
                 
              }
          }
      }
      else
      {
          $update_filename = $old_filename;
         
      }
      $data = array(
          'id' => $this->input->post('id'),
          'username' => $edit_username,
          'email' => $edit_email,
          'password' => $new_password,
          'status' =>$this->input->post('edit_status'),
          'picture' =>$update_filename
         );
         $this->My_model->updateAdmin($data);
         $form_validation= array(
             'validation' =>false,
         );
         echo json_encode($form_validation);
          
  }
  else
  {
    $form_validation = array(
      'username' => form_error('edit_username'), 
      'email' => form_error('edit_email'),
      'password' =>form_error('edit_password'),
      'setusername' => set_value('edit_username'),
      'setemail' => set_value('edit_email'),
      'setpassword' => set_value('edit_password'),
      'validation' => true
    );
     echo json_encode($form_validation);
  }

}

public function deleteAdmin()
{
  $id = $_POST['id'];
  $this->My_model->deleteAdmin($id);
}

public function cashierInfo()
{
  $this->load->view('Templates/admin_header');
  $this->load->view('Adminpages/cashierInfo');
}

public function displayCashierInfo()
{
  $StdInfo = $this->My_model->cashierInfo();
  $json_data ['data'] = $StdInfo;
  echo json_encode($json_data);
}

public function addCashier(){
      
  extract($_POST);
  $this->form_validation->set_rules('add_username','Username','trim|required|min_length[5]|max_length[20]|is_unique[cashier.username]');
  $this->form_validation->set_rules('add_email', 'Email','trim|required|is_unique[cashier.email]|valid_email');
  $this->form_validation->set_rules('add_password', 'Password ','trim|required|md5');
  if($this->form_validation->run()==true){

      $file_name = $_FILES['add_profile']['name'];
      $new_file = time()."".str_replace(' ','-',$file_name);

      $config= ['upload_path'   => './assets/images/cashier/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $new_file,
               ];
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('add_profile')) 
      {
          // $imageError = array('error' => $this->upload->display_errors());
          // $this->session->set_flashdata('staf_status_danger',$imageError['error']);
          //  $upload_validation = array(
          //      'upload_error' =>$this->upload->display_errors(),
          //      'validation' => 'upload'
          //  );
          //  echo json_encode($upload_validation);
      }
      else
      {
          $data = array(
              'username' => $add_username,
              'email' => $add_email,
              'password' =>$this->input->post('add_password'),
              'picture' =>$new_file
             );
             $this->My_model->addCashier($data);
             $form_validation= array(
                 'validation'=>false,
             );
             echo json_encode($form_validation);
      }

  }
  else
  {
      $form_validation = array(
          'username' => form_error('add_username'), 
          'email' => form_error('add_email'),
          'password' =>form_error('add_password'),
          'setusername' => set_value('add_username'),
          'setemail' => set_value('add_email'),
          'setpassword' => set_value('add_password'),
          'validation' => true
      );
      echo json_encode($form_validation);
  }
}

public function getCashier()
{
  $id = $_POST['id'];
  $result = $this->My_model->getCashier($id);
  $response = array();
  foreach($result->result() as $row){
     $response = $row;
  }
  echo json_encode($response);

}


public function editCashier(){
      
extract($_POST);
$this->form_validation->set_rules('edit_username','Username','trim|required|min_length[5]|max_length[20]');
$this->form_validation->set_rules('edit_email', 'Email','trim|required|valid_email');
$this->form_validation->set_rules('edit_password', 'Password' ,'trim|md5');
if($this->form_validation->run()==true)
{
    $old_filename = $this->input->post('oldp');
    $old_password = $this->input->post('oldpassword');
    $new_password = $this->input->post('edit_password');
    $new_filename = $_FILES['edit_profile']['name'];

    if($new_password == null)
    {
        $new_password = $old_password;
    }
    else
    {
       $new_password = $new_password;
    }
    
    if($new_filename == TRUE)
    {
        $update_filename = time()."_".str_replace(' ','-', $new_filename);
        $config= ['upload_path'   => './assets/images/cashier/',
        'allowed_types' => 'gif|jpg|png',
        'file_name' =>  $update_filename,
        ];
        $this->load->library('upload', $config);
        if( $this->upload->do_upload('edit_profile'))
        {
            if(file_exists("./assets/images/cashier/".$old_filename))
            {
                unlink("./assets/images/cashier/".$old_filename);
               
            }
        }
    }
    else
    {
        $update_filename = $old_filename;
       
    }
    $data = array(
        'id' => $this->input->post('id'),
        'username' => $edit_username,
        'email' => $edit_email,
        'password' => $new_password,
        'picture' =>$update_filename
       );
       $this->My_model->updateCashier($data);
       $form_validation= array(
           'validation' =>false,
       );
       echo json_encode($form_validation);
        
}
else
{
  $form_validation = array(
    'username' => form_error('edit_username'), 
    'email' => form_error('edit_email'),
    'password' =>form_error('edit_password'),
    'setusername' => set_value('edit_username'),
    'setemail' => set_value('edit_email'),
    'setpassword' => set_value('edit_password'),
    'validation' => true
  );
   echo json_encode($form_validation);
}

}

public function deleteCashier()
{
   $id = $_POST['id'];
   $result= $this->My_model->getCashier($id);
   $this->My_model->deleteCashier($id);
   $file = " ";
   foreach($result->result() as $fl){
    $file=$fl->picture;
    }
      if(file_exists("./assets/images/cashier/".$file)){
        unlink("./assets/images/cashier/".$file);
    }
}

}

?>