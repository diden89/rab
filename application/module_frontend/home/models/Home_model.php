<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function get_menu($wh = array())
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('as_guru', 'N');
		$this->db->where('as_kepsek', 'N');
		$this->db->where($wh);
		$this->db->order_by('parent_id', 'asc');
		$this->db->order_by('id', 'asc');

		return $this->db->get('menu');
	}
	
	public function get_menu_member($aslogin)
	{
		$this->db->where('is_active', 'Y');
		if($aslogin == "2")
		{
			$this->db->where('as_guru', 'Y');
		}
		else
		{
			$this->db->where('as_kepsek', 'Y');
		}
		$this->db->where('is_admin', 'N');
		// $this->db->order_by('parent_id', 'asc');
		$this->db->order_by('id', 'asc');

		return $this->db->get('menu');
	}

	public function get_company()
	{
		$this->db->where('is_active', 'Y');

		return $this->db->get('company');
	}

	public function get_email($company_id,$status)
	{
		$this->db->where('company_id', $company_id);
		$this->db->where('c_type', $status);
		$this->db->where('is_active', 'Y');

		return $this->db->get('contact');
	}

	public function get_contact($company_id)
	{
		$this->db->where('company_id', $company_id);
		$this->db->where_not_in('c_type', 'email');
		$this->db->where('is_active', 'Y');

		return $this->db->get('contact');
	}

	public function get_header_home($url)
	{
		$this->db->where('is_active', 'Y');
		// $this->db->where('type', $url);

		return $this->db->get('header');
	}

	public function get_header($url)
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('is_admin', 'N');
		$this->db->where('url', $url);

		return $this->db->get('menu');
	}

	public function get_data_penerima($limit)
	{
		$this->db->select('dp.*,ds.*,da.*,do.*,drp.*,dbb.*,dip.*,dp.id as dp_id,ds.id as ds_id,da.id as da_id,do.id as do_id,drp.id as drp_id,dbb.id as dbb_id,dip.id as dip_id,dp.img as dp_image');
		$this->db->from('data_penerima dp');
		$this->db->join('data_sekolah ds','dp.id = ds.id_penerima','left');
		$this->db->join('data_alamat da','dp.kode_penerima = da.id_relasi','left');
		$this->db->join('data_orangtua do','dp.id = do.id_penerima','left');
		$this->db->join('data_rekening_penerima drp','dp.id = drp.id_penerima','left');
		$this->db->join('data_informasi_penerima dip','dp.id = dip.id_penerima','left');
		$this->db->join('data_bank dbb','drp.id_bank = dbb.id','left');
		// $this->db->join('data_donasi ddn','ddn.kode_penerima = dp.kode_penerima','left');
		
		$this->db->where('dp.is_active', 'Y');
		$this->db->where('dp.kode_penerima not in (select kode_penerima from data_donasi where is_active = "Y" and is_end = "N")');
		// $this->db->where('ddn.is_end', 'N');
		$this->db->where('dp.status', 'verify');
		$this->db->group_by('dp.id', 'DESC');

		if( ! empty($limit))
		{
			$this->db->limit($limit);
		}

		return $this->db->get();
	}

	public function get_data_donasi($limit)
	{
		$this->db->select('dp.*,ds.*,da.*,do.*,drp.*,dbb.*,dip.*,dp.id as dp_id,ds.id as ds_id,da.id as da_id,do.id as do_id,drp.id as drp_id,dbb.id as dbb_id,dip.id as dip_id,dp.img as dp_image');
		$this->db->from('data_penerima dp');
		$this->db->join('data_sekolah ds','dp.id = ds.id_penerima','left');
		$this->db->join('data_alamat da','dp.kode_penerima = da.id_relasi','left');
		$this->db->join('data_orangtua do','dp.id = do.id_penerima','left');
		$this->db->join('data_rekening_penerima drp','dp.id = drp.id_penerima','left');
		$this->db->join('data_informasi_penerima dip','dp.id = dip.id_penerima','left');
		$this->db->join('data_bank dbb','drp.id_bank = dbb.id','left');
		$this->db->join('data_donasi ddn','ddn.kode_penerima = dp.kode_penerima','left');
		
		$this->db->where('dp.is_active', 'Y');
		$this->db->where('ddn.is_active', 'Y');
		$this->db->where('ddn.is_end', 'N');
		$this->db->where('dp.status', 'verify');
		$this->db->group_by('dp.id', 'DESC');

		if( ! empty($limit))
		{
			$this->db->limit($limit);
		}

		return $this->db->get();
	}

	public function get_projects()
	{
		$this->db->select('p.*,c.*,p.id as pro_id,c.id as cat_id');
		$this->db->from('projects p');
		$this->db->join('category c','p.category_id = c.id','left');
		$this->db->where('p.is_active', 'Y');

		return $this->db->get();
	}

	public function get_filter_projects()
	{
		$this->db->where('is_active', 'Y');
		$this->db->where('type', 'projects');

		return $this->db->get('category');
	}

	public function get_team()
	{
		$this->db->select('e.id as id_emp,e.fullname, p.caption as position, ed.caption as education, e.img', FALSE);
		$this->db->from('employee e');
		$this->db->join('position p', 'p.id = e.position_id');
		$this->db->join('education ed', 'ed.id = e.education_id');
		$this->db->where('e.is_active', 'Y');
		$this->db->where('p.is_active', 'Y');
		$this->db->where('ed.is_active', 'Y');
		$this->db->order_by('p.seq', 'ASC');

		return $this->db->get();
	}

	public function get_news()
	{
		$this->db->select('*,n.id as news_id,c.id as cat_id', FALSE);
		$this->db->from('news n');
		$this->db->join('category c', 'c.id = n.category_id');
		$this->db->where('n.is_active', 'Y');
		$this->db->where('c.is_active', 'Y');
		$this->db->order_by('n.date', 'ASC');

		return $this->db->get();
	}

	public function get_products()
	{
		$this->db->select('p.id,p.products_name,p.products_price,p.products_short_description,p.products_detail_description,p.date,pi.img,pi.url', FALSE);
		$this->db->from('products p');
		$this->db->join('products_image pi', 'p.id = pi.products_id');
		$this->db->where('p.is_active', 'Y');
		$this->db->where('pi.is_active', 'Y');
		$this->db->where('p.is_best', 'Y');
		$this->db->group_by('p.id');
		$this->db->order_by('p.id', 'ASC');

		return $this->db->get();
	}

	public function get_company_legal()
	{
		$this->db->where('is_active', 'Y');
		$this->db->order_by('seq', 'ASC');

		return $this->db->get('company_legal');
	}

	public function get_properties($url = '')
	{
		$this->db->where('url', $url);
		$this->db->where('is_active', 'Y');
		return $this->db->get('menu');
	}

	public function get_data_select($table,$order)
	{
		$this->db->order_by($order, 'ASC');
		return $this->db->get($table);
	}

	public function get_data_provinsi()
	{
		$this->db->order_by('nama_provinsi', 'ASC');
		return $this->db->get('master_provinsi');
	}

	public function select_kab_kota($id)
	{

		$this->db->where('id_provinsi', $id);
		$this->db->order_by('nama_kabkota', 'ASC');
		return $this->db->get('master_kab_kota');
	}

	public function select_kecamatan($id)
	{
		$this->db->where('id_kab_kota', $id);
		$this->db->order_by('nama_kecamatan', 'ASC');
		return $this->db->get('master_kecamatan');
	}

	public function select_kelurahan($id)
	{
		$this->db->where('id_kecamatan', $id);
		$this->db->order_by('nama_kelurahan', 'ASC');
		return $this->db->get('master_kelurahan');
	}

	public function get_alamat($id)
	{
		$this->db->where('id_relasi', $id);
		return $this->db->get('data_alamat');
	}

	public function get_status($wh = '')
	{
		$this->db->where($wh);
		return $this->db->get('user_detail');
	}

	public function get_data_donate()
	{
		$this->db->where('is_active','Y');
		$this->db->where('is_end','N');

		return $this->db->get('data_donasi');
	}

	public function cek_duplikat_transfer($data)
	{
		$this->db->where('id_data_donasi',$data['id_data_donasi']);
		$this->db->where('tgl_mulai',$data['tgl_mulai']);
		$this->db->where('tgl_jatuh_tempo',$data['tgl_jatuh_tempo']);

		return $this->db->get('transfer_donasi');
	}

	public function do_upload($data = array(),$table)
	{
		$result= $this->db->insert($table,$data);
       	
       	return $result;
	}

	public function do_update($data = array(),$wh,$table)
	{

		$this->db->set($data);
		$this->db->where($wh);

		$update = $this->db->update($table);

		return $update;
	}

	public function get_card_data($id)
	{
		
		$this->db->select('ds.*,dk.*,ds.id as ds_id,dk.id as dk_id,concat(dj.nama_jurusan," ",dkl.nama_kelas," ",dr.nama_ruangan) as nama_kelas_ruangan');
		$this->db->from('data_siswa ds');
		$this->db->join('data_kartu dk','dk.id_siswa = ds.id','LEFT');
		$this->db->join('data_ajar_siswa das','das.siswa_id = ds.id','LEFT');
		$this->db->join('data_ruangan dr','dr.id = das.ruangan_id','LEFT');
		$this->db->join('data_kelas dkl','dkl.id = das.kelas_id','LEFT');
		$this->db->join('data_jurusan dj','dj.id = dkl.jurusan_id','LEFT');

		$this->db->where('ds.is_active','Y');
		$this->db->where('dk.is_active','Y');
		$this->db->where('dk.card_id',$id);

		return $this->db->get();
		// return $q;
	}

	public function cek_absensi($data,$param="")
	{
		$this->db->from('data_absen_siswa');
		$this->db->where('id_siswa',$data['id_siswa']);
		$this->db->where('tanggal',$data['tanggal']);
		if( ! empty($param))
		{
			$this->db->where($param.'!=',NULL);
		}

		return $this->db->get();
		// return $q;
	}

}