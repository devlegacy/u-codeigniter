
<title><?= $title ?></title>
<h1>Contactos</h1>
<?php if($this->session->flashdata('insert')): ?>
<?php var_dump($this->session->flashdata('insert')) ?>
<?php endif ?>

<?php if(count($contacts)): ?>
  <?php foreach($contacts as $contact): ?>
    <p><?= $contact->name ?></p>
  <?php endforeach ?>
<?php else: ?>
<p>Sin contactos aún</p>
<?php endif ?>
