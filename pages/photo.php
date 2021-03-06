<?
class Photo 
{		
	public $image;
	
	public function uploadPhoto($file, $size)
	{
		$result_message="";
		$error="";
		
		if ($file) {
			$imageName = !empty($file['image']['name']) ? date("Ymdhis") . "-" . mb_strtolower(htmlspecialchars(trim(basename($file['image']['name'])))) : "";
			
			$target_directory = "../images/";
			
			$target_file = $target_directory . $imageName;

			$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
			
			$check = getimagesize($file['image']["tmp_name"]);

			if ($check !== false) {
				$allowed_file_types = array("jpg", "jpeg", "png", "gif");
				
				// проверяем, разрешены ли определенные типы файлов 
				if (!in_array($file_type, $allowed_file_types)) {
					$result_message .= "<div>Разрешены только файлы JPG, JPEG, PNG, GIF.</div>";
				}
				// убеждаемся, что файл не существует 
				if (file_exists($target_file)) {
					$result_message .= "<div>Изображение уже существует. Попробуйте изменить имя файла.</div>";
				}

				if ($file['image']['size'] > (1024000*$size)) {
					$result_message .= "<div>Размер изображения не должен превышать ".$size." МБ.</div>";
				}

				// убедимся, что папка uploads существует, если нет, то создаём 
				if (!is_dir($target_directory)) {
					mkdir($target_directory, 0777, true);
				}
				
				// отправленный файл является изображением 
			} else {
				$result_message .= "<div>Отправленный файл не является изображением.</div>";
			}
			if (empty($result_message)) {
				// ошибок нет, пробуем загрузить файл 
				if (move_uploaded_file($file["image"]["tmp_name"], $target_file)) {
					echo "<div>Фото ".$imageName." загружено</div>";
					return $imageName;
				} else {
					$result_message .= "<div>Невозможно загрузить фото.</div>";
				}
			} else {

				// это означает, что есть ошибки, поэтому покажем их пользователю 
				$error .= "<div style='color:red'>";
				$error .= "{$result_message}";
				$error .= "<div>Обновите запись, чтобы загрузить фото.</div>";
				$error .= "</div>";
				echo $error;
			}
		} 
	}
}

?>