<?php

function hasError($name) {
  return form_error($name) ? 'is-invalid' : (set_value($name) ? 'is-valid' : '');
}

function setValue($value='', $data = null) {
  if(isset($data) && !empty($data))  return $data->$value ? $data->$value : set_value($value);
  return set_value($value);
}
