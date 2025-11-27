<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="mx-auto" style="max-width:400px;">
  <h2 class="text-center mb-4 text-primary fw-bold">Inscription</h2>

  <?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <form action="actions/register.php" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
    <div class="mb-3">
      <input type="text" name="name" required class="form-control rounded-pill" placeholder="Nom complet" />
    </div>
    <div class="mb-3">
      <input type="email" name="email" required class="form-control rounded-pill" placeholder="Adresse e-mail" />
    </div>
    <div class="mb-3">
      <input type="password" name="password" required class="form-control rounded-pill" placeholder="Mot de passe" />
    </div>
    <div class="mb-4">
      <input type="password" name="confirm_password" required class="form-control rounded-pill" placeholder="Confirmer le mot de passe" />
    </div>
    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold">S'inscrire</button>
  </form>

  <p class="text-center mt-3">Déjà un compte ? <a href="login.php">Se connecter</a></p>
</div>

<?php include 'includes/footer.php'; ?>
