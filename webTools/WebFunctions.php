<?php
class WebFunctions
{
    public static function checkUser($link, $login, $password)
    {
       $query = mysqli_query($link, "select * from users where login='".$login."' and password='".$password."'") or die("Ошибка " . mysqli_error($link)); 
       $cnt=0;
       while ($data = mysqli_fetch_array($query)) {  
           $cnt+=1;
         } 
         return $cnt; 
    }
    public static function getLookUpComboBox($link, $tableName, $valueField, $keyField,$name, $selectedValue = -1)
    {
        $query = "select ".$valueField.", ".$keyField." from ".$tableName.";";
        $sql = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
        $result = "<select required class  = \"textbox\" id=\"zanr\"  name=\"".$name."\">";
            while ($data = mysqli_fetch_array($sql)) {  
                  $result .= "<option";
                  if($data["$keyField"] == $selectedValue){
                      $result .= " selected=\"selected\" ";}
                  $result .= " value=\"".$data["$keyField"]."\">".$data["$valueField"]."</option>";
              } 
              $result .="</select>";
        return $result;
    }
    public static function getRowFromTable($tableName, $pkValue, $pkName, $colsCount, $link)
    {
        $query = "select * from ".$tableName." where ".$pkName. " = '".$pkValue."';";
        $sql = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
        $result = array();
        $data = mysqli_fetch_array($sql);
        for($x = 0;$x<$colsCount;$x++)
        {
            array_push($result, $data[$x]);
        }

        return $result;
    }
}
?>