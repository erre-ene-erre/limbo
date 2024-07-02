<?php
return function(){
    date_default_timezone_set("Europe/Zurich");
    $pastEvents = new Collection();
    $date = param('date') ? date('Ymd',strtotime(param('date'))) : date('Ymd');

    foreach (collection('all-events') as $event) {
        $start = $event -> datestart() ->toDate('YMMdd');
        $end = $event -> dateend() -> isNotEmpty() ? $event -> dateend() -> toDate('YMMdd') : $start;
        if($date > $end){$pastEvents -> add($event);}
    }
    return $pastEvents;
};