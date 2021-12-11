<?php
	/**
	 * Copyright (C) ZubDev Digital Media - All Rights Reserved
	 *
	 * File: Smartie.php
	 * Author: Zubayr Ganiyu
	 *   Email: <seunexseun@gmail.com>
	 *   Website: https://zubdev.net
	 * Date: 09/12/2021
	 * Time: 21:28
	 */


	namespace Zubdev\Ci4Smarty;

	use Smarty;

	class Smartie extends Smarty{

		protected $debug;

		/**
		 * Smartie constructor.
		 */
		function __construct()
		{
			parent::__construct();

			$this->template_dir = APPPATH . "Views";

			$this->compile_dir = WRITEPATH . "templates_c";
			if (!is_writable($this->compile_dir))
			{
				// make sure to compile directory can be written to
				@chmod($this->compile_dir, 0777);
			}

			log_message('debug', "Smarty Class Initialized");
		}


		/**
		 * Init smarty debug
		 *
		 * @param   bool  $debug
		 */
		function setDebug(bool $debug = true)
		{
			$this->debug = $debug;
		}


		/**
		 * Render smarty view
		 *
		 * @param          $template
		 * @param   array  $data
		 *
		 * @return false|string
		 * @throws \SmartyException
		 */
		function view($template, array $data = [])
		{
			if (!$this->debug)
			{
				$this->error_reporting = false;
			}
			$this->error_unassigned = false;

			foreach ($data as $key => $val)
			{
				$this->assign($key, $val);
			}

			return $this->fetch($template . '.tpl');
		}

	}
