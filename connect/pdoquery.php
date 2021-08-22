<?php 
include('pdoconnect.php');
class FurnitureQuery
{
	public $con;
	function __construct()
	{
		$k = new Connection;
		$this->con = $k->connect();
	}

	public function humanResourceLogin(){
		$sql = "SELECT * FROM `tbl_adminhr` WHERE `hr_email`='".$_POST['email']."' && 
		`hr_password`='".$_POST['password']."' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	// staffMemberLogin
	public function staffMemberLogin(){
		$sql = "SELECT * FROM `staffmembers` WHERE `stf_email`='".$_POST['email']."' && 
		`stf_password`='".$_POST['password']."' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function customerLoginForm(){
		$sql = "SELECT * FROM `tbl_customer` WHERE `tbl_customerEmail`='".$_POST['email']."' && `tbl_customerPass`='".$_POST['password']."' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}


	public function viewStaffMembers() {
		$sql = "SELECT * FROM staffmembers ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}


	public function addStaffMember($fname, $lname, $uname, $userrole, $email, $phone, $pass, $address) {
		$sql= "INSERT INTO `staffmembers`(`stf_id`, `stf_firstname`, `stf_lastname`, `stf_username`, `stf_userrole`, `stf_email`, `stf_telephone`, `stf_password`, `stf_address`, `stf_status`) VALUES (null, '".$fname."', '".$lname."', '".$lname."', '".$userrole."', '".$email."', '".$phone."', '".$pass."', '".$address."', '1')";
		$query = $this->con->prepare($sql);
		$query->execute();
		$count = $query->rowCount();
		return $count;
	}

    public function deleteStaffMember($id){
		$query= $this->con->prepare("DELETE FROM staffmembers WHERE stf_id='".$id."' ");
		$query->execute();
		return $query;
	}

	public function customerRegist($fname, $lname, $uname, $email, $phone, $pass, $address) {
		$sql= "INSERT INTO `tbl_customer`(`tbl_customerId`, `tbl_customerFname`, `tbl_customerLname`, `tbl_customerEmail`, `tbl_customerTel`, `tbl_customerAddress`, `tbl_customerUserName`, `tbl_customerPass`, `tbl_customerStatus`) VALUES (null, '".$fname."', '".$lname."', '".$email."', '".$phone."', '".$address."', '".$uname."',  '".$pass."',  '1')";
		$query = $this->con->prepare($sql);
		$query->execute();
		$count = $query->rowCount();
		return $count;
	}






	public function getProduct() {
		$sql= "SELECT * FROM tbl_product WHERE tbl_productPrice!='0' ORDER BY tbl_productId DESC";
		$query= $this->con->prepare($sql);
		$query->execute();
		return $query;
	}


	public function getAllProducts() {
		$sql= "SELECT * FROM tbl_product ORDER BY tbl_productId DESC";
		$query= $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function getNoPriceProduct() {
		$sql= "SELECT * FROM tbl_product WHERE tbl_productPrice='0' ";
		$query= $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function viewModels() {
		$sql= "SELECT * FROM tbl_model";
		$query= $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function viewCategories() {
		$sql= "SELECT * FROM tbl_category ";
		$query= $this->con->prepare($sql);
		$query->execute();
		return $query;
	}



	public function viewUnpaidOrders() {
		$sql = "SELECT * FROM `tbl_paid_order` WHERE `tbl_paid_orderStatus`='0' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function viewPaidAndApproved() {
		$sql = "SELECT * FROM `tbl_paid_order` WHERE `tbl_paid_orderStatus`!='0' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function approvePayment($appvid) {
		$que = "UPDATE tbl_paid_order SET tbl_paid_orderStatus= '1' WHERE tbl_paid_orderId= '".$appvid."' ";
		$query = $this->con->prepare($que);
		$query->execute();
		$c = $query->rowCount();
		return $c;
	}


	public function viewPaymentMethod($paymentId) {
		$sql = "SELECT * FROM `tbl_payment` WHERE `tbl_paymentId`='$paymentId' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function viewOrderData($orderId) {
		$sql = "SELECT * FROM tbl_order  WHERE  tbl_orderId = '$orderId'  LIMIT 1 ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}

	public function customerData($custo) {
		$sql = "SELECT * FROM tbl_customer  WHERE  tbl_customerId = '$custo' ";
		$query = $this->con->prepare($sql);
		$query->execute();
		return $query;
	}



/*** Get counting ****/

	public function countFurniture() {
		$sql = "SELECT COUNT(*) FROM customers";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countAllStaffmembers() {
		$sql = "SELECT COUNT(*) FROM staffmembers ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countAllCustomers() {
		$sql = "SELECT COUNT(*) FROM tbl_customer ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countHODs() {
		$sql = "SELECT COUNT(*) FROM staffmembers WHERE stf_userrole='HOD' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countDMs() {
		$sql = "SELECT COUNT(*) FROM staffmembers WHERE stf_userrole='DM' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}


	public function cPaidOrders() {
		$sql = "SELECT COUNT(*) FROM tbl_paid_order WHERE tbl_paid_orderStatus='1' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function cUnpaidOrders() {
		$sql = "SELECT COUNT(*) FROM tbl_paid_order WHERE tbl_paid_orderStatus='0' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countFinances() {
		$sql = "SELECT COUNT(*) FROM staffmembers WHERE stf_userrole='Finance' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}

	public function countFurnitures() {
		$sql = "SELECT COUNT(*) FROM `tbl_product` ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}


	public function checkForPrice() {
		$sql = "SELECT COUNT(*) FROM tbl_product WHERE tbl_productPrice='0' ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;		
	}




	public function sendMessageForPayment($cPhone, $cNames, $currentDate) {
        $data = array(    
            "sender"=>'KIGALIGAS',
            "recipients"=>$cPhone,
            "message"=>"Mwiriwe, ".$cNames." Murakoze Kwohereza bordereaux yanyu yo mwaguriyeho muri IPRC Huye, Bikozwe (".$currentDate.") Murakoze!",   
        );

        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";    
        $data = http_build_query($data);
        $username="benii"; 
        $password="Ben@1234";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);  
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
	}






	public function sendApprovalMessage($customerPhone) {
        $data = array(    
            "sender"=>'KIGALIGAS',
            "recipients"=>$customerPhone,
            "message"=>"Mwiriwe neza, Bordereaux yanyu mwohereje yakiriwe neza, 
            Mwakoze kugurira kuri IPRC"   
        );

        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";    
        $data = http_build_query ($data);
        $username="benii"; 
        $password="Ben@1234";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);  
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
	}



}
?>