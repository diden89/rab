<?php
// echo phpinfo();
/*!
 * ---------------------------------------------------------------
 * DO NOT USE NON ALPHA-NUMERIC CHARACTER!
 * ---------------------------------------------------------------
 */
	$noobs_title = 'Aplikasi RAB';
	$noobs_title_1 = 'Aplikasi RAB';
	$noobs_title_2 = 'Selamat Datang di Aplikasi RAB';

/*!
 * ---------------------------------------------------------------
 * CHANGE THE FOLLOWING SETTINGS ACCORDING TO YOUR COMPUTER/LAPTOP
 * ---------------------------------------------------------------
 */
	$noobs_db_start = TRUE;
	$noobs_language = 'id';
	$noobs_default_controller = 'settings/item_list';
	$noobs_module_dir = 'module_frontend';
	$noobs_module_url = '';
	
	switch ($_SERVER['HTTP_HOST'])
	{
		default:
			switch ($_SERVER['SERVER_ADMIN'])
			{
				case 'admin@example.com':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'apolokoa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'dbrab';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\administrator\Downloads\tmp';
				break;
				case 'diden89':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'apolokoa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'dbrab';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\administrator\Downloads\tmp';
				break;

				case 'postmaster@localhost ':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = '';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'dbrab';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\administrator\Downloads\tmp';
				break;
				// KHUSUS UNTUK DEVELOPER, TAMBAHKAN DIBAWAH INI, COPAS AJA DARI case 'ITDEPT01-PKU': SAMPAI break;
			}
		break;
	}