<?php
return function(){
    $tags = new Collection();
    
    $location = collection('all-events') -> pluck('location', ',', true);
    $types = collection('all-events') -> pluck('eventtype', ',', true);

    $tags -> add($location);
    $tags -> add($types);

    return $tags;
};