<?php
/*!
 * ---------------------------------------------------------------
 * DO NOT USE NON ALPHA-NUMERIC CHARACTER!
 * ---------------------------------------------------------------
 */
	$noobs_title = 'Trademark';
	$noobs_title_1 = 'Automatic TM Watch Engine';
	$noobs_title_2 = 'Selamat Datang di Aplikasi Merek Dagang, Aplikasi Dari Anda Oleh Anda Untuk Anda';

/*!
 * ---------------------------------------------------------------
 * CHANGE THE FOLLOWING SETTINGS ACCORDING TO YOUR COMPUTER/LAPTOP
 * ---------------------------------------------------------------
 */
	$noobs_db_start = TRUE;
	$noobs_language = 'id';
	$noobs_default_controller = 'trademark/invented_brand';
	$noobs_module_dir = 'module_frontend';
	$noobs_module_url = '';
	
	switch ($_SERVER['HTTP_HOST'])
	{
		case 'ahp.hptekno.com':
			$noobs_db_hostname[] = 'localhost';
			$noobs_db_username[] = 'ahp';
			$noobs_db_password[] = 'ahp';
			$noobs_db_pconnect[] = TRUE;
			$noobs_db_database[] = 'ahp';
			$noobs_db_driver[] = 'mysqli';
			$noobs_db_active[] = 'default';
			$noobs_expiration = 0;
			$noobs_update_time = 300;
			$noobs_env = 'development';
			$noobs_vendordir = 'vendors';
			$noobs_sessdir = '/var/www/html/ahp/apps/sessions';
		break;
		default:
			switch ($_SERVER['SERVER_ADMIN'])
			{
				case 'ITDEPT01-PKU':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'kmzway87aa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\fandika\Downloads\tmp';
				break;
				case 'ANDYIT-PC':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'kmzway87aa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\andy1t\Downloads\tmp';
				break;
				case 'admin@example.com':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'apolokoa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\dkosasih\Downloads\tmp';
				break;
				case 'diden89':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'apolokoa';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\dkosasih\Downloads\tmp';
				break;
				case 'sikelopes':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'admin';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\aprip\Downloads\tmp';
				break;
				case 'it17-pku':
					$noobs_db_hostname[] = 'localhost';
					$noobs_db_username[] = 'root';
					$noobs_db_password[] = 'admin';
					$noobs_db_pconnect[] = TRUE;
					$noobs_db_database[] = 'merekdagang';
					$noobs_db_driver[] = 'mysqli';
					$noobs_db_active[] = 'default';
					$noobs_expiration = 0;
					$noobs_update_time = 300;
					$noobs_env = 'development';
					$noobs_vendordir = 'vendors';
					$noobs_sessdir = 'C:\Users\alpardede\Downloads\tmp';
				break;
				// KHUSUS UNTUK DEVELOPER, TAMBAHKAN DIBAWAH INI, COPAS AJA DARI case 'ITDEPT01-PKU': SAMPAI break;
			}
		break;
	}