
  <div class="form-group">
    <label for="name">Nombre:</label>
    <input class="form-control <?= hasError('name') ?>" type="text" name="name" id="name" placeholder="Nombre apellido apellido" value="<?= setValue('name', $contact ?? null) ?>"  required/>
    <?= form_error('name') ?>
  </div>
  <div class="form-group">
    <label for="email">Correo electrónico:</label>
    <input class="form-control  <?= hasError('email') ?>" type="email" name="email" id="email" placeholder="usuario@dominio.com" value="<?= setValue('email', $contact ?? null) ?>"  required/>
    <?= form_error('email') ?>
  </div>
  <div class="form-group">
    <label for="phone">Teléfono:</label>
    <input class="form-control <?= hasError('phone') ?>" type="text" name="phone" id="phone" placeholder="9988112233" value="<?= setValue('phone', $contact ?? null) ?>"  required/>
    <?= form_error('phone') ?>
  </div>
  <div class="form-group">
    <label for="birthdate">Fecha de nacimiento:</label>
    <input class="form-control  <?= hasError('birthdate') ?>" type="date" name="birthdate" id="birthdate" placeholder="9988112233" value="<?= setValue('birthdate', $contact ?? null) ?>" required/>
    <?= form_error('birthdate') ?>
  </div>
  <div class="form-group">
    <label for="status">Estado</label>
    <select class="form-control <?= hasError('status') ?>" name="status" id="status" required>
      <option <?= setValue('status', $contact ?? null) == '1' ? 'selected' : '' ?> value="1">Activo</option>
      <option <?= setValue('status', $contact ?? null) == '0'? 'selected' : '' ?> value="0">Inactivo</option>
    </select>
    <?= form_error('status') ?>
  </div>


