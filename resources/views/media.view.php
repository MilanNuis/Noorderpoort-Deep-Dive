<?php

require_once("./unitils/connection.php");

$stmt = $db->prepare("SELECT * FROM articles LIMIT 10");
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Media</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">PMOT artikelen.</p>
      <div class="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">

        <?php foreach ($articles as $article) : ?>
          <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="flex items-center gap-x-4 text-xs">
              <time datetime="<?= htmlspecialchars($article['date']) ?>" class="text-gray-500">
                <?= date('M d, Y', strtotime($article['date'])) ?>
              </time>
              <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                <?= htmlspecialchars($article['tag']) ?>
              </a>
            </div>
            <div class="group relative">
              <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  <?= htmlspecialchars($article['title']) ?>
                </a>
              </h3>
              <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                <?= htmlspecialchars($article['content']) ?>
              </p>
            </div>
            <div class="relative mt-8 flex items-center gap-x-4">
              <img src="<?= htmlspecialchars($article['authorURL']) ?>" alt="" class="h-10 w-10 rounded-full bg-gray-50">
              <div class="text-sm leading-6">
                <p class="font-semibold text-gray-900">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    <?= htmlspecialchars($article['author']) ?>
                  </a>
                </p>
              </div>
            </div>
          </article>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>