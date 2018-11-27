<form action="<?= base_url()."contactos/".($contact->id ?? null)."/edit" ?>" method="POST" class="needs-validation" novalidate>
<?php $this->load->view('contactos/partials/form'); ?>
<button class="btn btn-primary" type="submit">Editar</button>
</form>
