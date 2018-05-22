<?php

	namespace App\Controller\Login;


	class LoginController
	{
		protected $data = [];

		public function insert(){

			return 'abc';
		}

		/**
		 * @param array $data
		 */
		public function setData($data)
		{
			$this->data=$data;

			return $this;
		}

		/**
		 * @return array
		 */
		public function getData()
		{
			return $this->data;
		}

		public function run(){
			try{
				$this->wert();
			}
			catch(\Throwable $e){
				throw $e;
			}
		}

		protected function wert()
		{
			throw new LoginException('Exception', 3);
		}
	}
