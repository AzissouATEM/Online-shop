<?php
require 'includes/config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];
$stmt = $pdo->prepare("SELECT o.*, p.title, p.image, p.price 
                       FROM orders o 
                       JOIN products p ON o.product_id = p.id 
                       WHERE o.user_id = ? 
                       ORDER BY o.ordered_at DESC");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();

include 'includes/header.php';
?>

<h2 class="mb-4 text-center">Mes commandes</h2>

<?php if (count($orders) === 0): ?>
    <div class="alert alert-info text-center">Vous n’avez encore passé aucune commande.</div>
<?php else: ?>
  <div class="row g-4">
    <?php foreach ($orders as $order): ?>
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="row g-0">
            <div class="col-4">
              <img src="assets/images/<?= htmlspecialchars($order['image']) ?>" class="img-fluid rounded-start" alt="Image article" style="object-fit:cover; height:100%;">
            </div>
            <div class="col-8">
              <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title"><?= htmlspecialchars($order['title']) ?></h5>
                <p class="mb-1"><strong>Prix :</strong> <?= number_format($order['price'], 2, ',', ' ') ?> €</p>
                <p class="mb-1">
                  <strong>Statut :</strong> 
                  <?php if ($order['status'] === 'validée'): ?>
                    <span class="badge bg-success">Validée</span>
                  <?php else: ?>
                    <span class="badge bg-warning text-dark">En attente</span>
                  <?php endif; ?>
                </p>
                <p><small>Commandée le : <?= date('d/m/Y H:i', strtotime($order['ordered_at'])) ?></small></p>

                <?php if ($order['status'] === 'en attente'): ?>
                  <form action="actions/cancel_order.php" method="POST" class="mt-2">
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">Annuler</button>
                  </form>
                <?php endif; ?>

                <a href="actions/facture_pdf.php?order_id=<?= $order['id'] ?>" class="btn btn-outline-primary btn-sm mt-2 w-100">Télécharger facture</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
