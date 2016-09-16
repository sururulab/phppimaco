<?php
namespace Proner\PhpPimaco;

class P
{
    private $content;
    private $margin;
    private $padding;
    private $float;
    private $size;
    private $bold;

    function __construct($content)
    {
        $this->content = $content;
        $this->margin = 0;
        $this->padding = 0;
        $this->float = "left";
        $this->bold = false;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function align($align)
    {
        $this->float = $align;
        return $this;
    }

    public function br()
    {
        $this->content .= "<br>";
        return $this;
    }

    private function render()
    {
        $tag = "span";
        if( $this->margin !== null ){
            $style[] = "margin: {$this->margin}mm";
        }
        if( $this->padding !== null ){
            $style[] = "padding: {$this->padding}mm";
        }
        if( $this->float !== null ){
            $style[] = "float: {$this->float}";
        }
        if( $this->size !== null ){
            $style[] = "font-size: {$this->size}mm";
        }
        if( $this->bold === true ){
            $style[] = "font-weight: bold";
        }
        $this->content = "<{$tag} style='".implode(";",$style).";'>{$this->content}</{$tag}>";
    }

    public function b()
    {
        $this->bold = true;
        return $this;
    }

    public function getContent()
    {
        $this->render();
        return $this->content;
    }
}