<?php

class dbdone 
{
	public $hostAddress = "localhost";
	public $userName = "root";
	public $password = "";
	public $dbname = "dbfear";
	public $link;
	public $message;

	function __construct()
		{
			$this->dbConnect();
		}

	private function dbConnect()
	{
		$this->link = new mysqli($this->hostAddress, $this->userName, $this->password, $this->dbname);
		if($this->link)
		{
			$this->message = "Database is Connected";
		}
		else
		{
			$this->message = "Database Not Connected";
		}
	}
	function __destruct()
		{
			$this->link->close();
		}
}

$db = new dbdone();
	if(isset($_POST['add']))
	{
		$a = $_POST['nmbr'];
		$b = $_POST['name'];
		$c = $_POST['email'];
		$d = $_POST['subject'];

		$sql = $db->link->query("INSERT INTO db_fear (id, name, email, subject) VALUES ('$a', '$b', '$c', '$d')");
		if($sql)
			{
				echo "Add Successfully";
			}
			else 
			{
				echo "Add Unsuccessful";
			}

	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>MySQL</title>
    <style>
      body{
        box-sizing: border-box;
        font-family: arial;
        padding: 100px;
      }
      #main{
        height: auto;
        width: 500px;
        margin: 0 auto;
        border: 1px solid #e7eaed;
        border-radius: 4px;
        padding: 10px;
        background: #f0f0f0;
      }
      #mybtn{
        margin: 0 auto;
        align-items: center;
      }
      .form-control{
      	border: none;
      }
      .form-control:focus{
      	box-shadow: none;
      	outline: none;
      	border: none;
      }
    </style>
  </head>
  <body>
    <div id="main">
      <form method="POST">
        <div class="form-group">
          <label for="nmbr">ID</label>
          <input type="number" name="nmbr" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" name="subject" class="form-control">
        </div>
        <div id="mybtn">
          <button type="submit" name="add" class="btn btn-success"> Submit 
          </button>
          <button type="submit" name="update" class="btn btn-secondary"> Update 
          </button>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>