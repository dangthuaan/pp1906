<?php
	abstract class Shape {
		abstract public function __construct();

		abstract public function calcPerimeter(); //tính chu vi

		abstract public function calcArea(); //tính diện tích
	}

	class Square extends Shape {
		private $side;

		public function __construct($side = 0.00) {
			$this->side = $side;
		}

		public function calcPerimeter() {
			$sideValue = $this->side;

			$perimeter = 4 * $sideValue;

			return $perimeter;
		}

		public function calcArea() {
			$sideValue = $this->side;

			$area = pow($sideValue, 2);

			return $area;
		}
	}

	class Rectangle extends Shape {
		private $width;
		private $height;

		public function __construct($width = 0.00, $height = 0.00) {
			$this->width = $width;
			$this->height = $height;
		}

		public function calcPerimeter() {
			$width = $this->width;
			$height = $this->height;

			$perimeter = 2 * ($width + $height);

			return $perimeter;
		}

		public function calcArea() {
			$width = $this->width;
			$height = $this->height;

			$area = $width * $height;

			return $area;
		}
	}

	class Triangle extends Shape {
		private $sideFirst;
		private $sideSecond;
		private $sideThird;

		public function __construct($sideFirst = 0.00, $sideSecond = 0.00, $sideThird = 0.00) {
			$this->sideFirst = $sideFirst;
			$this->sideSecond = $sideSecond;
			$this->sideThird = $sideThird;
		}

		public function calcPerimeter() {
			$sideFirst = $this->sideFirst;
			$sideSecond = $this->sideSecond;
			$sideThird = $this->sideThird;

			$perimeter = $sideFirst + $sideSecond + $sideThird;

			return $perimeter;
		}

		public function calcArea() {
			$sideFirst = $this->sideFirst;
			$sideSecond = $this->sideSecond;
			$sideThird = $this->sideThird;

			$halfPerimeter = $this->calcPerimeter() / 2;
			$area = sqrt($halfPerimeter * ($halfPerimeter - $sideFirst) * ($halfPerimeter - $sideSecond) * ($halfPerimeter - $sideThird));

			return $area;
		}
	}

	class Circle extends Shape {
		private $radius;

		public function __construct($radius = 0.00) {
			$this->radius = $radius;
		}

		public function calcPerimeter() {
			$radius = $this->radius;

			$perimeter = 2 * pi() * $radius;

			return $perimeter;
		}

		public function calcArea() {
			$radius = $this->radius;

			$area = pi() * pow($radius, 2);

			return $area;
		}
	}
