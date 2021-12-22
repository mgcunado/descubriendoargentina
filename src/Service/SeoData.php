<?php

namespace App\Service;

class SeoData
{
    public function addData($titulo, $keywords, $description, $seoPage): object
    {
        /* $filas = count($ppp); */
        /* $seoPage = $this->get('sonata.seo.page'); */
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
