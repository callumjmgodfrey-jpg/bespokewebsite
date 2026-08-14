<?php
  if (!isset($page_title)) {
    $page_title = "Callum Godfrey — Bespoke Selvedge Denim, Wellington NZ";
  }
  if (!isset($page_desc)) {
    $page_desc = "Hand-cut, hand-sewn bespoke jeans made from Japanese selvedge denim. Based in Wellington, New Zealand.";
  }
  if (!isset($og_image)) {
    $og_image = "media/portrait_hero.jpg";
  }
  if (!isset($html_lang)) {
    $html_lang = "en";
  }
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($html_lang); ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($page_title); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_desc); ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($page_desc); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">
<link rel="stylesheet" href="tokens.css">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="animations.css">
