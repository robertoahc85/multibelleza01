<div class="card">
  <h1>Panel de Administración</h1>
  <p>Solo admins pueden ver esto.</p>
  <table>
    <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Creado</th></tr></thead>
    <tbody>
    <?php foreach ($users as $u): ?>
      <tr>
        <td><?= (int)$u['id'] ?></td>
        <td><?= htmlspecialchars($u['name']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['role']) ?></td>
        <td><?= htmlspecialchars($u['created_at']) ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
