<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Очищаем внешний отступ для home.css чтобы грид был на весь экран -->
<link rel="stylesheet" href="<?= site_url('public/css/home.css') ?>">

<main class="main-grid">
  <a href="<?= site_url('trampoline-park.php') ?>" class="column column-1">
    <div class="column-content">
      <h2 class="column-title">Батутный парк</h2>
      <p class="column-description">Много разных развлечений в парке</p>
      <span class="column-button">Открыть  &rarr;</span>
    </div>
  </a>

  <a href="<?= site_url('ski-slope.php') ?>" class="column column-2">
    <div class="column-content">
      <h2 class="column-title">Горнолыжный склон</h2>
      <p class="column-description">Искусственный склон с 2 трассами</p>
      <span class="column-button">Открыть &rarr;</span>
    </div>
  </a>

  <a href="<?= site_url('wakeboarding.php') ?>" class="column column-3">
    <div class="column-content">
      <h2 class="column-title">Вейкбординг</h2>
      <p class="column-description">Катание на кабельной системе</p>
      <span class="column-button">Открыть &rarr;</span>
    </div>
  </a>
</main>

<?php
// Главная страница не нуждается в типовом футере (он под картинками), но мы оставим его вызов на усмотрение
require_once __DIR__ . '/includes/footer.php';
?>
