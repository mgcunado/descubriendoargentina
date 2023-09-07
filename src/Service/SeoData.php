<?php

namespace App\Service;

class SeoData
{
  /**
   * @param string $titulo
   * @param string $keywords
   * @param string $description
   * @param object $seoPage
   * @return object
   */
  public function addData($titulo, $keywords, $description, $seoPage): object
  {
    $seoPage
    ->addMeta('name', 'robots', 'index, follow')
    ->setTitle($titulo)
    ->addMeta('name', 'keywords', $keywords)
    ->addMeta('name', 'description', $description)
    ->addMeta('property', 'og:title', $titulo)
    ->addMeta('property', 'og:type', 'article')
    ->addMeta('property', 'og:description', $description);

    return $seoPage;
  }
}
