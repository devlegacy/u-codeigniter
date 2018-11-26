<form action="<?= base_url()."contactos/create" ?>" method="POST">

  <div>
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" placeholder="Nombre apellido apellido" value="<?= set_value('name') ?>" />
    <?= form_error('name') ?>
  </div>
  <div>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" placeholder="usuario@dominio.com" value="<?= set_value('email') ?>" />
    <?= form_error('email') ?>
  </div>
  <div>
    <label for="phone">Teléfono:</label>
    <input type="text" name="phone" id="phone" placeholder="9988112233" value="<?= set_value('phone') ?>" />
    <?= form_error('phone') ?>
  </div>
  <div>
    <label for="birthdate">Fecha de nacimiento:</label>
    <input type="date" name="birthdate" id="birthdate" placeholder="9988112233" value="<?= set_value('birthdate') ?>"/>
    <?= form_error('birthdate') ?>
  </div>
  <div>
    <label for="status">Estado</label>
    <select name="status" id="status">
      <option <?= set_value('status') == '1' ? 'selected' : '' ?> value="1">Activo</option>
      <option <?= set_value('status') == '0' ? 'selected' : '' ?> value="0">Inactivo</option>
    </select>
    <?= form_error('status') ?>
  </div>
  <button type="submit">Guardar</button>
</form>
