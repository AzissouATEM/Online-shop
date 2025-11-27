<?php
require 'includes/config.php';
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

$user = $_SESSION['user'];
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5 mb-5" style="max-width: 600px;">
  <h2 class="mb-4">Mon profil</h2>
  <form action="actions/update_profile.php" method="POST">
    <div class="mb-3">
      <label>Nom</label>
      <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Mettre à jour</button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
