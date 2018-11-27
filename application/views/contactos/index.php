<?php use Carbon\Carbon; ?>

<?php if($this->session->flashdata('new-contact')): ?>
<div class="alert alert-success" role="alert">
  Nuevo contacto agregado
</div>
<?php endif ?>

<?php if(count($contacts)): ?>
  <div class="alert alert-primary" role="alert">
    Tienes <strong><?= count($contacts) ?> contactos(s)</strong>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo electrónico</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Fecha de nacimiento</th>
        <th scope="col">Edad</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $contact): ?>
      <tr>
        <th scope="row"><?= $contact->id ?></th>
        <td><a href="<?= base_url('contactos/').$contact->id ?>"><?= $contact->name ?></a></td>
        <td><?= $contact->email ?></td>
        <td><?= $contact->phone ?></td>
        <td><?= Carbon::createFromFormat('Y-m-d', $contact->birthdate)->format('d-m-Y') ?></td>
        <td><?= Carbon::createFromFormat('Y-m-d', $contact->birthdate)->age ?></td>
        <td><?= $contact->status == 1 ? '<span class="badge badge-pill badge-success">Activo</span>' : '<span class="badge badge-pill badge-secondary">Inactivo</span>' ?></td>
        <td>
          <a href="<?= base_url('contactos/').$contact->id."/edit" ?>" class="btn btn-warning">Editar</a>
          <button class="btn btn-danger">Eliminar</button>
        </td>
    <?php endforeach ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="alert alert-info" role="alert">
    Sin contactos aún
  </div>
<?php endif ?>
