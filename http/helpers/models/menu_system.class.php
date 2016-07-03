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
class Menu_System {
    protected $table = 'menu_system';
    protected $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function getMainMenu() {
        return $this->db->rawQuery("SELECT *
                                    FROM menu_system
                                    WHERE 1=1
                                        AND hidden = 0
                                        AND parent_id IS NULL
                                ");
    }

    function getSubMenu($parent_id) {
        $results = $this->db->rawQuery("SELECT *
                                        FROM menu_system
                                        WHERE 1=1
                                            AND hidden = 0
                                            AND parent_id='{$parent_id}'
                                    ");
        if ( ! empty($results) ) foreach ( $results as $i => $row ) $results[$i]['children'] = $this->getSubMenu($row['id']);

        return $results;
    }

    public function showMenu($data) {
        $results = $this->getMainMenu();
        foreach ( $results as $i => $row ) $results[$i]['children'] = $this->getSubMenu($row['id']);

        foreach ( $results as $menu ) {
            if ( $menu['sidebar_category'] == 1 ) {
                echo '<li class="sidebar-category">';
                    echo '<span>' . $menu['name'] . '</span>';
                    echo '<span class="pull-right"><i class="' .  $menu['icon_right'] . '"></i></span>';
                echo '</li>';
            }

            if ( count($menu['children']) > 0 ) {
                $this->showChildren($menu['children'], $data);
            }
        }
    }

    public function showChildren($children, $data) {
        foreach ( $children as $child ) {
            if ( count($child['children']) == 0 ) {
                $active = isset($data[$child['active_code']]) ? ' class="' . $data[$child['active_code']] . '"' : '';
                echo '<li' . $active . '>';
                    echo '<a href="' . $child['href'] . '">' . $child['name'] . '</a>';
                echo '</li>';
            }
            else {
                $active = isset($data[$child['active_code']]) ? ' ' . $data[$child['active_code']] : '';
                echo '<li class="submenu' . $active . '">';
                    echo '<a href="' . $child['href'] . '">';
                        if ( ! empty($child['icon_left']) ) echo '<span class="icon"><i class="' . $child['icon_left'] . '"></i></span>';
                        echo '<span class="text">' . $child['name'] . '</span>';
                        echo '<span class="' . $child['icon_right'] . '"></span>';
                    echo '</a>';
                    echo '<ul>';
                        $this->showChildren($child['children'], $data);
                    echo '</ul>';
                echo '</li>';
            }
        }
    }
}
