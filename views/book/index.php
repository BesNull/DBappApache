<head>
<link rel="stylesheet" type="text/css" href="../../styles/style.css">
   </head>
     <meta charset="utf8" />
  <style> 
  
  </style>
</head>
 <h1 align="center">Книги</h1>
 <body class = 'bodyStyle'>
<?php 

     echo "<a class = \"butStyle\" href = \"../../menu.php\">Назад</a>";
?>

     <?php 
        include "../../models/bookModel.php";
        echo $model->view();
     ?>
     <div align="center" style="margin-top:2%;">
  <button style="width:10%;height:4%;" id="buttAdd" class = 'butStyle'>Добавить</button>      
  <button style="width:10%;height:4%; margin-left:5%;" id="butEdit" class = "butStyle">Изменить</button>      
  <button style="width:10%;height:4%; margin-left:5%;" id="butDel" class = "butStyle">Удалить</button>  
</div>
</body>
<script>
   clickRb=function(id)
 {
	elems=document.getElementsByClassName('radio')
	for(var i=0;i<elems.length;i++)
		{
		 if(elems[i].checked)
			 {
			   if(elems[i].id != id)
		         elems[i].checked=false;
			 }
		}
	
 }
 buttAdd.onclick = function()
    {
      location.href = '../../controller.php?action=book&actionType=editTable&id=-1';
    }
    butEdit.onclick = function()
    {
      elems=document.getElementsByClassName('radio')
	   selId= -1;
		for(var i=0;i<elems.length;i++)
			{
			 if(elems[i].checked)
				 selId= elems[i].id
			}
	 if(selId==-1)
		 alert('Не выбрана строка для изменения!')
	else
      location.href = "../../controller.php?action=book&actionType=editTable&id="+selId;
    }
    butDel.onclick = function()
    {
      elems=document.getElementsByClassName('radio')
	 selId= -1;
		for(var i=0;i<elems.length;i++)
			{
			 if(elems[i].checked)
				 selId= elems[i].id
			}
	 if(selId==-1)
		 alert('Не выбрана строка для изменения!')
	else
      location.href = "../../controller.php?action=book&actionType=deleteTable&id="+selId;
    }
</script>