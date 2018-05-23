<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($data["articles"] as $article)
      <url>
        <loc>
          {{$data["siteUrl"]."/article-{$article->id}/" }}
        </loc>
        <lastmod>
          {{\Carbon\Carbon::parse($article->post_date)->format('Y-m-d')}}
        </lastmod>
        <changefreq>
          daily
        </changefreq>
        <priority>
          1.0
        </priority>
      </url>
    @endforeach
</urlset>
