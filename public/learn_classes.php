<?php

	class TestClass {
		function __construct() {
			echo "Constructor\n";

			$this->myname = "Carl";
		}

		function changeName($name) {
			$this->myname = $name;
		}

		function MyFunction() {
			echo "My Function! -- ".$this->myname." -- ";
		}
	}

	$MyClass  = new TestClass();
	$MyClass2 = new TestClass();
	$MyClass3 = new TestClass();

	$MyClass2->changeName("Joe");

	$MyClass->MyFunction();
	$MyClass2->MyFunction();
	$MyClass3->MyFunction();

