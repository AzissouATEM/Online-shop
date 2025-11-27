<?php require 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h1 class="mb-4 text-center fw-bold">🛍️ Nos produits</h1>
<div class="row g-4 justify-content-center">
<?php
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
while ($row = $stmt->fetch()):
?>
  <div class="col-lg-4 col-md-6 col-sm-10 d-flex align-items-stretch">
    <div class="card shadow-sm rounded-4 overflow-hidden w-100">
      <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="Produit" style="height:220px;object-fit:cover;transition: transform 0.3s ease;">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title text-primary"><?= htmlspecialchars($row['title']) ?></h5>
        <p class="card-text flex-grow-1 text-truncate"><?= htmlspecialchars($row['description']) ?></p>
        <p class="fs-5 fw-semibold text-success"><?= number_format($row['price'], 2, ',', ' ') ?> Fcfa</p>
        <a href="product_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-auto rounded-pill">Voir le produit</a>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>
