<?php
echo $this->Form->create('Shop', array ('class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data'));
echo $this->Form->input('name', array ('div' => 'form-group', 'class' => "form-control"));
echo $this->Form->input('siteUrl', array ('div' => 'form-group', 'class' => "form-control"));
echo $this->Form->input('description', array ('type' => 'textarea', 'div' => 'form-group', 'class' => "form-control", 'rows' => 3));
echo $this->Form->file('Document.submittedfile');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('Save edited data', array ('class' => 'btn btn-success', 'type' => 'button', 'label' => false));
