<?php
	class Emp{
		//这个类的一个对象实例表示一条记录
		private $id;
		private $name;
		private $email;
		private $grade;
		private $salary;
		/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

		/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

		/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

		/**
	 * @return the $grade
	 */
	public function getGrade() {
		return $this->grade;
	}

		/**
	 * @return the $salary
	 */
	public function getSalary() {
		return $this->salary;
	}

		/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

		/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

		/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

		/**
	 * @param field_type $grade
	 */
	public function setGrade($grade) {
		$this->grade = $grade;
	}

		/**
	 * @param field_type $salary
	 */
	public function setSalary($salary) {
		$this->salary = $salary;
	}

		
	}

?>