<?
class Database 
{
	private $host = 'localhost';
	private $db_name = 'test_dump';
	private $user = 'root';
	private $pass = "";
	protected $db;
	public $isConn;
	public $image;
	
	public function __construct()
	{
		$this->isConn = true;
		try {
			$this->db = new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->user , $this->pass);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function Disconnect()
	{
		$this->db = null;
		$this->isConn = false;
	}
	
	public function getProduct($query, $params = [])
	{
		try {
			$stmt = $this->db->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function getProducts($query, $params = [])
	{
		try {
			$stmt = $this->db->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function newProduct($query, $params = [])
	{
		try {
			$stmt = $this->db->prepare($query);
			$stmt->execute($params);
			echo '<script>alert("Продукт добавлен")</script>';
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function uploadPhoto()
	{
		$result_message="";

		if ($this->image) {

			$target_directory = "images/";
			$target_file = $target_directory . $this->image;
			$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	  
			// сообщение об ошибке пусто 
			$file_upload_error_messages = "";
			echo 555;
		}

    return $result_message;
	}
}

?>