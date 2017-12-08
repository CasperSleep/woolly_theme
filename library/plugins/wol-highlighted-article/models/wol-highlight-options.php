<?php
namespace wol_highlighted_article\models;

class WOL_Highlight_Options
{
    private $highlight = 0;

    private $color = '';

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            if( property_exists($this, $key)){
                $this->$key = trim($value);
            }
        }
    }

    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function is_empty()
    {
        $empty = true;
        if($this->color != '' || $this->highlight) {
           $empty = false;
        }
        return $empty;
    }
}