<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<news>
  @foreach($data["articles"] as $article)
    <newsitem id="{{$article->id}}" path="{{ "./biglobe/".$article->id.".xml"}}" status="10" />
  @endforeach
</news>