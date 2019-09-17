<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hãy chọn hình để tính toán (Hình vuông &#9633;, chữ nhật &#x25AD;, tam giác &#9651;, và hình tròn &#9675;)</h1>
    <form action="" method="POST">
        <select name="shapes" id="shapes" onchange="form.submit()">
            <option selected="selected" value="none">Chọn hình</option>
            <option <?php if (isset($_POST['shapes']) && ($_POST['shapes'] == 'square')) { ?>selected="true" <?php }; ?>value="square">Hình vuông</option>
            <option <?php if (isset($_POST['shapes']) && ($_POST['shapes'] == 'rectangle')) { ?>selected="true" <?php }; ?>value="rectangle">Hình chữ nhật</option>
            <option <?php if (isset($_POST['shapes']) && ($_POST['shapes'] == 'triangle')) { ?>selected="true" <?php }; ?>value="triangle">Hình tam giác</option>
            <option <?php if (isset($_POST['shapes']) && ($_POST['shapes'] == 'circle')) { ?>selected="true" <?php }; ?>value="circle">Hình tròn</option>
        </select>

        <?php if (isset($_POST['shapes'])) { ?>
            <br>
            <br>
            <div <?php if ($_POST['shapes'] != 'square') { ?>style="display: none" <?php }; ?> >
                Nhập cạnh: <input type="number" name="squareSide" step="0.01">
            </div>
            
            <div <?php if ($_POST['shapes'] != 'rectangle') { ?>style="display: none" <?php }; ?> >
                Nhập chiều rộng: <input type="number" name="rectWidth" step="0.01"><br>
                Nhập chiều dài: <input type="number" name="rectHeight" step="0.01">
            </div>
            
            <div <?php if ($_POST['shapes'] != 'triangle') { ?>style="display: none" <?php }; ?> >
                Nhập cạnh thứ nhất: <input type="number" name="sideFirst" step="0.01"><br>
                Nhập cạnh thứ hai:  <input type="number" name="sideSecond" step="0.01"><br>
                Nhập cạnh thứ ba:   <input type="number" name="sideThird" step="0.01">
            </div>

            <div <?php if ($_POST['shapes'] != 'circle') { ?>style="display: none" <?php }; ?> >
                Nhập bán kính: <input type="number" name="squareRadius" step="0.01">
            </div>
            <br>
            <input type="submit" value="Tính toán" name="btn_submit" step="0.01">
        <?php } ?>
        
    </form>
    <br>

    <?php
		include 'geometry-function.php';

		if (isset($_POST['btn_submit'])) {
			if (isset($_POST['shapes'])) {
				$shapes = $_POST['shapes'];

				if ($shapes == 'square') {
					$squareSide = $_POST['squareSide'];

					if (empty($squareSide)) {
						echo '<br><font color=red><b>Hãy nhập đủ giá trị!</b></font>';
					} else {
						$newSquare = new Square($squareSide);

						echo '<b>Kiểu hình: </b> Hình vuông';
						echo '<br>Độ dài cạnh: ' . $squareSide;
						echo '<br>Chu vi:' . number_format($newSquare->calcPerimeter(), 2);
						echo '<br>Diện tích: ' . number_format($newSquare->calcArea(), 2);
					}
				}

				if ($shapes == 'rectangle') {
					$rectWidth = $_POST['rectWidth'];
					$rectHeight = $_POST['rectHeight'];

					if (empty($rectWidth) || empty($rectHeight)) {
						echo '<br><font color=red><b>Hãy nhập đủ giá trị!</b></font>';
					} else {
						$newRect = new Rectangle($rectWidth, $rectHeight);

						echo '<b>Kiểu hình: </b> Hình chữ nhật';
						echo '<br>Chiều dài: ' . $rectWidth;
						echo '<br>Chiều rộng: ' . $rectHeight;
						echo '<br>Chu vi: ' . number_format($newRect->calcPerimeter(), 2);
						echo '<br>Diện tích: ' . number_format($newRect->calcArea(), 2);
					}
                }
                
				function isTriangle($sideFirst = 0.0, $sideSecond = 0.0, $sideThird = 0.0) {
					if ($sideFirst + $sideSecond <= $sideThird || $sideFirst + $sideThird <= $sideSecond || $sideSecond + $sideThird <= $sideFirst) {
						return false;
					} else {
						return true;
					}
				}

				if ($shapes == 'triangle') {
					$sideFirst = $_POST['sideFirst'];
					$sideSecond = $_POST['sideSecond'];
					$sideThird = $_POST['sideThird'];

					if (empty($sideFirst) || empty($sideSecond) || empty($sideThird)) {
						echo '<br><font color=red><b>Hãy nhập đủ giá trị!</b></font>';
					} else {
						if (!isTriangle($sideFirst, $sideSecond, $sideThird)) {
							echo '<br><font color=red><b>Đây không phải là một tam giác!</b></font>';
							echo '<br><font color=blue><b>Điều kiện của tam giác: Tổng 2 cạnh bất kỳ luôn lớn hơn cạnh còn lại</b></font>';
						} else {
							$newTriangle = new Triangle($sideFirst, $sideSecond, $sideThird);

							echo '<b>Kiểu hình: </b> Hình tam giác';
							echo '<br>Chiều dài cạnh A: ' . $sideFirst;
							echo '<br>Chiều dài cạnh B: ' . $sideSecond;
							echo '<br>Chiều dài cạnh C: ' . $sideThird;
							echo '<br>Chu vi: ' . number_format($newTriangle->calcPerimeter(), 2);
							echo '<br>Diện tích: ' . number_format($newTriangle->calcArea(), 2);
						}
					}
				}


				if ($shapes == 'circle') {
					$radius = $_POST['squareRadius'];

					if (empty($radius)) {
						echo '<br><font color=red><b>Hãy nhập đủ giá trị!</b></font>';
					} else {
						$newCircle = new Circle($radius);

						echo '<b>Kiểu hình: </b> Hình tròn';
						echo '<br>Bán kính: ' . $radius;
						echo '<br>Chu vi: ' . number_format($newCircle->calcPerimeter(), 2);
						echo '<br>Diện tích: ' . number_format($newCircle->calcArea(), 2);
					}
				}
			}
		}
	?>

</body>
</html>