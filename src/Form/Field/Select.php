<?php
/**
 * 单选组件
 *
 * @author nelsons
 * @time 2023-09-06 15:23:33
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Select extends Field implements RenderAble
{
    use Transformer;

    protected $type = 'select';

    protected $option;
    protected $ajax;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function ajax($url): self
    {
        $this->ajax = $url;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
            'url' => $this->ajax,
        ];
        return array_merge(parent::render(), $res);
    }
}