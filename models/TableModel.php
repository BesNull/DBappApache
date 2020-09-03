<?php
// require_once 'dbConnection.php';

  class TableModel
  {
	  public $tableName;
	  public $columns;
	  public $columnsDB;
	  public $link;
	  public $lookUpCols;
	  public $condition;
	  public function __construct($tableName, $columns, $columnsDB, $lookUpCols = null, $condition = null)
	  {
		 $this->tableName = $tableName;
		 $this->columns = $columns;
		 $this->columnsDB = $columnsDB;
		 $this->lookUpCols = $lookUpCols;
		 $this->condition = $condition;
	  }
	  public function connect($host, $user,$passwd,$database)
	  {
		$this->link = mysqli_connect($host, $user, '', $database);
	  }
	  public function add($values, $pk = -1)
	  {
		  if($pk == -1)
		  {
			$query ="insert into  ";
			$query .= $this->tableName . " values (null, ";
			for ($x=0; $x<count($values); $x++) 
			{
				$query .= "'".$values[$x]."'";
				if($x != count($values)-1)
				   $query .= ",";
			}
			$query .= ");";
			$sql = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link) . " Query - ".$query);
			echo $query;
		  }
		  else
		  {
			$query ="update ".$this->tableName." set  ";
			$x = 0;
			for($cnt =0;$cnt < count($values);$cnt++)
			{
				$query .= $this->columnsDB[$cnt+1]."='".$values[$cnt].="'";
				if($cnt != count($values) -1)
				  $query .= ",";
			}
		    echo $query;
			$query .= " where id = '".$pk."';";
			$sql = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
		  }
	  }
	  public function delete($id)
	  {
			$query ="delete  from  ";
			$query .= $this->tableName . " where id = '".$id."';";
			$sql = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
	  }
	  public function view($conditions = null)
	  {
		
		  $view = "<table align=\"center\"><tr>";
		  foreach ($this->columns as &$value) {
			$view .= "<th >{$value}</th>";
		 }
		 $view .="<th >Отметить</th>";
		  $view .= "</tr>";
		  $query ="SELECT ";
		  for($x =0;$x<count( $this->columnsDB);$x++)
		  {
			 $query .=  " ".$this->columnsDB[$x]." ";
			 if($x != count( $this->columnsDB)-1)
			     $query .= ",";
		  }
		  $query .= " FROM ";
		  $query .= $this->tableName;
		  if($this->condition != null)
			$query .= " where ". $this->condition;
		  if($conditions != null)
		    $query .= " where ". $conditions;
		  $sql = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link) ."Запрос - ".$query); 
		  $pkValue=-1;
		  while ($data = mysqli_fetch_array($sql)) {
			   $view .= "<tr>";
			   $index = 0;
			   $isGet=true;
			   foreach ($this->columnsDB as &$value) {
				   if($isGet)
				   {
					   $pkValue=$data[0];
					   $isGet=false;
				   }
					 $res = $value;
					 $lookUpId =  -1;
					 if($this->lookUpCols != null) $lookUpId = $this->findLookUp($res);
					 if($lookUpId != -1)
					 {
						 $res = TableModel::getLookUpValue($this->link, $this->lookUpCols[$lookUpId][2], 'id', $this->lookUpCols[$lookUpId][1], $data["$value"]);
						 $view .= "<td>".$res."</td>";
					 }
					 else
						$view .= "<td >{$data[$index]}</td>";	  
					$index +=1;
			 } 
			 $view .="<td ><input class=\"radio\" onchange=\"clickRb(id)\"  type=\"radio\" id=\"".$pkValue."\"></td>";
			 $view .= "</tr>"; 
		  }
		  $view .= "</table>";
		  return $view; 
	  }
	  private function findLookUp($value)
	  {
		  for($x =0;$x <count($this->lookUpCols);$x++)
		  {
			  if($this->lookUpCols[$x][0] == $value)
			     return $x;
		  }
		  return -1;
	  }

	  public static function getLookUpValue($link, $table, $keyField, $valueField, $keyValue)
	  {
		  if(!$link)
			 return null;
		  $query = "select ".$valueField." from ".$table." where ".$keyField." = '".$keyValue."';";
		  $sql = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
		  $data = mysqli_fetch_array($sql);
		  return $data["$valueField"];
	  }
  }
?>