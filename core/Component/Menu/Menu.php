<?php
namespace Shopvel\Component\Menu;

class Menu
{
    private $menu;
    private $menuChildrens;

    /**
     * @return mixed
     */
    public function get() {
        return $this->menu;
    }

    /**
     * @return mixed
     */
    public function getChildrens($name)
    {
        return $this->menuChildrens[$name];
    }

    /**
     * @param array $menu
     */
    public function add(array $menu)
    {
        $this->menu[] = $menu;
        usort($this->menu, function($a, $b) {
            return $a['index'] - $b['index'];
        });
    }

    /**
     * @param array $child
     */
    public function addChild(array $child)
    {
        if (empty($child['target_group'])) {
            $this->menuChildrens[$child['target']][$child['name']] = $child;
            uasort($this->menuChildrens, function($a, $b) {
                return $a['index'] - $b['index'];
            });
        } else {
            $this->menuChildrens[$child['target']][$child['target_group']]['childrens'][] = $child;
            uasort($this->menuChildrens[$child['target']][$child['target_group']]['childrens'], function($a, $b) {
                return $a['index'] - $b['index'];
            });
        }
    }
}