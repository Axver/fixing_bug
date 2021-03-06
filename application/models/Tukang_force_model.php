<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukang_force_model extends CI_Model
{

    public $table = 'detail_bahan_alat_harian';
    public $id = 'id_lap_harian_mingguan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_lap_harian_mingguan', $q);
	$this->db->or_like('id_satuan', $q);
	$this->db->or_like('jumlah_bahan', $q);
	$this->db->or_like('jumlah_pekerja', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('jenis_pekerjaan', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('panjang_penanganan', $q);
	$this->db->or_like('keterangan_dimensi', $q);
	$this->db->or_like('jumlah_tukang', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_lap_harian_mingguan', $q);
	$this->db->or_like('id_satuan', $q);
	$this->db->or_like('jumlah_bahan', $q);
	$this->db->or_like('jumlah_pekerja', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('jenis_pekerjaan', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('panjang_penanganan', $q);
	$this->db->or_like('keterangan_dimensi', $q);
	$this->db->or_like('jumlah_tukang', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tukang_force_model.php */
/* Location: ./application/models/Tukang_force_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-25 05:11:03 */
/* http://harviacode.com */