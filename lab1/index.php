<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="">
	<link rel="shortcut icon" href="#">
    <title>Задание 1, веб программирование.</title>


    <script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#myForm').submit(function(form_listener) {
				form_listener.preventDefault();
				$.ajax({
					type : "GET",
					url : "script.php",
					data : $(this).serialize(),
					success : function(data) {
						$('#resulting_table').html(data);
					}
				});
			});
		});
	</script>


     <script type="text/javascript">
        function validate() {
           var y = Number(document.forms["myForm"]["ChY"].value).toFixed(3);
           var x = document.forms["myForm"]["ChX"].value;

           if(y <= -5 | y >= 5){
           		alert("Вы вышли за диапазон Y");
           		return false;
           }

           if(get_checkbox_val_r()){
            	return true;
           }
           
           return false;
        }


        function get_checkbox_val_r() {
            var possible = [1, 1.5, 2, 2.5, 3];
            var numbers = new Set(possible);
            var checkboxes = document.querySelectorAll('.checker:checked');
            if (checkboxes.length != 1) {
                alert("ВЫБЕРИТЕ ОДНУ ОПЦИЮ");
                return false;
            }
            var r = document.querySelector('.checker:checked').value;
            return true;
        }

        var result  = '<?php echo $res;?>';
        var time = '<?php echo $time;?>';

    </script>

    <style>
    	* {
    		margin: 0;
    		padding: 0;
    	}
    	  body {
            font-family: Comic Sans MS;
            background: #A0FF00;
        }
    	.header{
    		height: 150px;
            background-color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
    	}
    	.title {
            font-weight: bold;
            font-size: 48px;
            text-align: center;
            text-transform: uppercase;
            color: #FF00FF;
           	font-family: Comic Sans MS;
        }
        .picture{
        	margin-left: 30%;
        }

       

    </style>

</head>

<body>
	   <header class="header">
	   		<h2 class="title">Панин Иван Михайлович P32082 1615</h2>
	   </header>

	   <div class="container">
	   		<img class="picture" src="Screenshot from 2022-09-01 15-00-53.png" alt="placeholder">
	   		

	   		<form onsubmit="return validate()" action="script.php" method="get" name="myForm" id="myForm">
                <fieldset>
	   			<div class="changeX">
		   			<p></p>
		   				<select size="9" multiple name="ChX" required="required">
		   				<option disabled value="">Выберите изменение X</option>
		   				<option value="-5">-5</option>
		   				<option value="-4">-4</option>
		   				<option value="-3">-3</option>
		   				<option value="-2">-2</option>
		   				<option value="-1">-1</option>
		   				<option value="0">0</option>
		   				<option value="1">1</option>
		   				<option value="2">2</option>
		   				<option value="3">3</option>
		   			</select>
	   			</div>
	   			</fieldset>

	   			<fieldset>
	   			<div class="ChangeY">
		   			<p><b>Введите изменение Y:</b></p>
		   			<input type="text" name="ChY"  required="required" size="3" maxlength="5">
		   		</div>
		   		</fieldset>


               <p><b>Выберите изменение R</b></p>

		   		<fieldset>
		   		<div class="ChangeR">
		   			<label class="Rlabl" for="choice1" class="block-description">R = 1</label>
		   			<input type="checkbox" name="r" id="choice1" value="1" class="checker">
		   			
		   			<label class="Rlabl" for="choice2" class="block-description">R = 1.5</label>
		   			<input type="checkbox" name="r" id="choice2" value="1.5" class="checker">
		   			
		   			<label class="Rlabl" for="choice3" class="block-description">R = 2</label>
		   			<input type="checkbox" name="r" id="choice3" value="2" class="checker">

		   			<label class="Rlabl" for="choice4" class="block-description">R = 2.5</label>
		   			<input type="checkbox" name="r" id="choice4" value="2.5" class="checker">

		   			<label class="Rlabl" for="choice5" class="block-description">R = 3</label>
		   			<input type="checkbox" name="r" id="choice5" value="3" class="checker">
		   		</div>
		   		</fieldset>


               
                <div>
                    <input type="submit" value="Проверить">
                    <input type="reset" value="Очистить">
                </div>
            </form>
	   </div>


	
		<div>
    		<div id="resulting_table"> 
    		<?php
    		$table_result = "<table id=\"main_table\" class=\"super_table\" border=\"3\"><tr><th>X:</th><th>Y:</th><th>R:</th><th>Попадание:</th><th>Время работы:</th></tr>";
            foreach ($_SESSION['history'] as $line) {
                $table_result.="<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td><td>$line[3]</td><td>$line[4]</td></tr>";
            }
                $table_result.="</table>";
                echo $table_result;
                ?> 
            </div>
		</div>
	</div>


</body>
</html>

