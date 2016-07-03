<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author qtran
 */
class Quick_Notes {
    protected $table = 'quick_notes';
    protected $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function allBy($created_by, $hidden = 0) {
        if ( $hidden != -1 ) $this->db->where('hidden', $hidden);
        $this->db->where('created_by', $created_by);
        $this->db->orderBy('created_at', 'desc');

        return $this->db->get($this->table);
    }

    public function save($input_data) {
        $this->db->insert($this->table, $input_data);
    }

    public function update($input_data, $id, $created_by) {
        $this->db->where('id', $id);
        $this->db->where('created_by', $created_by);
        $this->db->update($this->table, $input_data);
    }
}
