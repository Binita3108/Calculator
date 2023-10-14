<!DOCTYPE html>
<html>
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,700;1,600&display=swap" rel="stylesheet">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/calculator.css">
		<title>Calculator</title>
	</head>

	<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input type="number" class="num1" name="num01"
				placeholder="Number one">
				<select name="operator" class="operator">
					<option value="add" class="boxes">+</option>
					<option value="subtract">-</option>
					<option value="multiply">*</option>
					<option value="divide">/</option>
				</select>
				<input type="number"  class="num2" name="num02"
				placeholder="Number two">
				<button class="calculatebtn">Calculate</button>
		</form>		

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		$num01=filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
    		$num02=filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
    		$operator=htmlspecialchars($_POST["operator"]);

    		$errors=false;

    		if (empty($num01) || empty($num02) || empty($operator)) {
    			echo "<p class='çalc-error'>Fill in all fields!</p>";
    			$errors=true;
    		}

    		if (!is_numeric($num01) || !is_numeric($num02)) {
      		echo "<p class='çalc-error'>Only write numbers!</p>";
    			$errors=true;   
    		}

        if (!$errors) {
        	$value=0; 

        	switch ($operator) {
        		case "add":
        			$value=$num01+$num02;
        			break;
        		case "subtract":
        			$value=$num01-$num02;
        			break;
        		case "multiply":
        			$value=$num01*$num02;
        			break;
        		case "divide":
        			$value=$num01/$num02;
        			break;	
        		default:
        			echo "<p
        			class='calc-error'>Something went wrong!</p>";   			
        	}

        	echo "<p class='calc-result'>Result= " . $value . "</p>";
        }

    }
    ?>
   


    <div class="calc">
		<input type="submit" class="numbtn" name="num"value="7">
		<input type="submit" class="numbtn" name="num"value="8">
		<input type="submit" class= "numbtn" name="num"value="9">
		<input type="submit" class="calbtn" name="op"value="+"> <br>
		<input type="submit" class="numbtn" name="num"value="4">
		<input type="submit" class="numbtn" name="num"value="5">
		<input type="submit" class="numbtn" name="num"value="6">
		<input type="submit" class="calbtn" name="op"value="-"> <br>
		<input type="submit" class="numbtn" name="num"value="1">
		<input type="submit" class="numbtn" name="num"value="2">
		<input type="submit" class="numbtn" name="num"value="3">
		<input type="submit" class="calbtn" name="op"value="*"> <br>
		<input type="submit" class="C" name="num"value="C">
		<input type="submit" class="numbtn" name="num"value="0">
		<input type="submit" class="equal" name="equal"value="=">
		<input type="submit" class="calbtn" name="op"value="/"> <br>
	</div>

	</body>

</html>