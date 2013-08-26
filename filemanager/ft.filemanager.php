<?php
class Fieldtype_filemanager extends Fieldtype {

  var $meta = array(
    'name'       => 'Filemanager for Statamic',
    'version'    => '1.0',
    'author'     => 'Katrin Kerber',
    'author_url' => 'http://katrinkerber.com'
  );


  public function render()
  {
    $html = "<div class='filemanager-container'>";

    if ($this->field_data) {
      if(preg_match('[jpg|jpeg|png|gif]', $this->field_data)) { 
        $html .= "<img src='{$this->field_data}' height='59'>";
      }
      $html .= "<input type='text' name='{$this->fieldname}' value='{$this->field_data}' />";
      $html .= "<button type='button' class='btn btn-small filemanager remove-file'>Remove</button>";
    } else {
      $html .= "<input type='text' name='{$this->fieldname}' value='' />";
      $html .= "<button type='button' class='btn btn-small filemanager add-file'>Choose File</button>";
    }
    $html .= "</div>";

    return $html;
  }

  public function process() {
    return trim($this->field_data);
  }
}
