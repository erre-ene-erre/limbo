<?php
return function($site){
    return $site
        -> children() -> template('event-page') -> sortBy('datestart', 'desc') ->listed();
};