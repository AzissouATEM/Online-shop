<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="text-center py-5">
  <h1 class="display-4 fw-bold mb-4">Bienvenue sur notre boutique en ligne</h1>
  <p class="lead mb-5">Découvrez des articles uniques et commandez en toute simplicité.</p>
  <?php if (!isset($_SESSION['user'])): ?>
    <a href="register.php" class="btn btn-outline-primary btn-lg me-3 px-4">S'inscrire</a>
    <a href="login.php" class="btn btn-primary btn-lg px-4">Se connecter</a>
  <?php else: ?>
    <a href="product.php" class="btn btn-success btn-lg px-5">Voir les produits</a>
  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
