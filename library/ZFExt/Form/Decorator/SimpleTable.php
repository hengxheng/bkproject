<?php
class ZFExt_Form_Decorator_SimpleTable extends Zend_Form_Decorator_Abstract
{
	public function render($content)
	{
		$element = $this->getElement();
		$view	= $element->getView();
		if (null === $view) {
			return $content;
		}
		
                $table_name = $this -> getOption('table_name');
		$columns = $this->getOption('columns');
		$class = $this->getOption('class');
		$id = $this->getOption('id');

		$columns_html = '';
		foreach ($columns as $current_column_name) {
			$columns_html .= '<th>'.$current_column_name.'</th>';
		}

		$result = '
                        <br />
                        <br />
			<table class="'.$class.'" id="'.$id.'">
                        <colgroup style="background-color:#F7577C;"></colgroup>
                        <colgroup style="background-color:#E5F757;"></colgroup>
                        <colgroup style="background-color:#D557F7;"></colgroup>
                        <colgroup style="background-color:#57AAF7;"></colgroup>
                        <caption style="text-align" >'.$table_name.'</caption>
				<thead>
					<tr>
						'.$columns_html.'
					</tr>
				</thead>
				<tbody>
					'.$content.'
				</tbody>
			</table>
		';

		return $result;
	}
}
