<?php
if ($status == 'waiting') {
    $badge_status   = 'badge-secondary';
    $status         = 'Menunggu Pembayaran';
}

if ($status == 'paid') {
    $badge_status   = 'badge-primary';
    $status         = 'Dibayar';
}

if ($status == 'process') {
    $badge_status   = 'badge-warning';
    $status         = 'Diproses Penjual';
}

if ($status == 'delivered') {
    $badge_status   = 'badge-info';
    $status         = 'Dikirim';
}

if ($status == 'done') {
    $badge_status   = 'badge-success';
    $status         = 'Selesai';
}

if ($status == 'cancel') {
    $badge_status   = 'badge-danger';
    $status         = 'Dibatalkan';
}
?>

<?php if ($status) : ?>
    <span class="badge badge-pill <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>