<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="mx-auto" style="max-width:400px;">
  <h2 class="text-center mb-4 text-primary fw-bold">Connexion</h2>

  <?php if (!empty($_GET['error'])): ?>
    <div class="alert alert-danger">Email ou mot de passe incorrect.</div>
  <?php endif; ?>

  <form action="actions/login.php" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
    <div class="mb-3">
      <input type="email" name="email" required class="form-control rounded-pill" placeholder="Adresse e-mail" />
    </div>
    <div class="mb-4">
      <input type="password" name="password" required class="form-control rounded-pill" placeholder="Mot de passe" />
    </div>
    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold">Se connecter</button>
  </form>

  <p class="text-center mt-3">Pas encore inscrit ? <a href="register.php">S'inscrire</a></p>
</div>

<?php include 'includes/footer.php'; ?>
